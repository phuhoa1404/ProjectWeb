<?php
namespace App\Models\API;
class flight{
	public static function onewayflight($begin, $destination, $date){

	
	
		$url = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browseroutes/v1.0/VN/VND/vi-VN";
	
	
		$completeurl = $url."/".$begin."/".$destination."/".$date;
		
		
	$curl = curl_init();
	
	curl_setopt_array($curl, [
		CURLOPT_URL => $completeurl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
			"x-rapidapi-key: 3856caf128msh350a80a155eb887p14146bjsnaa5076f4771e"
		],
	]);
	
	$response = curl_exec($curl);
	
	$err = curl_error($curl);
	
	$flightdata = json_decode($response);
	
	curl_close($curl);
	
		
		return $flightdata;
		
	}
	
	public static function twowayflight($begin, $destination, $godate, $backdate){
	
		
		
		$url = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/browseroutes/v1.0/VN/VND/vi-VN";
	
	
		$completeurl = $url."/".$begin."/".$destination."/".$godate."/".$backdate;
		
		
	$curl = curl_init();
	
	curl_setopt_array($curl, [
		CURLOPT_URL => $completeurl,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: skyscanner-skyscanner-flight-search-v1.p.rapidapi.com",
			"x-rapidapi-key: 3856caf128msh350a80a155eb887p14146bjsnaa5076f4771e"
		],
	]);
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	$flightdata = json_decode($response);
	curl_close($curl);
	
	
	
		
		return $flightdata;
		
	}
	
}

?>