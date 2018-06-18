<?php
    include_once("../csdl/ketnoi.php");
    session_start();
	function clean($string) {
		// $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
    if(isset($_POST["btnThemMoi"]))
		{
				$ten = $_POST["txtTenDV"];
				$noidung = $_POST["txtNoiDungDV"];
				$gia = clean($_POST["txtGiaDV"]);
				$trangthai = 1;
				$loi = "";
				if($ten=="" OR $noidung=="")
				{
					$loi.="Mời nhập đầy đủ thông tin";
				}
				if($loi!="")
				{
					echo "<script type='text/javascript'>alert('$loi')</script>";
					// echo "<script type='text/javascript'>document.location = 'quanly_dv_thongtin.php';</script>";
				}
				else
				{
					$sq="Select * from dichvu where dv_ten='$ten'";
					$result = mysqli_query($conn,$sq);
					if(mysqli_num_rows($result)==0)
					{
					   mysqli_query($conn, "INSERT INTO dichvu (dv_ten, dv_noidung, dv_giatien, dv_trangthai) VALUES ('$ten','$noidung','$gia','$trangthai')");
					   echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';
					}
					else
					{
						echo "<script type='text/javascript'>alert('Trùng tên dịch vụ!')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';
					}
				}

	}
    if(isset($_GET["ma"]))
    	{
	      //Nếu xóa thì lấy mã và tiến hành xóa
	        $dv_ma = $_GET["ma"];
	        $query=mysqli_query($conn, "DELETE FROM dichvu where dv_ma=$dv_ma");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';
			}else
		    {
		          echo "<script type='text/javascript'>alert('Dịch vụ yêu cầu xoá Không tồn tại!')</script>";
		          echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';
		    }
	}
	if(isset($_POST['btnXoa'])) {
		if(isset($_POST['checkbox'])){
	        for ($i=0; $i < count($_POST['checkbox']);$i++)
	        {
	          $dv_ma = $_POST['checkbox'][$i];
	          mysqli_query($conn,"DELETE FROM dichvu where dv_ma=$dv_ma");
	          echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';
	        }
	    }else{
			echo "<script type='text/javascript'>alert('Bạn chưa chọn dịch vụ cần xoá!')</script>";
			echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';		
		}
	}

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //kiểm tra xe có request Ajax gửi tới hay không
		$ma = $_GET["dv_ma"];
		$result = mysqli_query($conn, "SELECT dv_ma, dv_ten, dv_noidung, dv_giatien FROM dichvu WHERE dv_ma=$ma");
		$dv_tt = mysqli_fetch_object($result);
		echo json_encode($dv_tt);
	}
	if(isset($_POST["btnCapNhat"]))
        {
        	$ma = $_POST["dv_ma"];
			$ten = $_POST["txtTenDVCN"];
			$noidung = $_POST["txtNoiDungCN"];
			$gia = clean($_POST["txtGiaDVCN"]);
            $loi="";
            if($ten=="" OR $noidung=="" OR $gia=="")
            {
                $loi.="Mời nhập đầy đủ thông tin!";
            }
            if($loi!="")
            {
            	echo "<script type='text/javascript'>alert('$loi')</script>";
                echo "<script type='text/javascript'>document.location = 'quanly_dv_thongtin.php';</script>";
            }
            else
            {   
	            mysqli_query($conn, "UPDATE dichvu SET dv_ten = '$ten', dv_noidung='$noidung', dv_giatien='$gia' WHERE dv_ma=$ma");
	            echo "<script type='text/javascript'>document.location = 'quanly_dv_thongtin.php';</script>";
            }
        }	
?> 