<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
<link rel="stylesheet" type="text/css" href="tainguyen/css/custom-style.css" />
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
<script src="tainguyen/js/jquery-3.2.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="tainguyen/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="tainguyen/css/menu.css" />
<script type="text/javascript" src="tainguyen/js/jquery.js"></script>
<script type="text/javascript" src="tainguyen/js/function.js"></script>
<title>Trang chủ </title>
</head>

<div id="wrap">

    <header>

		<div class="inner relative">
			<a class="logo" href="index.php"><img src="tainguyen/hinhanh/logo.png" width="50px" height="40px" alt="Panda Spa"></a>
			<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
			<nav id="navigation">
				<ul id="main-menu">
					<li class="current-menu-item"><a href="index.php">Home</a></li>
					<li class="parent">
						<a href=""><img src="tainguyen/hinhanh/plus-gray.png" /> Chức năng</a>
						<ul class="sub-menu">
							<li><a href=""><i class="icon-wrench"></i> Elements</a></li>
							<li><a href=""><i class="icon-credit-card"></i>  Pricing Tables</a></li>
							<li><a href=""><i class="icon-gift"></i> Icons</a></li>
							<li>
								<a class="parent" href="#"><i class="icon-file-alt"></i> Pages</a>
								<ul class="sub-menu">
									<li><a href="">Full Width</a></li>
									<li><a href="">Left Sidebar</a></li>
									<li><a href="">Right Sidebar</a></li>
									<li><a href="">Double Sidebar</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="">Thông báo </a></li>
					<li class="parent">
						<a href=""><img src="tainguyen/hinhanh/plus-gray.png" /> Blog</a>
						<ul class="sub-menu">
							<li><a href="">Large Image</a></li>
							<li><a href="">Medium Image</a></li>
							<li><a href="">Masonry</a></li>
							<li><a href="">Double Sidebar</a></li>
							<li><a href="">Single Post</a></li>
						</ul>
					</li>
					<li><a href="">Liên hệ</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</header>
</div>

<!-- Nội Dung Trang chủ -->

<div class="content" >

  <?php
    include ("noidungtrangchu.php");
  ?>

</div>



<!-- FOOTER -->
<div class="footer">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">

	<link href="tainguyen/css/csseshop/responsive.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="tainguyen/css/font-awesome.min.css">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="tainguyen/css/style.css">
    <link rel="stylesheet" href="tainguyen/css/responsive.css">




  <div class="footer-top-area">

        <div class="container">
            <div class="row">



                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                      <h2 class="footer-title"> Khách hàng </h2>
                        <ul>
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Liên hệ</a></li>
                            <li><a href="#">Sở thích</a></li>
                            <li><a href="#">Nhà cung cấp</a></li>
                            <li><a href="#">Thông tin khác</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-title"> Dịch vụ</h2>

                        <ul>
                            <li><a href="#">Làm đẹp</a></li>
                        </ul>
                    </div>
          </div>
          </div>
            </div>
            </div>
</div>

             <!-- End footer top area -->
</body>

<html>
