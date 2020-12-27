<?php
namespace App\Models\API;
class weather{
	public static function checkweather ($location, $date, int $num){

		$url = "https://weatherapi-com.p.rapidapi.com/forecast.json?q=";
	
		$purl = str_replace(" ", "%20", $location);
	
		$day = "&days=".$num;
		
	
		$completeurl = $url.$purl.$day."&dt=".$date;
	
	
	
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
	
			"x-rapidapi-host: weatherapi-com.p.rapidapi.com",
	
			"x-rapidapi-key: 3856caf128msh350a80a155eb887p14146bjsnaa5076f4771e"
	
		],
	
	]);
	
	
	
	$response = curl_exec($curl);
	
	$err = curl_error($curl);
	
	$weather = json_decode($response);
	
	
	
	curl_close($curl);
		return $weather;
	}
	
}

?>