<?php
	include("../csdl/ketnoi.php");
	if(isset($_POST['btnUpdateLH'])){
			//Nếu xóa thì lấy mã và tiến hành xóa
	        $lh_ma = $_POST["txtLhMa"];
	        if(isset($_POST["cb_lhtrangthai"])){
	        	$lh_trangthai = $_POST["cb_lhtrangthai"];
	        	if($lh_trangthai==0){
	        		$lh_trangthai=1;
	        	}
	    	}else{
	    		$lh_trangthai = 0;
	    	}
	    	// echo $lh_trangthai;
	        $query=mysqli_query($conn, " UPDATE lichhen SET lh_trangthai = '$lh_trangthai' WHERE lh_ma='$lh_ma' ");
	        if($query){
	        	echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=lhtt"/>';
			}else
		    {
		          echo "<script type='text/javascript'>alert('Đã xảy ra lỗi, không xác nhận lịch hẹn được!')</script>";
		          echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=lhtt"/>';
		    }
	}
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //kiểm tra xe có request Ajax gửi tới hay không
		$ma = $_GET["lh_ma"];
		$result = mysqli_query($conn, "SELECT LH_MA, KH_HOTEN, KH_SDT, DATE_FORMAT(LH_NGAY,'%d-%m-%Y') as LH_NGAY, LH_THOIGIAN, LH_NOIDUNG, LH_CHUDE, LH_TRANGTHAI FROM lichhen a, khachhang b WHERE a.KH_MA=b.KH_Ma AND lh_ma=$ma");
		$lh_tt = mysqli_fetch_object($result);
		echo json_encode($lh_tt);
	}
	if(isset($_POST["btnCapNhat"]))
        {
        	date_default_timezone_set('Asia/Ho_Chi_Minh');
            $ma = $_POST["lh_ma"];
            $giohen = $_POST["GioHen"];
            $trangthai = $_POST["rdXacNhan"];
            $ngay = strtotime($_POST["NgayHen"]);
            $ngayhen = date('Y-m-d',$ngay);
            /*lay ngay hen cũ đem so sánh*/
            $slngay=mysqli_query($conn,"SELECT lh_ngay from lichhen where lh_ma='$ma'");
            $r1=mysqli_fetch_array($slngay,MYSQLI_ASSOC);
            $old=$r1["lh_ngay"];
            //=================
            if($trangthai==2){
		       	$query=mysqli_query($conn, "UPDATE lichhen SET lh_ngay = '$ngayhen', lh_thoigian='$giohen', lh_trangthai='$trangthai' WHERE lh_ma='$ma' ");
		        if($query){
		        	echo "<script type='text/javascript'>document.location = '../index.php?key=lhtt';</script>";
		        }else{
		        	echo "<script type='text/javascript'>alert('Đã xảy ra lỗi, không xác nhận lịch hẹn được!')</script>";
		          	echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=lhtt"/>';
		        }            	
            }elseif($ngayhen >= $old){
		       	$query=mysqli_query($conn, "UPDATE lichhen SET lh_ngay = '$ngayhen', lh_thoigian='$giohen', lh_trangthai='$trangthai' WHERE lh_ma='$ma' ");
		        if($query){
		        	echo "<script type='text/javascript'>document.location = '../index.php?key=lhtt';</script>";
		        }else{
		        	echo "<script type='text/javascript'>alert('Đã xảy ra lỗi, không xác nhận lịch hẹn được!')</script>";
		          	echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=lhtt"/>';
		        }
	    	}else{
	    		echo "<script type='text/javascript'>alert('Ngày hẹn phải là hôm nay hoặc những ngày sau!')</script>";
		        echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=lhtt"/>';
	    	}
        }	
?>