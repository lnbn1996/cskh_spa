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