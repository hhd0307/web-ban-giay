<?php 
require_once 'library/init.php';
?>
<!DOCTYPE HTML>
<html>

<head>
	<title><?php echo $title ?></title>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!-- Custom Theme files -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

</head>

<body>
	<!--header strat here-->
	<div class="header">
		<div class="container">
			<div class="header-main">
				<div class="top-nav">
					<div class="content white">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<div class="navbar-brand logo">
									<a href="index.html">
										<img src="images/logo1.png" alt="">
									</a>
								</div>
							</div>
							<!--/.navbar-header-->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<li>
										<a href="index.php">Trang chủ</a>
									</li>
									<?php
										$sql_get_list = "SELECT * FROM theloai";
										if($db->num_rows($sql_get_list)) {
											foreach ($db->fetch_assoc($sql_get_list) as $key => $theloai) {
												echo 
												'
												<li><a href="theloai.php?Id='.$theloai['Id'].'">'.$theloai['Ten'].'</a></li>
												';
											}
										}
									?>
								</ul>
							</div>
							<!--/.navbar-collapse-->
						</nav>
						<!--/.navbar-->
					</div>
				</div>
				<div class="header-right">
					<div class="search">
						<div class="search-text">
							<form action="timsanpham.php" method="POST">
							<input class="serch" id="noidung" name="noidung" type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}"
							/>
							</form>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--header end here-->