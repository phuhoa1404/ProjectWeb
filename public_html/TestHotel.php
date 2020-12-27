<?php

//include('main.php');
include('hotels-location.inc.php');

	$destinationpos = $_GET['destination'];
	$destination = str_replace("%20", " ", $destinationpos);
	$begindate = $_GET['checkindate'];

	$hotellocation = gethotellocation($destination);
	$cityid = $hotellocation->suggestions[0]->entities[0]->destinationId;
	$cityname = $hotellocation->suggestions[0]->entities[0]->name;

?>




<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Testing Get Hotels Location</title>
</head>
	<style>
		#room2{
			display: none;
		}
		#room3{
			display: none;
		}
		#room4{
			display: none;
		}
		#room5{
			display: none;
		}
		#room6{
			display: none;
		}
		#room7{
			display: none;
		}
		#room8{
			display: none;
		}
		#room2label{
			display: none;
		}
		#room3label{
			display: none;
		}
		#room4label{
			display: none;
		}
		#room5label{
			display: none;
		}
		#room6label{
			display: none;
		}
		#room7label{
			display: none;
		}
		#room8label{
			display: none;
		}
		
		#cityid{
			display: none;
		}
		#bdate{
			display: none;
		}
		
		
		#currencya{
			display: none;
		}
		#currencylabel{
			display: none;
		}
		#currency{
			display: none;
		}
		#maxprice{
			display: none;
		}
        #maxpricelabel{
			display: none;
		}
		#gratingmin{
			display: none;
		}
        #gratingminlabel{
			display: none;
		}
		#minprice{
			display: none;
		}
        #minpricelabel{
			display: none;
		}
		#sort{
			display: none;
		}
        #sortlabel{
			display: none;
		}
        #sorta{
			display: none;
		}
		#srating{
			display: none;
		}
        #sratinglabel{
			display: none;
		}
	
	</style>

<body>
	<div>
	<p>Getting Hotels.com Location from Hotels API</p>
	<a>Destination Position: <?php echo $destination?></a><br>
	<a>City ID: <?php echo $cityid?></a><br>
	<a>City Name: <?php echo $cityname?></a><br>
	</div>
	<div>
	<form action="TestHotel2.php" method="post">
		<label for="checkout">Checkout Date:</label>
		<input type="date" placeholder="Checkout" name="checkout"><br>
		
		<div id="room">
			<br>
		<label for="Adult1" id="room1">Adult01:</label>
		<input type="number" placeholder="Adutl1" name="Adult1" id="room1" value="1" min="1" max="10">
		<label for="Child1" id="room1">Child01:</label>
		<input type="number" placeholder="Child1" name="Child1" id="room1" value="0" min="0" max="10">  <br><br>
		
		<label for="Num" id="numlabel">Số lượng Phòng:</label>
		<input type="range" name="Num" id="num" min="1" max="8" value="1"> <output></output> <br><br>
		
		<label for="Adult2" id="room2label">Adult02:</label>
		<input type="number" placeholder="Adutl2" name="Adult2" id="room2" value="0" min="0" max="10">
		<label for="Child2" id="room2label">Child02:</label>
		<input type="number" placeholder="Child2" name="Child2" id="room2" value="0" min="0" max="10"> <br>
		
		<label for="Adult3" id="room3label">Adult03:</label>
		<input type="number" placeholder="Adutl3" name="Adult3" id="room3" value="0" min="0" max="10">
		<label for="Child3" id="room3label">Child03:</label>
		<input type="number" placeholder="Child3" name="Child3" id="room3" value="0" min="0" max="10"> <br>
		
		<label for="Adult4" id="room4label">Adult04:</label>
		<input type="number" placeholder="Adutl4" name="Adult4" id="room4" value="0" min="0" max="10">
		<label for="Child4" id="room4label">Child04:</label>
		<input type="number" placeholder="Child4" name="Child4" id="room4" value="0" min="0" max="10"> <br>
		
		<label for="Adult5" id="room5label">Adult05:</label>
		<input type="number" placeholder="Adutl5" name="Adult5" id="room5" value="0" min="0" max="10">
		<label for="Child5" id="room5label">Child05:</label>
		<input type="number" placeholder="Child5" name="Child5" id="room5" value="0" min="0" max="10"> <br>
		
		<label for="Adult6" id="room6label">Adult06:</label>
		<input type="number" placeholder="Adutl6" name="Adult6" id="room6" value="0" min="0" max="10">
		<label for="Child6" id="room6label">Child06:</label>
		<input type="number" placeholder="Child6" name="Child6" id="room6" value="0" min="0" max="10"> <br>
		
		<label for="Adult7" id="room7label">Adult07:</label>
		<input type="number" placeholder="Adutl7" name="Adult7" id="room7" value="0" min="0" max="10">
		<label for="Child7" id="room7label">Child07:</label>
		<input type="number" placeholder="Child7" name="Child7" id="room7" value="0" min="0" max="10"> <br>
		
		<label for="Adult8" id="room8label">Adult08:</label>
		<input type="number" placeholder="Adutl8" name="Adult8" id="room8" value="0" min="0" max="10">
		<label for="Child8" id="room8label">Child08:</label>
		<input type="number" placeholder="Child8" name="Child8" id="room8" value="0" min="0" max="10"> <br>
        
        </div>
		
		<input type="text" id="cityid" name="cityid" value="<?php echo $cityid?>">
		<input type="text" id="bdate" name="bdate" value="<?php echo $begindate?>">
		
		<br><br>
		
		<?php //Advanced Section ?>
		
		<input type="checkbox" id="advanced" name="advanced" onChange="advance2()">Nâng Cao</input><br>
