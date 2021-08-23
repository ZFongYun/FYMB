<?php
	session_start();	
	echo "Hello！".$_SESSION['username']; //顯示用戶名稱
		
	$web=<<<eot
<html>
<head>
<title>留言板</title>
</head>
<body>

<a href ="logout.php">登出</a>
<p>

<form action="mess_insert.php" method="post">
留言內容 <br>
<input type="text" name="m" size=90> <input type="submit" value="送出"> <br>
<p>
</form>

<form action="mess_search.php" method="post">
搜尋關鍵字：<input type="text" name="s"> <input type="submit" value="搜尋"> <br>
<p>
</form>

<form action="mess_delete.php" method="post">
刪除樓層：<input type="text" name="d"> <input type="submit" value="刪除">
</form>

</body>
</html>
eot;
	print $web;
	
	//連線資料庫
	$con = @mysqli_connect("localhost","yun","samyT816nK");
	if(mysqli_connect_errno($con))
		die("連線失敗");
	
	echo "連結成功"."<br>";
	
	//選擇資料庫
	mysqli_select_db($con, "test");
	
	//查詢資料表
	$sql = "SELECT * FROM message";
	$cg = mysqli_query($con, $sql);
	while($re = mysqli_fetch_array($cg))
	{
		echo "<br>";
		echo $re[0] . "樓" . " "; //id
		echo $re[1] . " "; //name
		echo $re[3] . "<br>"; //date
		echo $re[2] . "<br>"; //mess
	}
	
	mysqli_close($con);
?>