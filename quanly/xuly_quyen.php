<?php
  		include_once("../csdl/ketnoi.php");
  		session_start();	
		if(isset($_POST["btnThemMoi"]))
		{
				$ten = $_POST["txtTenQ"];
				$mota = $_POST["txtMoTaQ"];
				$trangthai = 1;
				$loi = "";
				if($ten=="" OR $mota=="")
				{
					$loi.="Mời nhập đầy đủ thông tin";
				}
				if($loi!="")
				{
					echo "<script type='text/javascript'>alert('$loi')</script>";
					echo "<script type='text/javascript'>document.location = 'quanly_quyen_thongtin.php';</script>";
				}
				else
				{
					$sq="Select * from nhomquyenchitiet where NQCT_TEN='$ten'";
					$result = mysqli_query($conn,$sq);
					if(mysqli_num_rows($result)==0)
					{
					   mysqli_query($conn, "INSERT INTO nhomquyenchitiet (nqct_ten, nqct_diengiai, nqct_trangthai) VALUES ('$ten','$mota','$trangthai')");
					   echo '<meta http-equiv="refresh" content="0;URL=quanly_quyen_thongtin.php"/>';
					}
					else
					{
						echo "<script type='text/javascript'>alert('Trùng tên quyền!')</script>";
						echo '<meta http-equiv="refresh" content="0;URL=quanly_quyen_thongtin.php"/>';
					}
				}

		}
	    if(isset($_POST['btnXoa']) && isset($_POST['checkbox'])) {
	        for ($i=0; $i < count($_POST['checkbox']);$i++)
	        {
	          $nqct_ma = $_POST['checkbox'][$i];
	          mysqli_query($conn,"DELETE FROM nhomquyenchitiet where nqct_ma=$nqct_ma");
	          echo '<meta http-equiv="refresh" content="0;URL=quanly_quyen_thongtin.php"/>';
	        }
		}else{
		          echo "<script type='text/javascript'>alert('Bạn chưa chọn quyền cần xoá!')</script>";
		          echo '<meta http-equiv="refresh" content="0;URL=quanly_dv_thongtin.php"/>';		
		}
    	if(isset($_GET["ma"]))
    	{
	      //Nếu xóa thì lấy mã và tiến hành xóa
	        $nqct_ma = $_GET["ma"];
	        $query=mysqli_query($conn, "DELETE FROM nhomquyenchitiet where nqct_ma=$nqct_ma");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=quanly_quyen_thongtin.php"/>';
			}else
		    {
		          echo "<script type='text/javascript'>alert('Quyền yêu cầu xoá Không tồn tại!')</script>";
		          echo '<meta http-equiv="refresh" content="0;URL=quanly_quyen_thongtin.php"/>';
		    } //Nếu không truyền mã để xóa thì báo lỗi
	    }
	     
	    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //kiểm tra xe có request Ajax gửi tới hay không
				$ma = $_GET["nqct_ma"];
				$result = mysqli_query($conn, "SELECT nqct_ma, nqct_ten, nqct_diengiai FROM nhomquyenchitiet WHERE nqct_ma=$ma");
				$nqct_tt = mysqli_fetch_object($result);
				echo json_encode($nqct_tt);
		}
		if(isset($_POST["btnCapNhat"]))
        {
            $ma = $_POST["nqct_ma"];
            $ten = $_POST["txtTenQ"];
            $diengiai = $_POST["txtMoTaQ"];
            $loi="";
            if($ten=="" OR $diengiai=="")
            {
                $loi.="Mời nhập đầy đủ thông tin!";
            }
            if($loi!="")
            {
            	echo "<script type='text/javascript'>alert('$loi')</script>";
                echo "<script type='text/javascript'>document.location = 'quanly_quyen_thongtin.php';</script>";
            }
            else
            {   
	            mysqli_query($conn, "UPDATE nhomquyenchitiet SET nqct_ten = '$ten', nqct_diengiai='$diengiai' WHERE nqct_ma=$ma");
	            echo "<script type='text/javascript'>document.location = 'quanly_quyen_thongtin.php';</script>";
            }
        }
	?>