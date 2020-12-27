<?php
 namespace App\Models\API;
 class airport{
	public static function getiata($location){
	
		$url = "https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com/apiservices/autosuggest/v1.0/VN/VND/vi-VN/?query=";
	
		$purl = str_replace(" ", "%20", $location);
	
	
		
	
		$completeurl = $url.$purl;
		
	
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
		
	curl_close($curl);
	
	$iatacode = json_decode($response);
		
	//	$iataarray = array(
	//	PlaceID => $iatacode->Places[0]->PlaceId,
	//	City => $iatacode->Places[0]->PlaceName,
	//	Country => $iatacode->Places[0]->CountryName
	//	);
		
		return $iatacode;
	
		
	}
	
 }
 ?>
