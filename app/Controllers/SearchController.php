<?php
	namespace App\Controllers;
	use App\Models\API\airport;
	use App\Models\API\covid;
	use App\Models\API\flight;
	use App\Models\API\weather;
    class SearchController{
		//hàm đổi 
		protected function stripVN($str) {
			$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
			$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
			$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
			$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
			$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
			$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
			$str = preg_replace("/(đ)/", 'd', $str);
		
			$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
			$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
			$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
			$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
			$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
			$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
			$str = preg_replace("/(Đ)/", 'D', $str);
			return $str;
		}
		//lấy dữ liệu từ form
		protected function getFormData(){
			return [
				'begin' => $_POST['begin'],
				'destination' =>  $_POST['destination'],
				'begindate' => $_POST['bdate'],
				'returndate' => $_POST['rdate'],
				'twoway' => $_POST['twoway']
			];
		}
		public function searchFlight(){
			//Check current time
			$systime = time();
			$syshour = date("h",$systime) + 7;
			$sysone = $syshour + 1;
			$systwo = $syshour + 2;
			$systhree = $syshour + 3;
			$sysfour = $syshour + 4;
			$sysfive = $syshour + 5;
			//Check UTC time for weather image
			$t=time();
			$utchour = gmdate("H",$t);
			$minute = date("i",$t) - (date("i",$t)%10);
			$minute -= 20;
			$finaltime = $utchour.$minute;
			$connect = $this->getFormData();
			//
			$destinationuni = $this->stripVN($connect['destination']);
			if ($connect['twoway'] == "No"){
				$weather = weather::checkweather($destinationuni,$connect['begindate'],3);
				if(isset($weather->location)){
					$begininit = airport::getiata($connect['begin']);
					$destinationinit = airport::getiata($connect['destination']);
					$beginload = $begininit->Places[0]->PlaceId;
					$destinationload = $destinationinit->Places[0]->PlaceId;
					$flightdata = flight::onewayflight($beginload,$destinationload,$connect['begindate']);
				}	
			}elseif ($connect['twoway'] == "Yes"){
				$twoflag = 1;
				$weather = weather::checkweather($destinationuni,$connect['begindate'],3);
				if(isset($weather->location)){
					$begininit = airport::getiata($connect['begin']);
					$destinationinit = airport::getiata($connect['destination']);
					$beginload = $begininit->Places[0]->PlaceId;
					$destinationload = $destinationinit->Places[0]->PlaceId;
					$flightdata = flight::twowayflight($beginload,$destinationload,$connect['begindate'],$connect['returndate']);
					$num = round(abs($connect['returndate'] - $connect['begindate']) / (60*60*24),0);
				}
			}
			//Extra Information
			if(isset($weather->location) && isset($begininit->Places[0]) && isset($destinationinit->Places[0])){
				$posname = $weather->location->name;
				$begname = $begininit->Places[0]->PlaceName;
				$desname = $destinationinit->Places[0]->PlaceName;
				$valid = 1;
			}else{
				$posname = "";
				$begname = "";
				$desname = "";
				$valid = 0;
			}
			//
			if($valid == 1){
				if(isset($flightdata->Quotes[0])){
					$firstplace = str_replace("-sky", "", $beginload);
					$firstplace = substr($firstplace,0,3);
					$firstplaceflight = $flightdata->Places[0]->CityId;
					$firstplaceflight = substr($firstplaceflight,0,3);
					if ($firstplace == $firstplaceflight){
						$currentpos = $flightdata->Places[0]->Name;
						$destinationpos = $flightdata->Places[1]->Name;
						$flag = 1;
					}
					else{
						$currentpos = $flightdata->Places[1]->Name;
						$destinationpos = $flightdata->Places[0]->Name;
						$flag = 2;
					}
					$airliner = $flightdata->Carriers[0]->Name;
					$minprice =  $flightdata->Quotes[0]->MinPrice;
					$direct = $flightdata->Quotes[0]->Direct;
					if($direct == True){
						$direct = "Có";
					}
					elseif($direct == False){
						$direct = "Không";
					}
					$moneysymbol = $flightdata->Currencies[0]->Symbol;	
					}
					else{
						$currentpos = $begininit->Places[0]->PlaceName;
						$destinationpos = $destinationinit->Places[0]->PlaceName;
						$airliner = "Không có chuyến bay trong ngày!";
						$direct = "-";
						$minprice = 0;
						$moneysymbol = "";
					}
					$posname = $destinationpos;
					$currentupdate = $weather->current->last_updated;
					$currenttemp = $weather->current->temp_c;
					$currentcondition = $weather->current->condition->text;
					$currentconditionicon = $weather->current->condition->icon;
					$currenthumid = $weather->current->humidity;
					$currentfeelslike = $weather->current->feelslike_c;
				
					// Get COVID Data
					$nation = $weather->location->country;
					$coviddata = covid::getcovid($nation);				//getcovid
					//$coviddata = (Array)$coviddata;
					
					$covidcountry = $coviddata{0}->country;
					$covidconfirm = $coviddata{0}->confirmed;
					$covidrecover = $coviddata{0}->recovered;
					$covidcrititcal = $coviddata{0}->critical;
					$coviddeath = $coviddata{0}->deaths;
					$covidupdate = $coviddata{0}->lastUpdate;					
				}else{
					$currentpos = "-";
					$destinationpos = "-";
					$airliner = "-";
					$direct = "-";
					$minprice = 0;
					$moneysymbol = "";
					$currentupdate = "-";
					$currenttemp = "-";
					$currentcondition = "-";
					$currentconditionicon = "-";
					$currenthumid = "-";
					$currentfeelslike = "-";
					$covidcountry = "-";
					$covidconfirm = 0;
					$covidrecover = 0;
					$covidcrititcal = 0;
					$coviddeath = 0;
					$covidupdate = 0;
						
				}

				//echo $this->view->render('Tab/result');
				redirect('/result');
			}
	}
?>