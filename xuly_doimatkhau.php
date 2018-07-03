<?php
	include("csdl/ketnoi.php");
	session_start();
	if(isset($_POST['btnCNMK'])){
		$tnd = $_SESSION['tennguoidung'];
		$mkold=md5($_POST['txtMK']);
		$mk1=md5($_POST['txtMK1']);
		$mk2=md5($_POST['txtMK2']);

		$qe=mysqli_query($conn,"SELECT MATKHAU FROM TAIKHOAN WHERE TENNGUOIDUNG='$tnd' ");
		$re=mysqli_fetch_array($qe,MYSQLI_ASSOC);
		if($mkold==$re['MATKHAU']){
			$query=mysqli_query($conn,"UPDATE `TAIKHOAN` SET MATKHAU='$mk1' WHERE TENNGUOIDUNG='$tnd' ");
			if($query){
				session_destroy();
				echo "<script type='text/javascript'>alert('Cập nhật thành công, mời bạn đăng nhập lại')</script>";
	            echo "<script type='text/javascript'>document.location = 'dangnhap.php';</script>";
        	}else{
				echo "<script type='text/javascript'>alert('Có lỗi xảy ra, hãy kiểm tra lại')</script>";
	            echo "<script type='text/javascript'>document.location = 'index.php';</script>";
        	}
		}else{
			echo "<script type='text/javascript'>alert('Mật khẩu cũ không khớp')</script>";
            echo "<script type='text/javascript'>document.location = 'index.php';</script>";	
			// echo mysqli_error($conn);
		}
	}
?>