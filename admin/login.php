
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/bootstrap.min.js"></script>
</head>
<body>

<!--header end here-->
<!--log in start here-->
<div class="login">
	<div class="container">
		<div class="login-main">
			  <h1>Login</h1>
		  <div class="col-md-6 login-left">
			<h2>Existing User</h2>
			<form action="login.php" method="post">
				<input type="text" name="Username" placeholder="Username" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<input type="submit" name="Login" value="Login">
			</form>
		  </div>
		  <div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--log in end here-->

</body>
</html>