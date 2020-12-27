<?php
$systime = time();
$sysdate = date("Y-m-d",$systime);
?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Here We Go!</title>
	</head>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}


.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {


}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
#returndatelabel{
    display: none;
}
#returndate{
    display: none;
}
</style>
<body>





<form action="/main.php" method="post">
  <div class="imgcontainer">
    <img src="WeGo.png" alt="Avatar" class="avatar">
    <h1 style="color: hotpink;text-align: center">Nào mình cùng đi - Here We Go!</h1>
  </div>

  <div class="container">
    <label for="begin"><b>Điểm khởi hành</b></label>
    <input type="text" placeholder="Cần Thơ" name="begin" required>

    <label for="destination"><b>Điểm đến</b></label>
    <input type="text" placeholder="Hà Nội, Côn Đảo,..." name="destination" required>
	  
	<label for="bdate"><b>Ngày khởi hành:</b></label>
	<input type="date" value="<?php echo $sysdate?>" name="bdate" required><br>
	  

	  
	<label for="twoway"><b>Khứ hồi</b></label>
    <input type="radio" id="twoway"  onchange="showdate(this)" name="twoway" value="Yes">
    <label for="twoway"><b>Một chiều</b></label>
    <input type="radio" id="twoway" onchange="showdate(this)" name="twoway" value="No" checked>
    <label for="rdate" id="returndatelabel"><b>Ngày trở về:</b></label>
	<input type="date" value="<?php echo $sysdate?>" name="rdate" id="returndate">
	  
        
    <button type="submit" name="travel-submit">Here We Go!</button>

  </div>

</form>

<i style="color:lightgrey">&nbsp;&nbsp;Nếu bạn như bạn click We Go, tức là bạn đã đồng ý với các điều khoản và điều kiện của chúng tôi</i>

	
	<script>
function showdate(checkboxElem) {
var y = document.getElementById("returndate");
var x = document.getElementById("returndatelabel");
  if (checkboxElem.value == "Yes") {
    y.style.display = "block";
    x.style.display = "block";
  } else {
    y.style.display = "none";
    x.style.display = "none";
    
  }
}
	</script>
	
	</body>
</html>