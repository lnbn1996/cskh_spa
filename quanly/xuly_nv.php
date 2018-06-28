<?php
		if (isset($_POST["txtTen"])){
			$ten=$_POST["txtTen"];
			$gioitinh=$_POST["grpGioiTinh"];
			$ngay_sinh=$_POST["slNgaySinh"];
			$thang_sinh=$_POST["slThangSinh"];
			$nam_sinh=$_POST["slNamSinh"];
			$diachi=$_POST["txtDiaChi"];
			$dienthoai=$_POST["txtDienThoai"];
			$email=$_POST["txtEmail"];
			$sql="SELECT * FROM nhanvien";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($query)+1;
			$idnv="NV0".$row;
			$mk="1234567";
			$mkMD5=md5($mk);
			$sql="INSERT INTO taikhoan (`TENNGUOIDUNG`,`MATKHAU`,`NGAYTAO`,`TK_LOAI`,`NQ_MA`)VALUES('$dienthoai','$mkMD5',now(),'nhân viên',2)";
			if (mysqli_query($conn,$sql)){
				$sql1="INSERT INTO nhanvien (`NV_MA`,`NV_HOTEN`,`NV_GIOITINH`,`NV_DIACHI`,`NV_SDT`,`NV_EMAIL`,`NV_NGAYSINH`,`NV_THANGSINH`,`NV_NAMSINH`,`NV_TRANGTHAI`,`TENNGUOIDUNG`) VALUES ('$idnv','$ten','$gioitinh','$diachi','$dienthoai','$email','$ngay_sinh','$thang_sinh','$nam_sinh','1','$dienthoai')";
				if (!mysqli_query($conn,$sql1))  {
					echo "Không thêm được tài khoản";
					// echo (mysqli_error($conn));
				}else{
					echo '<meta http-equiv="refresh" content="0;URL=index.php?key=nv"/>';
				}
			} else {
				// echo (mysqli_error($conn));
				echo "Không thêm được tài khoản";
			}

		}
    if(isset($_GET["ma"]))
    	{
	      //Nếu xóa thì lấy mã và tiến hành xóa
	        $nv_ma = $_GET["ma"];
	        $query=mysqli_query($conn, "UPDATE `nhanvien` SET NV_TRANGTHAI=0 WHERE nv_ma='$nv_ma'");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=index.php?key=nv"/>';
			}else
		    {
		          echo "<script type='text/javascript'>alert('Thông tin yêu cầu xoá Không tồn tại!')</script>";
		          // echo (mysqli_error($conn));
		          echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=nv"/>';
		    }
	}
?>
