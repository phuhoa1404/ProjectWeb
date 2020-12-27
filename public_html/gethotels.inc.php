<?php


	

function gethotel($array){
	
	$check = "https://hotels4.p.rapidapi.com/properties/list?destinationId=1641968&pageNumber=1&checkIn=2020-12-26&checkOut=2020-12-30&pageSize=25&adults1=1&children3=0&children8=0&currency=VND&children4=0&children7=0&priceMax=5000000&children2=0&starRatings=3&children1=0&children5=0&locale=vi_VN&children6=0&priceMin=200000&sortOrder=PRICE_HIGHEST_FIRST&guestRatingMin=2";
	
	$urldes = $array['cityid'];
	$urlcheckin = $array['bdate'];
	$urlcheckout = $array['edate'];
	$urlcurrency = $array['currency'];
	$urlcurrency = "&currency=".$urlcurrency;
	
	$urladult1 = $array['adult1'];
	$urlchild1 = $array['child1'];
	
	$urladult2 = $array['adult2'];
	$urlchild2 = $array['child2'];
	
	$urladult3 = $array['adult3'];
	$urlchild3 = $array['child3'];
	
	$urladult4 = $array['adult4'];
	$urlchild4 = $array['child4'];
	
	$urladult5 = $array['adult5'];
	$urlchild5 = $array['child5'];
	
	$urladult6 = $array['adult6'];
	$urlchild6 = $array['child6'];
	
	$urladult7 = $array['adult7'];
	$urlchild7 = $array['child7'];
	
	$urladult8 = $array['adult8'];
	$urlchild8 = $array['child8'];
	
	$urlmaxprice = $array['maxp'];
	if($urlmaxprice == 0){
		$urlmaxprice = "";
	}
	else{
		$urlmaxprice = "&priceMax=".$urlmaxprice;
	}
	$urlminprice = $array['minp'];
	if($urlminprice == 0){
		$urlmaxprice = "";
	}
	else{
		$urlminprice = "&priceMin=".$urlminprice;
	}
	$urlsrating = $array['srating'];
	$urlgratingmin = $array['gratingmin'];
	$urlsort = $array['sort'];
	

$curl = curl_init();
	
	$url = "https://hotels4.p.rapidapi.com/properties/list?";
	
	$completeurl = $url."destinationId=".$urldes."&pageNumber=1&checkIn=".$urlcheckin."&checkOut=".$urlcheckout."&pageSize=25&adults1=".$urladult1."&children3=".$urlchild3."&children8=".$urlchild8.$urlcurrency."&children4=".$urlchild4."&children7=".$urlchild7.$urlmaxprice."&children2=".$urlchild2."&starRatings=".$urlsrating."&children1=".$urlchild1."&children5=".$urlchild5."&locale=vi_VN&children6=".$urlchild6.$urlminprice."&sortOrder=".$urlsort."&guestRatingMin=".$urlgratingmin;

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

$hoteldata = json_decode($response);
	
	

return $hoteldata;

}

function get_decorated_diff($old, $new){
    $from_start = strspn($old ^ $new, "\0");        
    $from_end = strspn(strrev($old) ^ strrev($new), "\0");

    $old_end = strlen($old) - $from_end;
    $new_end = strlen($new) - $from_end;

    $start = substr($new, 0, $from_start);
    $end = substr($new, $new_end);
    $new_diff = substr($new, $from_start, $new_end - $from_start);  
    $old_diff = substr($old, $from_start, $old_end - $from_start);

    $new = "$start<ins style='background-color:#ccffcc'>$new_diff</ins>$end";
    $old = "$start<del style='background-color:#ffcccc'>$old_diff</del>$end";
    return array("old"=>$old, "new"=>$new);
}

?>