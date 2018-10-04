<?php
		require 'connect.php';
		session_start();
		
		if(empty($_SESSION['user']))
			header("location: login.php");
		
		if(empty($_SESSION['csrf'])){
			$token = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf']=$token;
		}
		else{
			$token=$_SESSION['csrf'];
		}
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CSRF Protected</title>
		<link type="text/css" rel="stylesheet" href="css/style.css">
		<style>
			.title{
				background-color: #646363;
			}
			
			.right-panel{
				width: 697px;
				margin-right: 248px;
			}

			.right-content{
				width: 697px;
				padding-bottom: 0px;
			}
			
			.popup{
				display:none;
				background-color: #c04848;
				position:absolute;
				left:50%;
				top:53%;
				width:250px;
				height:40px;
				margin-left: -37px;
				margin-top: 2px;
				z-index:100000;
			}
			
			.popup::before{
				top: 0;
				left: -9px;
				border-top: 9px solid #C04848;
				border-left: 9px solid transparent;
				content: "";
				position: absolute;
			}
			
			.close{
				padding: 2px 6px 3px 6px;
				font-family: Arial,sans-serif;
				font-size: 16px;
				font-weight: normal;
				color: #fcb2b1 !important;
				line-height: 1;
				float: right;
				border: 1px solid rgba(255,255,255,0.2);
				margin-top: 8px;
				margin-right: 8px;
			}
			
			.msg{
				padding-right: 5px;
				padding: 13px;
				color: white;
				width: 170px;
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
							<div class="right-content">
								<div class="row1">
									<h2 class="title">
										<span>
											<span>Create User</span> Form
										</span>
									</h2>
									<div class="row2">
										<form name="form1" method="post" onsubmit="return error()&&formValidate()" action="<?php require 'admin-insert.php';?>">
											<table cellpadding="10" cellspacing="5" style="font:13px sans-serif">
												<div class="popup" id="popup5" onclick="return drop(5)">
													<div class="close" id="close5"><a href="javascript:void(0);" style="text-decoration: none;color: white">x</a></div>
													<div class="msg" id="msg5"> </div>
												</div>
												<tr>
													<td>Username:</td>
													<td style="padding-bottom: 0px">
														<div><input type="text" name="username" id="uname" size="28" onclick="error()" onchange="error()&&unameValidation()" onkeypress="error()"/></div>
														<div class="error" id="error"></div>
													</td>
												</tr>
												<div class="popup" id="popup6" onclick="return drop(6)">
													<div class="close" id="close6"><a href="javascript:void(0);" style="text-decoration: none;color: white">x</a></div>
													<div class="msg" id="msg6"> </div>
												</div>
												<tr>
													<td>Password:</td>
													<td style="padding-top: 13px">
														<input type="password" name="password" id="password" size="28" onchange="passwordValidation(8,16)"/>
													</td>
												</tr>
												<tr>
													<td></td><td style="color:black"><?php echo $error;?></td>
												</tr>
												<input type="hidden" name="_token" value="<?php echo $token;?>"/>
												<tr>
													<td align="right">
														<a href="admin.php"><input type="button" id="back" name="back" value="Back"/></a>
													</td>
													<td>
														<input type="submit" name="insert" value="Insert"/>
													</td>
												</tr>
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