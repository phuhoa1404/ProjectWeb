<?php
namespace App\Models\API;
class covid{
	public static function getcovid($country){
	
		$url = "https://covid-19-data.p.rapidapi.com/country?name=";
		$purl = str_replace(" ", "%20", $country);
		$completeurl = $url.$purl."&format=json";
	
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
			"x-rapidapi-host: covid-19-data.p.rapidapi.com",
			"x-rapidapi-key: 3856caf128msh350a80a155eb887p14146bjsnaa5076f4771e"
		],
	]);
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	$coviddata = json_decode($response);
		
	return $coviddata;
		
	}
	
}

?>