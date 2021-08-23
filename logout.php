<?php
	session_start();
	unset($_SESSION['username']);
	echo "登出中...";
	echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
?>