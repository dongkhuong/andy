<?php
 session_start();
 require_once $_SERVER['DOCUMENT_ROOT'].'/andy/utils/DBConnectionUtil.php'; ?>      
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V9</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../templates/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../templates/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../templates/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../templates/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>	
	<?php  
  	if(isset($_POST['login'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $querylogin = "SELECT * FROM users WHERE username ='{$username}' AND password='{$password}'";
      $rslogin = $mysqli->query($querylogin);
      $arUser = $rslogin->fetch_assoc();
      if(count($arUser)>0){
        $_SESSION['arUser']= $arUser;
        header('location:/andy/admin/restaurant/');
      }else{
        header('location:/andy/auth/?msg=Đăng nhập thất bại!');
      }
    }           ?>
	<div class="container-login100" style="background-image: url('../templates/login/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="post">
				<span class="login100-form-title p-b-37">
					Sign In
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
					<input class="input100" type="text" name="username" placeholder="username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="password" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<input type="submit" class="login100-form-btn" name="login" value="Sign In"/>
				</div>

				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>

				<div class="flex-c p-b-112">
					<a href="#" class="login100-social-item">
						<i class="fa fa-facebook-f"></i>
					</a>

					<a href="#" class="login100-social-item">
						<img src="../templates/login/images/icons/icon-google.png" alt="GOOGLE">
					</a>
				</div>

				<div class="text-center">
					<a href="#" class="txt2 hov1">
						Sign Up
					</a>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../templates/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../templates/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../templates/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../templates/login/js/main.js"></script>

</body>
</html>