<div id="cur">
<a id="currencya"><b>Loại tiền thanh toán:</b></a>
  		<input type="radio" id="currency" class="currency" name="currency" value="USD">
		<label for="currency" id="currencylabel" class="currencylabel"><b>USD</b></label>

    	<input type="radio" id="currency" class="currency" name="currency" value="VND" checked>
		<label for="currency" id="currencylabel" class="currencylabel"><b>VND</b></label>

    	<input type="radio" id="currency" class="currency" name="currency" value="EUR">
		<label for="currency" id="currencylabel" class="currencylabel"><b>EUR</b></label><br>
</div>

		<label for="pmax" id="maxpricelabel"><b>Giá Tối Đa:</b></label>
		<input type="number" id="maxprice" name="maxprice" min="10000"><br>
		
		
		
		<label for="srating" id="sratinglabel"><b>Sao:</b></label>
		<input type="range" id="srating" name="srating" min="1" max="5"><br>
		
		

		<label for="minprice" id="minpricelabel"><b>Giá Tối Thiểu:</b></label>
		<input type="number" id="minprice" name="minprice" min="10000"><br>
		
		
		<div id="srt">
		<a id="sorta"><b>Sắp xếp theo thứ tự:</b></a>
		<label for="sort" id="sort" class="sortlabel"><b>Bán Chạy Nhất</b></label>
    	<input type="radio" id="sort" name="sort" value="BEST_SELLER"  class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Đánh giá Sao CAO Nhất</b></label>
    	<input type="radio" id="sort" name="sort" value="STAR_RATING_HIGHEST_FIRST" class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Đánh giá Sao THẤP nhất</b></label>
    	<input type="radio" id="sort" name="sort" value="STAR_RATING_LOWEST_FIRST" class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Khoảng cách từ Trung tâm</b></label>
		<input type="radio" id="sort" name="sort" value="DISTANCE_FROM_LANDMARK" class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Khách hàng đánh giá</b></label>
		<input type="radio" id="sort" name="sort" value="GUEST_RATING" class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Giá từ CAO đên THẤP</b></label>
		<input type="radio" id="sort" name="sort" value="PRICE_HIGHEST_FIRST" class="sort">
		<label for="sort" id="sort" class="sortlabel"><b>Giá từ THẤP đến CAO</b></label>
		<input type="radio" id="sort" name="sort" value="PRICE" class="sort" checked><br>
        </div>
	
	

		<label for="gratingmin" id="gratingminlabel"><b>Khách đánh giá MIN Sao:</b></label>
		<input type="number" id="gratingmin" name="gratingmin" value="2" min="1" max="5"><br>
		
		
		
		
		
		 <button type="submit" name="hotel-submit">Warm 'n Cozy!</button>
		
		
		
		</form>
	</div>
	
	
	<a href="index.php"><b>Trở về Trang Chính!</b></a>
	
	
		<script>

let i = document.querySelector('#num'),
    o = document.querySelector('output');

o.innerHTML = i.value;

