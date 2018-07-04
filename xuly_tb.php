<?php
	if (isset($_POST["btnThemMoi"])){
		$ten=$_POST["txtTenTB"];
		$noidung=$_POST["txtNoiDungTB"];
		$loai=$_POST["txtTenL"];
		$nvma=$_SESSION['nv_ma'];
		$sql="INSERT INTO `thongbao`(`TB_TEN`,`TB_NOIDUNG`,`TB_NGAYDANG`,`TB_LOAI`,`NV_MA`) VALUES('$ten','$noidung',now(),'$loai','$nvma')";
		if (mysqli_query($conn,$sql)){
					echo '<meta http-equiv="refresh" content="0;URL=index.php?key=tb"/>';
		} else {
				//echo (mysqli_error($conn));
		        echo "<script type='text/javascript'>alert('Thông báo không thêm được')</script>";
		        echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=tb"/>';
		}
	}
    if(isset($_GET["ma"]))
    	{
	      //Nếu xóa thì lấy mã và tiến hành xóa
	        $tb_ma = $_GET["ma"];
	        $query=mysqli_query($conn, "UPDATE `thongbao` SET TB_TRANGTHAI=0 WHERE tb_ma='$tb_ma'");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=index.php?key=tb"/>';
			}else
		    {
		          echo "<script type='text/javascript'>alert('Thông báo không tồn tại')</script>";
		          // echo (mysqli_error($conn));
		          echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=tb"/>';
		    }
	}
?>
