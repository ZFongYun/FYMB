<?php
	session_start();
	$id = $_POST['d']; //訊息編號
	$name = $_SESSION['username']; //用戶名稱
	
	//連線資料庫
	$con = @mysqli_connect("localhost","yun","samyT816nK");
	if(mysqli_connect_errno($con))
		die ("無法連線");
	
	echo "連結成功"."<br>";
	
	//選擇資料庫
	mysqli_select_db($con,"test");
	
	//是否為數值
	if(is_numeric($id))
	{
		//尋找指定的樓層
		$sql_select = "SELRCT * FROM message WHERE id='$id'";
		$sql_select = "SELECT * FROM message WHERE id='$id'";
		if(mysqli_query($con,$sql_select))
		{
			//將指定的id和name刪除
			$sql = "DELETE FROM message WHERE id='$id' AND name='$name'";
			mysqli_query($con,$sql);
	
			//取得被刪除筆數
			$rowDELETE = mysqli_affected_rows($con);
	
			if($rowDELETE > 0)
			{
				echo "刪除成功";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
			}
			else
			{
				echo "請勿刪除其他用戶所留言的樓層~";
				echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
			}
		}
		else
		{
			echo $sql_select;
			echo "找無此樓層";
			echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
		}
	}
	else
	{
		echo "請輸入正確樓層~";
		echo '<meta http-equiv=REFRESH CONTENT=2;url=mess.php>';
	}
	
	mysqli_close($con);
?>