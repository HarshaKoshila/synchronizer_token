<?php
	session_start();
	$_SESSION['logged']=true;
	$_SESSION['user']=$dbName;
	$_SESSION['admin']=$dbAdmin;
	if(!empty($_SESSION['user'])||!empty($_SESSION['admin']))
		header("location: admin.php");
	else{
		$_SESSION['user']=$username;
		header("location: login.php");
	}
?>
