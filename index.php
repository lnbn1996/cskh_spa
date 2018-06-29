<?php
	include("csdl/ketnoi.php");
	session_start();
	if(!isset($_SESSION['tennguoidung'])){
		echo "<script type='text/javascript'>alert('Mời bạn đăng nhập!')</script>";
		echo '<meta http-equiv="refresh" content="0;URL=dangnhap.php"/>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- Bootsrap -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
	<!-- Font Css -->
	<link rel="stylesheet" type="text/css" href="tainguyen/css/font-awesome.css" />
	<!-- Custom Css -->
	<link rel="stylesheet" type="text/css" href="tainguyen/css/menu.css" />
	<link rel="stylesheet" href="tainguyen/css/style.css">
	<link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
	<link rel="stylesheet" href="tainguyen/css/responsive.css">
	<!-- Javascript -->
	<script src="tainguyen/js/jquery-3.2.0.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<!--     <script src="tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="tainguyen/js/dataTables.bootstrap.min.js"></script> -->

	<!-- JS (load angular, ui-router, and our custom file) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.0/angular.min.js"></script>
<!--     <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-router/1.0.18/angular-ui-router.js"></script> -->
    <script src="tainguyen/js/routing.js"></script>
    <script src="tainguyen/js/funcs.js"></script>
    <script type="text/javascript" src="tainguyen/js/jquery.js"></script>
	<script type="text/javascript" src="tainguyen/js/function.js"></script>

	<title>Trang chủ </title>

</head>
<body>
<!-- Header -->
<div id="wrap">
    <header>
		<div class="inner relative">
			<a class="logo" href="index.php"><img src="tainguyen/hinhanh/logo.png" width="50px" height="40px" alt=""></a>
			<!-- <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a> -->
			<nav id="navigation">
				<ul id="main-menu">

					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="index.php?key=qldv">Dịch vụ</a>
					</li>
					<li>
						<a href="index.php?key=kh">Khách hàng</a>
					</li>
					<li>
						<a href="index.php?key=nv">Nhân viên</a>
					</li>
					<li>
						<a href="index.php?key=ttlh">Lịch hẹn</a>
					</li>
					<li>
						<a href="index.php?key=lt">Liệu trình</a>
					</li>
					<li>
						<a href="index.php?key=lttk">Liệu trình thống kê</a>
					</li>
					<li>
						<a href="index.php?key=lhtk">Lịch hẹn thống kê</a>
					</li>
					<li class="current-menu-item">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span class="glyphicon glyphicon-user"></span>
							<?php 
								if(isset($_SESSION["nv_hoten"])){
									echo " ".$_SESSION["nv_hoten"];	
								}else{
									echo '<meta http-equiv="refresh" content="0;URL=dangnhap.php"/>';
								}
							?>
						</a>
        <ul class="dropdown-menu">
          <li><a href="index.php?key=cnnv&id=<?php echo $_SESSION['nv_ma']; ?>">Xem thông tin </a></li>
          <li><a href="dangxuat.php">Đăng xuất</a></li>
        </ul>

				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</header>
</div>
<!-- End Header -->

<!-- Content  -->

<div class="content">
    <?php
	if(isset($_GET['key']))
	{
		$key = $_GET['key'];
		if($key=="qldv"){
			include_once("nhanvien/quanly_dv_thongtin.php");
		}elseif($key=="xldv"){
			include_once("nhanvien/xuly_dv.php");
		}elseif($key=="ttlh"){
			include_once("nhanvien/quanly_tt_lichhen.php");
		}elseif($key=="kh"){
			include_once("nhanvien/quanly_kh_thongtin.php");
		}elseif($key=="cnkh"){
			include_once("nhanvien/quanly_kh_capnhat.php");
		}elseif($key=="lt"){
			include_once("nhanvien/quanly_lieutrinh_thongtin.php");
		}elseif($key=="ltct"){
			include_once("nhanvien/quanly_lieutrinh_chitiet.php");
		}elseif($key=="lttk"){
			include_once("nhanvien/quanly_lieutrinh_thongke.php");
		}elseif($key=="lhtk"){
			include_once("nhanvien/quanly_tk_lichhen.php");
		}elseif($key=="nv"){
			include_once("quanly/quanly_nv_thongtin.php");
		}elseif($key=="cnnv"){
			include_once("quanly/quanly_nv_capnhat.php");
		}
	}
	else{
		include("noidungtrangchu.php");
	}
	?>
</div>
<!-- End / Content  -->

<!-- Footer -->
<div class="footer">
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
          	</div>
       	</div>
    </div>
</div>
<!-- End footer top area -->

</body>
</html>
