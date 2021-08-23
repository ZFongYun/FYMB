<?php
	session_start();
	$mess = $_POST['m']; //留言內容
	$name = $_SESSION['username']; //用戶名稱
	
	//連線資料庫
	$con = @mysqli_connect("localhost","yun","samyT816nK");
	if(mysqli_connect_errno($con))
		die("無法連線");
	
	echo "連結成功"."<br>";
	
	//選擇資料庫
	mysqli_select_db($con, "test"); //指定資料庫
	
	if($mess != null) //判斷送出留言是否為空值
	{
		$sql = "INSERT INTO message (name,mess) VALUES ('$name','$mess')"; //加入留言
		if(mysqli_query($con, $sql))
		{
			echo "送出成功";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
		}
		else
		{
			echo "送出失敗";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
		}
	}
	else
	{
		echo "送出失敗";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
	}
	
	mysqli_close($con);
?>