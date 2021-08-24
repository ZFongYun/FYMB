<?php
	$keyword = $_POST['s']; //關鍵字
	
	//連線資料庫
	require_once("connect.php");
	
	echo "連結成功"."<br>"."========搜尋結果========";
	
	$sql = "SELECT * FROM message WHERE mess LIKE '%$keyword%'";
	$cg = mysqli_query($con, $sql);
	
	//取得搜尋到的資料筆數
	$num = mysqli_num_rows($cg); 
	if($num > 0)
	{
		while($re = mysqli_fetch_array($cg))
		{
			echo "<br>";
			print $re[0] . "樓" . " "; //id
			print $re[1] . " "; //name
			print $re[3] . "<br>"; //date
			print $re[2] . "<br>"; //mess
		}
	}
	else
	{
		echo "<br>"."無結果";
	}
	echo "<br>";
	echo "<a href='mess.php'> <返回上一頁> </a>";
	
	mysqli_close($con);
?>