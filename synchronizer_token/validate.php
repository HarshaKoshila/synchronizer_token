<?php
	require 'connect.php';
	if(isset($_POST["login"])){
		if(!empty($_POST["uname"])&&!empty($_POST["pass"])){
			$uname=$_POST["uname"];
			$pass=$_POST["pass"];
			
			$query="SELECT admin_id,username,password FROM `user`.`user` WHERE username='$uname'";
			$record=mysql_query($query);
			
			if(!mysql_num_rows($record)==0){
				while($row=mysql_fetch_array($record)){
					$dbAdmin=$row['admin_id'];
					$dbName=$row['username'];
					$dbPass=$row['password'];
				}
				
				if(($dbName==$uname)&&($dbPass==$pass))
					require 'session.php';
				else
					$error="Invalid password";
			}
			else
				$error="Your login name or password is invalid";
		}
		else
			$error="Enter username and password";
	}
	mysql_close();
?>