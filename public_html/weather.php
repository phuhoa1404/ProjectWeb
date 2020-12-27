<?php



$systime = time();

$syshour = date("h",$systime) + 7;

$sysnexthour = $syshour + 1;



$t=time();

$utchour = gmdate("H",$t);

$minute = date("i",$t) - (date("i",$t)%10);

$minute -= 20;

$finaltime = $utchour.$minute;





if (isset($_POST['weather-submit'])){

	$location = $_POST['location'];

	$bdate = $_POST['bdate'];

	//$edate = $_POST['edate'];

	

	$url = "https://weatherapi-com.p.rapidapi.com/forecast.json?q=";

	$purl = str_replace(" ", "%20", $location);

	$day = "&days=1";

	//$bdate = date_format($bdate, "Y/m/d");

	//$edate = date_format($edate, "Y/m/d");

	

	$completeurl = $url.$purl.$day."&dt=".$bdate;

	





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

    //var_dump($weather);

    //echo "Location: ".$response->location; 

curl_close($curl);



if ($err) {

	echo "cURL Error #:" . $err;

} else {

	//echo $response;



}

if(isset($weather->forecast->forecastday[0])){

$posname = $weather->location->name;

$poscountry = $weather->location->country;

$poslocaltime = $weather->location->localtime;

	

$currentupdate = $weather->current->last_updated;

$currenttemp = $weather->current->temp_c;

$currentcondition = $weather->current->condition->text;

$currentconditionicon = $weather->current->condition->icon;

$currenthumid = $weather->current->humidity;

$currentfeelslike = $weather->current->feelslike_c;

	

$nexttemp = $weather->forecast->forecastday[0]->hour[$sysnexthour]->temp_c;

$nextcondition = $weather->forecast->forecastday[0]->hour[$sysnexthour]->condition->text;

$nextconditionicon = $weather->forecast->forecastday[0]->hour[$sysnexthour]->condition->icon;

$nexthumid = $weather->forecast->forecastday[0]->hour[$sysnexthour]->humidity;

$nextfeelslike = $weather->forecast->forecastday[0]->hour[$sysnexthour]->feelslike_c;

	

$maxtemp = $weather->forecast->forecastday[0]->day->maxtemp_c;

$mintemp = $weather->forecast->forecastday[0]->day->mintemp_c;

$avgtemp = $weather->forecast->forecastday[0]->day->avgtemp_c;



$dayicon = $weather->current->condition->icon;}

else{

    $maxtemp = "Sorry! The weather forecast isn't available in such day";

    $dayicon = "NULL!";

}

}



?>





<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title><?php echo ($posname)?> Weather Forecast</title>

</head>



<body>

	<div>

	<h1>Welcome to Weather Forecast!</h1>

	</div>

	<div>

	<a ><?php  echo "Yours location: ". $posname?> <br></a>

	<a ><?php  echo "Yours country: ". $poscountry?> <br></a>

	<a ><?php  echo "Yours current time: ". $poslocaltime?> <br><br> </a>	

	</div>

	<div>

	<img src="<?php echo $dayicon;?>">

	<a ><br><?php  echo "Max Temperature in $bdate Is: ". $maxtemp?> <br></a>

	<a ><?php  echo "Min Temperature in $bdate Is: ". $mintemp?> <br></a>

	<a ><?php  echo "Avg Temperature in $bdate Is: ". $avgtemp?> <br><br></a>

	</div>

	<div>

	<img src="<?php echo $currentconditionicon;?>">

	<a ><br><?php  echo "Current weather report updated at: ". $currentupdate?> <br></a>

	<a ><?php  echo "Current Temparature: ". $currenttemp?> <br></a>

	<a ><?php  echo "Current Condition: ". $currentcondition?> <br></a>

	<a ><?php  echo "Current Humid: ". $currenthumid?> <br></a>

	<a ><?php  echo "Current Temparature Feels Like: ". $currentfeelslike?> <br><br></a>

	</div>

	<div>

	<img src="<?php echo $nextconditionicon;?>">

	<a ><br><?php  echo "Weather report in next hour: ". $sysnexthour?> <br></a>

	<a ><?php  echo "Temparature: ". $nexttemp?> <br></a>

	<a ><?php  echo "Condition: ". $nextcondition?> <br></a>

	<a ><?php  echo "Humid: ". $nexthumid?> <br></a>

	<a ><?php  echo "Temparature Feels Like: ". $nextfeelslike?> <br><br></a>

	</div>

	<div>

	    <h3 >South Vietnam Weather Satellite Image <br></h3>

	    <img src="https://www.data.jma.go.jp/mscweb/data/himawari/img/ha1/ha1_b13_<?php echo ($finaltime)?>.jpg">

	    <a style="font-size:75%;text-align:right;font-style:italic;"><br>(Image provided by Japan Meteorological Agency - JMA followed by UTC Timezone) <br></a>

	</div>

	

	<form action="/index.php">

  <button type="submit" name="weather-submit" value="weather-submit">Quay lại Trang Chính!</button>

</form> 

</body>

</html>