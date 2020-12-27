<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://weatherapi-com.p.rapidapi.com/forecast.json?q=Can%20Tho&days=3&dt=2020-12-14",
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
    //var_dump($weather);
    //echo "Location: ".$response->location; 
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	//echo $response;

}
if(isset($weather->forecast->forecastday[0])){
$maxtemp = $weather->forecast->forecastday[0]->day->maxtemp_c;
$icon = $weather->current->condition->icon;}
else{
    $maxtemp = "Invalid Date!, Please Choose Closer Date!!!";
    $icon = "NULL!";
}


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<a ><?php  echo "Max Temperature Is:". $maxtemp;?> </a>
	<img src="<?php echo $icon ?>">
</body>
</html>