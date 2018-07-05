<?php
	include("csdl/ketnoi.php");
	session_start();
	if(isset($_SESSION['nq_ma'])){
		$nq_ma=$_SESSION['nq_ma'];
	}else{
		$nq_ma="NQ01";		
	}
	if(!isset($_SESSION['tennguoidung']) OR $_SESSION['nq_ma']=="NQ01"  ){
		echo "<script type='text/javascript'>alert('Mời bạn đăng nhập!')</script>";
		echo '<meta http-equiv="refresh" content="0;URL=dangnhap.php"/>';
	}
	if(!isset($_SESSION['nv_gioitinh'])){
		$_SESSION['nv_gioitinh']=="nam";
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
<script type="text/javascript">
	
</script>
<body>
<?php
	$sql="SELECT * FROM nhomquyen a, nq_nqct b, nhomquyenchitiet c WHERE a.nq_ma=b.nq_ma AND b.nqct_ma=c.nqct_ma AND a.nq_ma='$nq_ma'";
	$query=mysqli_query($conn,$sql);
	while($re=mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$nqct_ma = $re['NQCT_MA'];
?>
		<?php
		echo "<script>
		$(function() {
			$('#".$nqct_ma."').show();
		});
		</script>";
		?>
<?php
	}
?>
<!-- Header -->
<div id="wrap">
    <header>
		<div class="inner relative">
			<a class="logo" href="index.php"><img src="tainguyen/hinhanh/logo.png" width="50px" height="40px" alt=""></a>
			<!-- <a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a> -->
			<nav id="navigation">
				<ul id="main-menu">
					<li>
						<a href="index.php" id="index.php">Home</a>
					</li>
					<li id="kh" style="display: none;">
						<a href="index.php?key=kh">Khách hàng</a>
					</li>
					<li id="nv" style="display: none;">
						<a href="index.php?key=nv" id="nv">Nhân viên</a>
					</li>
					<li id="qlttnq" style="display: none;">
						<a href="index.php?key=qlttnq" id="qlttnq">Thông tin quyền</a>
					</li>
					<li  id="qldv" style="display: none;">
						<a href="index.php?key=qldv">Dịch vụ</a>
					</li>
					<li id="tb">
						<a href="index.php?key=tb" >Thông báo</a>	
					</li>
					<li  id="lt" style="display:none">
						<a href="index.php?key=lt">Liệu trình</a>
					</li>
					<li  id="lttk" style="display: none;">
						<a href="index.php?key=lttk">Liệu trình thống kê</a>
					</li>
					<li  id="lh">
						<a href="index.php?key=lhtt">Lịch hẹn</a>
					</li>
					<li id="lhtk" style="display: none;">
						<a href="index.php?key=lhtk" >Lịch hẹn thống kê</a>	
					</li>
					<li class="current-menu-item">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<?php
								if($_SESSION['nv_gioitinh']=="nam"){
									echo "<img src='tainguyen/hinhanh/user-male.png'/>";
								}else{
									echo "<img src='tainguyen/hinhanh/user-female.png'/>";
								}
							?>
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
          <li><a href="#modalCapNhat" data-target="#modalCapNhat" data-toggle="modal">Thay đổi mật khẩu</a></li>
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
		}elseif($key=="lhtt"){
			include_once("nhanvien/quanly_tt_lichhen.php");
		}elseif($key=="lhtk"){
			include_once("nhanvien/quanly_tk_lichhen.php");
		}elseif($key=="nv"){
			include_once("quanly/quanly_nv_thongtin.php");
		}elseif($key=="cnnv"){
			include_once("quanly/quanly_nv_capnhat.php");
		}elseif($key=="qlttnq"){
			include_once("quanly/quanly_tt_nhomquyen.php");
		}elseif($key=="tb"){
			include_once("quanly_thongbao.php");
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
              <div class="col-md-6 col-md-offset-3">
                    <div class="footer-menu">
                      <h2 class="footer-title">Spa Management Website - Desgin by</h2>
                        <ul>
                            <li><a href="#">Lê Nguyễn Bảo Ngọc - lnbn1996@gmail.com</a></li>
                            <li><a href="#">Nguyễn Minh Quân - nmquan@gmail.com</a></li>
                            <li><a href="#">Trương Thị Thanh Lam - tttlam@gmai.com</a></li>
                            <li><a href="#">Nguyễn Trung Kiên - trungkien.ng15@gmail.com</a></li>
                            <li><a href="#">Trần Nhật Linh - tnlinh@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
          	</div>
       	</div>
    </div>
</div>
<!-- End footer top area -->
 <!-- Modal cập nhật -->
<div class="modal fade" id="modalCapNhat" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content" style="background-color: white;">
            <h2 class="h2-quyen">Thay đổi mật khẩu</h2>
            <hr />
            <form id="fDoiMKhau" name="fDoiMKhau" method="post" action="xuly_doimatkhau.php" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="txtMK" class="col-sm-4 control-label">Mật khẩu cũ:</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="txtMK" id="txtMK" value="" required="">
                	</div>
                </div>
                <div class="form-group">
                    <label for="txtMK1" class="col-sm-4 control-label">Mật khẩu mới:</label>
                    <div class="col-sm-6">
                        <input type="password" name="txtMK1" id="txtMK1" class="form-control" value="" required="" onkeyup="checkLongPass(); return false;" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtMK2" class="col-sm-4 control-label">Nhập lại mật khẩu mới:</label>
                    <div class="col-sm-6">
                        <input type="password" name="txtMK2" id="txtMK2" value="" class="form-control" required="" onChange="checkPass(); return false;"/>
                        <span id="confirmMessage" class="confirmMessage"></span>
                    </div>
                </div>             
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                        <input type="submit"  class="btn btn-primary" name="btnCNMK" id="btnCNMK" value="Cập nhật"/>
                        <input type="button" class="btn btn-primary" name="btnBoQuaCNMK"  id="btnBoQuaCNMK" value="Trở về" data-dismiss="modal" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