// use 'change' instead to see the difference in response
i.addEventListener('input', function () {
  o.innerHTML = i.value;
  showroom(i.value);
}, false);

function showroom(checkboxElem) {

//var a = document.getElementById("room1");
var b = document.getElementById("room").querySelectorAll("#room2");
var blabel = document.getElementById("room").querySelectorAll("#room2label");
var c = document.getElementById("room").querySelectorAll("#room3");
var clabel = document.getElementById("room").querySelectorAll("#room3label");
var d = document.getElementById("room").querySelectorAll("#room4");
var dlabel = document.getElementById("room").querySelectorAll("#room4label");
var e = document.getElementById("room").querySelectorAll("#room5");
var elabel = document.getElementById("room").querySelectorAll("#room5label");
var f = document.getElementById("room").querySelectorAll("#room6");
var flabel = document.getElementById("room").querySelectorAll("#room6label");
var g = document.getElementById("room").querySelectorAll("#room7");
var glabel = document.getElementById("room").querySelectorAll("#room7label");
var h = document.getElementById("room").querySelectorAll("#room8");
var hlabel = document.getElementById("room").querySelectorAll("#room8label");


	switch(checkboxElem){
		case "2": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "none";
            c[1].style.display = "none";
            clabel[0].style.display = "none";
            clabel[1].style.display = "none";
            
			d[0].style.display = "none";
            d[1].style.display = "none";
            dlabel[0].style.display = "none";
            dlabel[1].style.display = "none";
            
			e[0].style.display = "none";
            e[1].style.display = "none";
            elabel[0].style.display = "none";
            elabel[1].style.display = "none";
            
			f[0].style.display = "none";
            f[1].style.display = "none";
            flabel[0].style.display = "none";
            flabel[1].style.display = "none";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "3": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[1].style.display = "block";
            
			d[0].style.display = "none";
            d[1].style.display = "none";
            dlabel[0].style.display = "none";
            dlabel[1].style.display = "none";
            
			e[0].style.display = "none";
            e[1].style.display = "none";
            elabel[0].style.display = "none";
            elabel[1].style.display = "none";
            
			f[0].style.display = "none";
            f[1].style.display = "none";
            flabel[0].style.display = "none";
            flabel[1].style.display = "none";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "4":
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[1].style.display = "block";
            
			d[0].style.display = "block";
            d[1].style.display = "block";
            dlabel[0].style.display = "block";
            dlabel[1].style.display = "block";
            
			e[0].style.display = "none";
            e[1].style.display = "none";
            elabel[0].style.display = "none";
            elabel[1].style.display = "none";
            
			f[0].style.display = "none";
            f[1].style.display = "none";
            flabel[0].style.display = "none";
            flabel[1].style.display = "none";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "5": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[1].style.display = "block";
            
			d[0].style.display = "block";
            d[1].style.display = "block";
            dlabel[0].style.display = "block";
            dlabel[1].style.display = "block";
            
			e[0].style.display = "block";
            e[1].style.display = "block";
            elabel[0].style.display = "block";
            elabel[1].style.display = "block";
            
			f[0].style.display = "none";
            f[1].style.display = "none";
            flabel[0].style.display = "none";
            flabel[1].style.display = "none";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "6": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[1].style.display = "block";
            
			d[0].style.display = "block";
            d[1].style.display = "block";
            dlabel[0].style.display = "block";
            dlabel[1].style.display = "block";
            
			e[0].style.display = "block";
            e[1].style.display = "block";
            elabel[0].style.display = "block";
            elabel[1].style.display = "block";
            
			f[0].style.display = "block";
            f[1].style.display = "block";
            flabel[0].style.display = "block";
            flabel[1].style.display = "block";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "7": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[1].style.display = "block";
            
			d[0].style.display = "block";
            d[1].style.display = "block";
            dlabel[0].style.display = "block";
            dlabel[1].style.display = "block";
            
			e[0].style.display = "block";
            e[1].style.display = "block";
            elabel[0].style.display = "block";
            elabel[1].style.display = "block";
            
			f[0].style.display = "block";
            f[1].style.display = "block";
            flabel[0].style.display = "block";
            flabel[1].style.display = "block";
            
			g[0].style.display = "block";
            g[1].style.display = "block";
            glabel[0].style.display = "block";
            glabel[1].style.display = "block";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
		case "8": 
			b[0].style.display = "block";
            b[1].style.display = "block";
            blabel[0].style.display = "block";
            blabel[1].style.display = "block";
            
			c[0].style.display = "block";
            c[1].style.display = "block";
            clabel[0].style.display = "block";
            clabel[0].style.display = "block";
            
			d[0].style.display = "block";
            d[1].style.display = "block";
            dlabel[0].style.display = "block";
            dlabel[1].style.display = "block";
            
			e[0].style.display = "block";
            e[1].style.display = "block";
            elabel[0].style.display = "block";
            elabel[1].style.display = "block";
            
			f[0].style.display = "block";
            f[1].style.display = "block";
            flabel[0].style.display = "block";
            flabel[1].style.display = "block";
            
			g[0].style.display = "block";
            g[1].style.display = "block";
            glabel[0].style.display = "block";
            glabel[1].style.display = "block";
            
			h[0].style.display = "block";
            h[1].style.display = "block";
            hlabel[0].style.display = "block";
            hlabel[1].style.display = "block";
			break;
		default:
			b[0].style.display = "none";
            b[1].style.display = "none";
            blabel[0].style.display = "none";
            blabel[1].style.display = "none";
            
			c[0].style.display = "none";
            c[1].style.display = "none";
            clabel[0].style.display = "none";
            clabel[1].style.display = "none";
            
			d[0].style.display = "none";
            d[1].style.display = "none";
            dlabel[0].style.display = "none";
            dlabel[1].style.display = "none";
            
			e[0].style.display = "none";
            e[1].style.display = "none";
            elabel[0].style.display = "none";
            elabel[1].style.display = "none";
            
			f[0].style.display = "none";
            f[1].style.display = "none";
            flabel[0].style.display = "none";
            flabel[1].style.display = "none";
            
			g[0].style.display = "none";
            g[1].style.display = "none";
            glabel[0].style.display = "none";
            glabel[1].style.display = "none";
            
			h[0].style.display = "none";
            h[1].style.display = "none";
            hlabel[0].style.display = "none";
            hlabel[1].style.display = "none";
			break;
	}
	
}

			
			function advance2(){
		var a = document.getElementById("cur").querySelectorAll(".currency"); 
		var alabel = document.getElementById("cur").querySelectorAll(".currencylabel");
		var aa = document.getElementById('currencya');
        
        var b = document.getElementById('maxprice');
        var blabel = document.getElementById('maxpricelabel');
		var c = document.getElementById('srating');
        var clabel = document.getElementById('sratinglabel');
		var d = document.getElementById('minprice');
        var dlabel = document.getElementById('minpricelabel');
        
		var e = document.getElementById("srt").querySelectorAll(".sort");
        var elabel = document.getElementById("srt").querySelectorAll(".sortlabel");
        var ea = document.getElementById('sorta');
        
        
		var f = document.getElementById('gratingmin');
        var flabel = document.getElementById('gratingminlabel');

		if(document.getElementById('advanced').checked){
        	for(var i = 0; i < a.length; i++){
			a[i].style.display = "block";}
            
			aa.style.display = "block";
            
            for(var j = 0; j < alabel.length; j++){
			alabel[j].style.display = "block";}
            
            b.style.display = "block";
            blabel.style.display = "block";
            
            
            c.style.display = "block";
            clabel.style.display = "block";
            
            d.style.display = "block";
            dlabel.style.display = "block";
            
            f.style.display = "block";
            flabel.style.display = "block";
            
            for(var i = 0; i < e.length; i++){
			e[i].style.display = "block";}
            
			ea.style.display = "block";
            
            for(var j = 0; j < elabel.length; j++){
			elabel[j].style.display = "block";}
 
		   }
		else{
			for(var i = 0; i < a.length; i++){
			a[i].style.display = "none";}
            
			aa.style.display = "none";
            
            for(var j = 0; j < alabel.length; j++){
			alabel[j].style.display = "none";}
            
            b.style.display = "none";
            blabel.style.display = "none";
            
            c.style.display = "none";
            clabel.style.display = "none";
            
            d.style.display = "none";
            dlabel.style.display = "none";
            
            f.style.display = "none";
            flabel.style.display = "none";
            
            for(var i = 0; i < e.length; i++){
			e[i].style.display = "none";}
            
			ea.style.display = "none";
            
            for(var j = 0; j < elabel.length; j++){
			elabel[j].style.display = "none";}

		}
	}
	</script>
	
</body>
</html>