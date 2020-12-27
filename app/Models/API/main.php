<?php
 namespace App\API;
include('weather.inc.php');
include('airport.inc.php');
include('flight.inc.php');
include('covid.inc.php');
include('hotels-location.inc.php');

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


//Submitting
if (isset($_POST['travel-submit'])){

	$begin = $_POST['begin'];
	$destination = $_POST['destination'];
	$destinationuni = stripVN($destination);

	$begindate = $_POST['bdate'];
	$returndate = $_POST['rdate'];
	$twoway = $_POST['twoway'];
	
	
	//Check whether this trip will be One-Way or Two-Way
	if ($twoway == "No"){
		$weather = checkweather($destinationuni,$begindate,3);
		if(isset($weather->location)){
		$begininit = getiata($begin);
		$destinationinit = getiata($destination);
		$beginload = $begininit->Places[0]->PlaceId;
		$destinationload = $destinationinit->Places[0]->PlaceId;
		$flightdata = onewayflight($beginload,$destinationload,$begindate);}	
	}
	elseif ($twoway == "Yes"){
		$twoflag = 1;
		$weather = checkweather($destinationuni,$begindate,$num);
		if(isset($weather->location)){
		$begininit = getiata($begin);
		$destinationinit = getiata($destination);
		$beginload = $begininit->Places[0]->PlaceId;
		$destinationload = $destinationinit->Places[0]->PlaceId;
		$flightdata =twowayflight($beginload,$destinationload,$begindate,$returndate);
		$num = round(abs($returndate - $begindate) / (60*60*24),0);}
	}
	
	//Extra Information
	if(isset($weather->location) && isset($begininit->Places[0]) && isset($destinationinit->Places[0])){
	$posname = $weather->location->name;
	$begname = $begininit->Places[0]->PlaceName;
	$desname = $destinationinit->Places[0]->PlaceName;
	$valid = 1;}
	else{
		$posname = "";
		$begname = "";
		$desname = "";
		$valid = 0;
	}
	

	
	if($valid == 1){
	
	
	if(isset($flightdata->Quotes[0])){
	$firstplace = str_replace("-sky", "", $beginload);
		$firstplace = substr($firstplace,0,3);
	$firstplaceflight = $flightdata->Places[0]->CityId;
	$firstplaceflight = substr($firstplaceflight,0,3);
		if ($firstplace == $firstplaceflight){
	$currentpos = $flightdata->Places[0]->Name;
	$destinationpos = $flightdata->Places[1]->Name;
	$flag = 1;}
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
	$coviddata = getcovid($nation);				//getcovid
	//$coviddata = (Array)$coviddata;
		
	$covidcountry = $coviddata{0}->country;
	$covidconfirm = $coviddata{0}->confirmed;
	$covidrecover = $coviddata{0}->recovered;
	$covidcrititcal = $coviddata{0}->critical;
	$coviddeath = $coviddata{0}->deaths;
	$covidupdate = $coviddata{0}->lastUpdate;
	
		
	}
	
	else{
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
	
	
	
	
	
}




?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $desname ?> We Go!</title>
<style>
.headDiv {
  border: 5px outset #EF484B;
  background-color: palevioletred;    
  text-align: center;
  font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
  text-decoration-color: white
}
.flight {
	border-right: 2px outset blue;
    width: 49%;
    float: left;
    text-align: center;
    background-color: #F1286A;
}
	.flight a{
		color: azure;
	}
	.weather a{
		color: azure;
	}
.weather {
    width: 49%;
    float: right;
    overflow: hidden;
    text-align: center;
    background-color: #F1286A;
}
	.covid{
	    float: bottom;
     text-align: center;
     border: 2px outset yellow;
     width: 100%;
	}
#backtomain{
 
  background-color: #F1286A;
  text-align: center;
	}
	#backtomain a:hover{
		background-color: #760573;
	}
	#backtomain a{
		border: 3px outset white;
		color: aliceblue;
		
	}
</style>
</head>

<body>
<div class="headDiv">
  <h2 style="color: whitesmoke">Chào mừng đến với WeGo</h2>
	<?php if($valid == 1){
  echo "<p>Sau đây sẽ là một số thông tin cần thiết cho chuyến đi của bạn đến ".$desname." </p>";
	}
	elseif($valid == 0){
  echo "<p style='color:white'>Địa điểm <b>Không Hợp Lệ</b> Xin vui lòng kiểm tra lại!</p>";
	}
	?>
</div>

	<div class="flight">
		<br><br>
	<a style="font-weight: bold">Điểm khởi hành: <?php echo $currentpos?><br></a>
	<a style="font-weight: bold">Điểm đến: <?php echo $destinationpos?><br></a>
	<a >Hãng hàng không: </a>
	<a style="font-weight: bold"><?php echo $airliner?><br></a>
	<a >Giá vé tối thiểu: </a>
	<a style="font-weight: bold"><?php echo number_format($minprice).$moneysymbol?><br></a>
	<a >Đường bay thẳng: </a>
	<a style="font-weight: bold"><?php echo $direct?><br></a>
		<br><br><br><br>
	</div>
	
	<div class="weather">
		<br><br>
	<a style="font-weight: bold">Thời tiết tại <?php echo $desname?> thời điểm hiện tại (<?php echo $currentupdate?>)<br></a>
	<a >Nhiệt độ: <?php echo $currenttemp?>°C<br></a>
	<a >Tình trạng thời tiết: <?php echo $currentcondition?><br></a>
	<a >Độ ẩm: <?php echo $currenthumid?>%<br></a>
	<a >Nhiệt độ cảm nhận thực tế: <?php echo $currentfeelslike?>°C<br></a>
		<br><br><br><br>
	</div>
	
	<div class="covid">
		<br><br>
	<a style="font-weight: bold">Tình hình COVID tại <?php echo $covidcountry?> thời điểm hiện tại (<?php echo $covidupdate?>)<br></a>
		<a >Số lượng bệnh nhân: </a>
		<a style="font-weight: bold"><?php echo number_format($covidconfirm)?><br></a>
		<a >Số lượng nguy kịch: </a>
		<a style="font-weight: bold"><?php echo number_format($covidcrititcal)?><br></a>
		<a >Số lượng tử vong vì dịch: </a>
		<a style="font-weight: bold"><?php echo number_format($coviddeath)?><br></a>
		<a >Số lượng bệnh nhân hồi phục: </a>
		<a style="font-weight: bold"><?php echo number_format($covidrecover)?><br></a>
		
		
	
		
		<br><br>
	</div>
	
	
	<div id="backtomain">
	<a href="index.php">Quay lại Trang Chính</a>
		<a href="TestHotel.php?destination=<?php echo $desname?>&checkindate=<?php echo $begindate?>">Test Hotel Location</a>
	</div>
	
	
	
</body>
</html>


<?php
	function stripVN($str) {
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
	?>