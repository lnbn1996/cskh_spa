<?php
	session_start();
	include('csdl/ketnoi.php');
	if(isset($_POST['btnDangNhap'])){
		$user = $_POST['tennguoidung'];
		$pass = md5($_POST['matkhau']);
		$sql = "SELECT * FROM TAIKHOAN WHERE TENNGUOIDUNG='$user' AND MATKHAU='$pass' ";
		$query = mysqli_query($conn,$sql);
		if(mysqli_num_rows($query) != 0){ //Đếm số hàng trả về
			$row = mysqli_fetch_array($query);
			if($pass===$row['MATKHAU']){
				$_SESSION['tennguoidung'] = $row['TENNGUOIDUNG'];
				$_SESSION['nq_ma'] = $row['NQ_MA'];
				$q=mysqli_query($conn,"SELECT NV_MA, NV_HOTEN, NV_GIOITINH FROM NHANVIEN WHERE TENNGUOIDUNG='$user'");
				$r=mysqli_fetch_array($q,MYSQLI_ASSOC);
				$_SESSION['nv_hoten'] = $r['NV_HOTEN'];
				$_SESSION['nv_ma'] = $r['NV_MA'];
				$_SESSION['nv_gioitinh'] = $r['NV_GIOITINH'];
				header('Location: index.php');
			}
			else{
				echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không hợp lệ')</script>";
            	echo "<script type='text/javascript'>document.location = 'dangnhap.php';</script>";
			}
		}
		else{
			echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không hợp lệ')</script>";
            echo "<script type='text/javascript'>document.location = 'dangnhap.php';</script>";
		}
	}
	else{
		echo "Lỗi 4";
		echo "<script type='text/javascript'>alert('Đăng nhập thất bại!')</script>";
        echo "<script type='text/javascript'>document.location = 'dangnhap.php';</script>";
	}
?>