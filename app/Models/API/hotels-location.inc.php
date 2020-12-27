<?php
namespace App\Models\API;

//API from Hotels.com (apidojo) - locations/search
class hotels{
	function gethotellocation($location){
	
		$url = "https://hotels4.p.rapidapi.com/locations/search?query=";
	
		$purl = str_replace(" ", "%20", $location);
	
	
		$completeurl = $url.$purl."&locale=vi_VN";
	
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
			"x-rapidapi-host: hotels4.p.rapidapi.com",
			"x-rapidapi-key: 3856caf128msh350a80a155eb887p14146bjsnaa5076f4771e"
		],
	]);
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	
	$getlocation = json_decode($response);
	
	return $getlocation;
	
	}
	
}



?>