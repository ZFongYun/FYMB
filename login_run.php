<?php
	session_start();
	$user = $_POST['user']; //用戶名稱
	$pw = $_POST['pw']; //密碼
	
	//連線資料庫
	require_once("connect.php");
	
	$sql = "SELECT * FROM member WHERE user = '$user' AND password = '$pw'";
	$cg = mysqli_query($con,$sql);
	$re = mysqli_fetch_array($cg); //儲存查詢的結果
	
	if($re && $user!=null && $pw!=null)
	{
		$_SESSION['username'] = $user;
		echo "登入成功";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
	}
	else
	{
		echo "登入失敗，請確認用戶名稱和密碼";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=login.html>';
	}

	mysqli_close($con);
?>