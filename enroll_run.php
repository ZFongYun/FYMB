<?php
	$user = $_POST['user']; //用戶名稱
	$pw = $_POST['pw']; //密碼
	
	//連線資料庫
	$con = @mysqli_connect("localhost","yun","samyT816nK");
	if(mysqli_connect_errno($con))
		die("連線失敗");
		
	echo "連結成功"."<br>";
	
	//選擇資料庫
	mysqli_select_db($con,"test");
	
	$sql_select = "SELECT * FROM member WHERE user = '$user'";
	$cg = mysqli_query($con,$sql_select);
	$re = mysqli_fetch_array($cg);
	
	//判斷用戶是否已存在
	if($re[0] == $user)
	{
		echo "用戶名稱已重複";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=enroll.html>';
	}
	else if($user!=null && $pw!=null)	//判斷用戶名稱和密碼是否為空值
	{
		//寫入用戶和密碼
		$sql_add = "INSERT INTO member (user,password) VALUES ('$user','$pw')";
		if(mysqli_query($con, $sql_add))
		{
			echo "註冊成功";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=login.html>';
		}
		else
		{
			echo "註冊失敗";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=enroll.html>';
		}
	}
	else
	{
		echo "請輸入用戶名稱和密碼";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=enroll.html>';
	}

	mysqli_close($sql);
?>