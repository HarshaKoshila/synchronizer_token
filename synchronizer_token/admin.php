<?php
		require 'connect.php';
		session_start();
		if(empty($_SESSION['user']))
			header("location: login.php");
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CSRF Protected</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<style>
			.content{
				width: 989px;
			}
			
			.right-panel{
				width: 697px;
				margin-right: 248px
			}

			.right-content{
				width: 697px;
				height: 160px;
				padding-bottom:0px
			}
			
			.title{
				background-color: #646363;
			}
			
			.user{
				clear: both;
				padding-top: 20px;
			}
			
			.result{
				clear: both;
				float: left;
				font-family: monospace;
				font-size: 14px;
				padding-top: 20px;
				width: 500px;
			}
			
			.result td{
				padding-right: 50px;
				padding-bottom: 8px;
			}
			
			.result a:link{
				text-decoration: none;
			}
			
			.result a:hover{
				text-decoration: underline;
			}
			
			.yes{
				float: left;
 				width: 60px;
    			margin-left: 68px;
    			margin-right: 20px;
			}
			
			.yes a:hover{
				padding-left: 9px;
				padding-right: 9px;
			}
			
			.no{
				float: left;
				width: 60px;
				margin-right: 72px;
				margin-left: 20px;
			}
			
			.no a:link{
				padding-left: 12px;
				padding-right: 12px;
			}
			
			.no a:hover{
				padding-left: 13px;
				padding-right: 13px;
			}
		</style>
		<script>
			function popup(){
				var overlay = document.getElementById("overlay");
				var popup = document.getElementById("popuplogin");
				overlay.style.display = "block";
				popup.style.display = "block";
			}
	
			function dropoverlay(){
				document.getElementById("popuplogin").style.display = "none";
				document.getElementById("overlay").style.display = "none";
			}
		</script>
	</head>
	<body>
		<div class="main">
			<div class="page">
				<div class="header">
					<div class="topmenu">
					</div>
					<div class="login">
						<?php
							if($_SESSION['logged']==true)
								echo "<p><a href='javascript:void(0)'>".$_SESSION['user']."</a> | <a href='#' onclick='popup()'>Log out</a></p>";
							else
								echo "<p><a href='login.php'>Log in</a></p>";
						?>
					</div>
				</div>
				<div class="content">
					<div class="content-in">
						<div class="right-panel">
							<div id="right-content" class="right-content">
								<div class="row1">
									<h2 class="title">
										<span>
											<span>Administration</span> of User Data
										</span>
									</h2>
									<div class="row2">
										<div class="user">
											<form method="post" action="">
												<table>
													<td><a href="admin-add-user.php"><input type="button" name="insert" value="Add User"/></a></td>
												</table>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="popupmenu" class="popupmenu">
			<div id="overlay" class="overlay">
			</div>
			<div id="popuplogin" class="popuplogin">
				<br/><br/>
				Are you sure you want to log out?
				<br/><br/><br/>
				<div id="yes" class="yes"><a href="logout.php">Yes</a></div>
				<div id="no" class="no"><a href="#" onclick="dropoverlay()">No</a></div>
			</div>
		</div>
	</body>
</html>