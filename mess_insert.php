<?php
	session_start();
	$mess = $_POST['m']; //留言內容
	$name = $_SESSION['username']; //用戶名稱
	
	//連線資料庫
	require_once("connect.php");
	
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