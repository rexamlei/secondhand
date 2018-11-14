<?php
session_start();
	//清空购物车
	if(isset($_GET['id'])){
		unset($_SESSION['shop_cart']);
		echo "<script>location.href='index.php';</script>";
	}	
?>