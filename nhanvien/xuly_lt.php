<?php
include("../csdl/ketnoi.php");
    if(isset($_POST["btnThemMoi"]))
        {
                $ten = $_POST["txtTen"];
                $sdt = $_POST["txtDT"];
                $sql1="select KH_MA from khachhang where kh_hoten='$ten' and kh_sdt='$sdt' ";
                $query1 = mysqli_query($conn,$sql1);
                if(mysqli_num_rows($query1)==1){
                    $row=mysqli_fetch_array($query1, MYSQLI_ASSOC);
                    $makh=$row['KH_MA'];
                    $tenlt = $_POST["TenLT"];
                    $loailt = $_POST["slLoaiLT"];
                    if(isset($_POST["txtMoTa"])){$mota = $_POST["txtMoTa"];}else {$mota="";}
                    if(isset($_POST["txtNoiDung"])){$noidung = $_POST["txtNoiDung"];}else {$noidung="";}
                    $trangthai = 1;
                    $sql="SELECT * FROM lieutrinh";
                    $query=mysqli_query($conn,$sql);
                    $row=mysqli_num_rows($query)+1;
                    $malt="LT0".$row;
                    $query=mysqli_query($conn, "INSERT INTO LIEUTRINH (lt_ma, lt_ten, lt_mota,lt_noidung, lt_ngaytao, lt_trangthai, KH_MA, LT_LOAI) VALUES ('$malt','$tenlt','$mota','$noidung',now(),'$trangthai','$makh','$loailt')");
                    if($query){
                        // echo '<meta http-equiv="refresh" content="0;URL=index.php?key=ltct&ma="'.$malt."/>";
                        echo "<script type='text/javascript'>document.location = 'index.php?key=ltct&ma=$malt';</script>"; 

                    }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, mời bạn kiểm tra lại thông tin!')</script>";
                        // echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = 'index.php?key=lt';</script>";    
                    }
                }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, mời bạn kiểm tra lại thông tin!')</script>";
                        // echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = 'index.php?key=lt';</script>";                     
                }
    }
    if(isset($_GET["ma"]))
        {
          //Nếu xóa thì lấy mã và tiến hành xóa
            $lt_ma = $_GET["ma"];
            $query=mysqli_query($conn, "UPDATE `LIEUTRINH` SET LT_TRANGTHAI=0 WHERE lt_ma='$lt_ma'");
            if($query){
                echo "<script type='text/javascript'>document.location = '../index.php?key=lt';</script>"; 
            }else{
                echo "<script type='text/javascript'>alert('Có lỗi xảy ra,không xoá được!')</script>";
                        // echo mysqli_error($conn);
                echo "<script type='text/javascript'>document.location = '../index.php?key=lt';</script>";                 
            }
        }
?>