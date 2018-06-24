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
			$loaida=$_POST["txtLoaiDa"];
			$cannang=$_POST["txtCanNang"];
			$chieucao= $_POST["txtChieuCao"];
			$sql="SELECT * FROM khachhang";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($query)+1;
			$idkh="KH0".$row;
			$mk=md5(floor($dienthoai/2));
			$sql="INSERT INTO taikhoan (`TENNGUOIDUNG`,`MATKHAU`,`NGAYTAO`,`TK_LOAI`,`NQ_MA`)VALUES('$dienthoai','$mk',now(),'khách hàng',1)";
			if (mysqli_query($conn,$sql)){
				$sql1="INSERT INTO khachhang (`KH_MA`,`KH_HOTEN`,`KH_GIOITINH`,`KH_NGAYSINH`,`KH_DIACHI`,`KH_SDT`,`KH_EMAIL`,`KH_CANNANG`,`KH_CHIEUCAO`,`KH_NGAYCAPNHAT`,`KH_NGAYTAO`,`KH_LOAIDA`,`KH_THANGSINH`,`KH_NAMSINH`,`KH_TRANGTHAI`,`TENNGUOIDUNG`) VALUES ('$idkh','$ten','$gioitinh',$ngay_sinh,'$diachi','$dienthoai','$email',$cannang,$chieucao,null,now(),'$loaida',$thang_sinh,$nam_sinh,'1','$dienthoai')";
				if (!mysqli_query($conn,$sql1))  {
					echo "Không thêm được tài khoản";
					//echo (mysqli_error($conn));
				}else{
					echo '<meta http-equiv="refresh" content="0;URL=index.php?key=kh"/>';
				}
			} else {
				//echo (mysqli_error($conn));
				echo "Không thêm được tài khoản";
			}

		}
    if(isset($_GET["ma"]))
    	{
	      //Nếu xóa thì lấy mã và tiến hành xóa
	        $kh_ma = $_GET["ma"];
	        $query=mysqli_query($conn, "UPDATE `khachhang` SET KH_TRANGTHAI=0 WHERE kh_ma='$kh_ma'");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=index.php?key=kh"/>';
			}else
		    {
		          // echo "<script type='text/javascript'>alert('Thông tin yêu cầu xoá Không tồn tại!')</script>";
		          echo (mysqli_error($conn));
		          // echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=kh"/>';
		    }
	}	
?> 