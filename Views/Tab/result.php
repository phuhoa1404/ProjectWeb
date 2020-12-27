<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $desname ?> We Go!</title>
<style>
.headDiv {
  border: 5px outset #EF484B;
  background-color: palevioletred;    
  text-align: center;
  font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, "sans-serif";
  text-decoration-color: white
}
.flight {
	border-right: 2px outset blue;
    width: 49%;
    float: left;
    text-align: center;
    background-color: #F1286A;
}
	.flight a{
		color: azure;
	}
	.weather a{
		color: azure;
	}
.weather {
    width: 49%;
    float: right;
    overflow: hidden;
    text-align: center;
    background-color: #F1286A;
}
	.covid{
	    float: bottom;
     text-align: center;
     border: 2px outset yellow;
     width: 100%;
	}
#backtomain{
 
  background-color: #F1286A;
  text-align: center;
	}
	#backtomain a:hover{
		background-color: #760573;
	}
	#backtomain a{
		border: 3px outset white;
		color: aliceblue;
		
	}
</style>
</head>

<body>
<div class="user" style="float: right;">
    <?php
      if(isset($_SESSION['username'])){
        echo "<p class ='nguoidung'>" .$_SESSION['username']. "
              <form action='/logout' method='POST'>
              <button class='btn btn-default' type='submit' name='logout-submit'>Đăng xuất</button>
              </form>";
      }
    ?>
</div>
<div class="headDiv">
  <h2 style="color: whitesmoke">Chào mừng đến với WeGo</h2>
	<?php if($valid == 1){
  echo "<p>Sau đây sẽ là một số thông tin cần thiết cho chuyến đi của bạn đến ".$desname." </p>";
	}
	elseif($valid == 0){
  echo "<p style='color:white'>Địa điểm <b>Không Hợp Lệ</b> Xin vui lòng kiểm tra lại!</p>";

	}
	?>
</div>

	<div class="flight">
		<br><br>
	<a style="font-weight: bold">Điểm khởi hành: <?php echo $currentpos?><br></a>
	<a style="font-weight: bold">Điểm đến: <?php echo $destinationpos?><br></a>
	<a >Hãng hàng không: </a>
	<a style="font-weight: bold"><?php echo $airliner?><br></a>
	<a >Giá vé tối thiểu: </a>
	<a style="font-weight: bold"><?php echo number_format($minprice).$moneysymbol?><br></a>
	<a >Đường bay thẳng: </a>
	<a style="font-weight: bold"><?php echo $direct?><br></a>
		<br><br><br><br>
	</div>
	
	<div class="weather">
		<br><br>
	<a style="font-weight: bold">Thời tiết tại <?php echo $desname?> thời điểm hiện tại (<?php echo $currentupdate?>)<br></a>
	<a >Nhiệt độ: <?php echo $currenttemp?>°C<br></a>
	<a >Tình trạng thời tiết: <?php echo $currentcondition?><br></a>
	<a >Độ ẩm: <?php echo $currenthumid?>%<br></a>
	<a >Nhiệt độ cảm nhận thực tế: <?php echo $currentfeelslike?>°C<br></a>
		<br><br><br><br>
	</div>
	
	<div class="covid">
		<br><br>
	<a style="font-weight: bold">Tình hình COVID tại <?php echo $covidcountry?> thời điểm hiện tại (<?php echo $covidupdate?>)<br></a>
		<a >Số lượng bệnh nhân: </a>
		<a style="font-weight: bold"><?php echo number_format($covidconfirm)?><br></a>
		<a >Số lượng nguy kịch: </a>
		<a style="font-weight: bold"><?php echo number_format($covidcrititcal)?><br></a>
		<a >Số lượng tử vong vì dịch: </a>
		<a style="font-weight: bold"><?php echo number_format($coviddeath)?><br></a>
		<a >Số lượng bệnh nhân hồi phục: </a>
		<a style="font-weight: bold"><?php echo number_format($covidrecover)?><br></a>
		
		
	
		
		<br><br>
	</div>
	
	
	<div id="backtomain">
	<a href="/">Quay lại Trang Chính</a>
		<a href="TestHotel.php?destination=<?php echo $desname?>&checkindate=<?php echo $begindate?>">Test Hotel Location</a>
	</div>
	
	
	
</body>
</html>
