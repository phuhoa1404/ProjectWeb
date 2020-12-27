<?php

include('gethotels.inc.php');

if (isset($_POST['hotel-submit'])){
	$cityid = $_POST['cityid'];
	$bdate = $_POST['bdate'];
	$edate = $_POST['checkout'];
	$adult1 = $_POST['Adult1'];
	$child1 = $_POST['Child1'];
	
	$adult2 = $_POST['Adult2'];
	$child2 = $_POST['Child2'];
	
	$adult3 = $_POST['Adult3'];
	$child3 = $_POST['Child3'];
	
	$adult4 = $_POST['Adult4'];
	$child4 = $_POST['Child4'];
	
	$adult5 = $_POST['Adult5'];
	$child5 = $_POST['Child5'];
	
	$adult6 = $_POST['Adult6'];
	$child6 = $_POST['Child6'];
	
	$adult7 = $_POST['Adult7'];
	$child7 = $_POST['Child7'];
	
	$adult8 = $_POST['Adult8'];
	$child8 = $_POST['Child8'];
	
	$currency = $_POST['currency'];
	$maxp = $_POST['maxprice'];
	$minp = $_POST['minprice'];
	$srating = $_POST['srating'];
	$sort = $_POST['sort'];
	$gratingmin = $_POST['gratingmin'];
	
	$array = compact("cityid","bdate","edate","currency","adult1", "child1","adult1","child1","adult2","child2","adult3","child3","adult4","child4","adult5","child5","adult6","child6","adult7","child7","adult8","child8","currency","maxp","minp","srating","sort","gratingmin");
	
	$hoteldata = gethotel($array);
	
	if($hoteldata->result == "OK"){
		$header = $hoteldata->data->body->header;
		$totalcount = $hoteldata->data->body->searchResults->totalCount;
		for($i = 0; $i < 10; $i++){
			$places[$i] = $hoteldata->data->body->searchResults->results[$i];
		}
	}
	else{
		$header= "-";
		$totalcount = "-";
		for($i = 0; $i < 10; $i++){
			$places[$i] = "-";
		}
		$hotelflag = 0;
	}
	
	
}





?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Get Hotel Results</title>
</head>

<body>
	
	<a><b>Result Status: <?php echo $hoteldata->result?></b></a><br>
	<div class="hotel">
		<br><br>
	<a style="font-weight: bold">ID Hotel: <?php echo $places[0]->id?><br></a>
	<a style="font-weight: bold">Tên Hotel: <?php echo $places[0]->name?><br></a>
	<a style="font-weight: bold">Đánh giá: <?php echo $places[0]->starRating?><br></a>
	<a style="font-weight: bold">Địa Chỉ: <?php echo $places[0]->address->streetAddress.", ".$places[0]->address->extendedAddress?><br></a>
	<a style="font-weight: bold">Số phòng còn trống: <?php echo $places[0]->roomsLeft?><br></a>
	<a style="font-weight: bold">Giá phòng hiện tại: <?php echo $places[0]->ratePlan->price->current?><br></a>
		<br><br>
	<a style="font-weight: bold">ID Hotel: <?php echo $places[1]->id?><br></a>
	<a style="font-weight: bold">Tên Hotel: <?php echo $places[1]->name?><br></a>
	<a style="font-weight: bold">Đánh giá: <?php echo $places[1]->starRating?><br></a>
	<a style="font-weight: bold">Địa Chỉ: <?php echo $places[1]->address->streetAddress.", ".$places[1]->address->extendedAddress?><br></a>
	<a style="font-weight: bold">Số phòng còn trống: <?php echo $places[1]->roomsLeft?><br></a>
	<a style="font-weight: bold">Giá phòng hiện tại: <?php echo $places[1]->ratePlan->price->current?><br></a>
		<br><br>
	<a style="font-weight: bold">ID Hotel: <?php echo $places[2]->id?><br></a>
	<a style="font-weight: bold">Tên Hotel: <?php echo $places[2]->name?><br></a>
	<a style="font-weight: bold">Đánh giá: <?php echo $places[2]->starRating?><br></a>
	<a style="font-weight: bold">Địa Chỉ: <?php echo $places[2]->address->streetAddress.", ".$places[2]->address->extendedAddress?><br></a>
	<a style="font-weight: bold">Số phòng còn trống: <?php echo $places[2]->roomsLeft?><br></a>
	<a style="font-weight: bold">Giá phòng hiện tại: <?php echo $places[2]->ratePlan->price->current?><br></a>
		<br><br><br><br>
	</div>
	
	
</body>
</html>
