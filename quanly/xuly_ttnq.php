<?php
include_once('../csdl/ketnoi.php');
    if(isset($_GET['nq_ma'])){
        $nq_ma=$_GET['nq_ma'];
        $query=mysqli_query($conn,"UPDATE `TAIKHOAN` SET NQ_MA=Null WHERE NQ_MA='$nq_ma'");
        if($query){
            $q=mysqli_query($conn,"DELETE FROM NQ_NQCT WHERE NQ_MA='$nq_ma'");
            $re=mysqli_query($conn,"DELETE FROM NHOMQUYEN WHERE NQ_MA='$nq_ma'");
        }
    }
    if(isset($_GET['nq']) && isset($_GET['nqct'])){
        $nq_ma=$_GET['nq'];
        $nqct_ma=$_GET['nqct'];
        $query=mysqli_query($conn,"DELETE FROM NQ_NQCT WHERE NQ_MA='$nq_ma' AND NQCT_MA='$nqct_ma'");
        if($query){
            echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=qlttnq"/>';  
        }else{
            // echo mysqli_error($conn);
            echo "<script type='text/javascript'>alert('Có lỗi xảy ra')</script>";
            echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=qlttnq"/>'; 
        }
    }
    /* Thêm mới giai đoạn */    
    if(isset($_POST["btnThemMoi"]))
        {
        	$sql="SELECT * FROM NHOMQUYEN";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($query)+1;
			$nq_ma="NQ0".$row;
        	$tennq=$_POST['txtTenNQ'];
        	$diengiai=$_POST['txtDienGiai'];
            $sql="INSERT INTO NHOMQUYEN (nq_ma, nq_ten, nq_diengiai) VALUES ('$nq_ma','$tennq','$diengiai')";
            $query=mysqli_query($conn,$sql);
            if($query){
                    if(isset($_POST['slVaiTro'])){
                        for ($i=0; $i < count($_POST['slVaiTro']);$i++)
                        {
                            $nqct_ma = $_POST['slVaiTro'][$i];
                            $q=mysqli_query($conn,"SELECT * FROM NHOMQUYENCHITIET WHERE NQCT_MA='$nqct_ma'");
                            if(mysqli_num_rows($q)==1){
                                $query2=mysqli_query($conn,"INSERT INTO nq_nqct (nq_ma, nqct_ma) VALUES ('$nq_ma','$nqct_ma')");
                            }
                        }
                    echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>"; 
                    }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!')</script>";
                        // echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>";   
                    }
                }else{
                    // echo mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!')</script>";
                    echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>"; 
                }
        }
    if(isset($_POST['btnVaiTro'])){
        $loi="";
        $nq_ma=$_POST['slNhomQuyen'];
        if(isset($_POST['slVaiTro'])){
            for ($i=0; $i < count($_POST['slVaiTro'])-1;$i++)
            {
                $nqct_ma = $_POST['slVaiTro'][$i];
                $q=mysqli_query($conn,"SELECT * FROM nq_nqct WHERE nq_ma='$nq_ma' AND nqct_ma='$nqct_ma'");
                $num=mysqli_num_rows($q);
                if($num==0){
                    $query=mysqli_query($conn,"INSERT INTO nq_nqct (nq_ma, nqct_ma) VALUES ('$nq_ma','$nqct_ma')");
                    if(!$query){
                        $loi="Có lỗi xảy ra";
                        echo mysqli_error($conn); 
                    }
                } else {
                   $loi="Có lỗi xảy ra, không được thêm vai trò đã tồn tại trong nhóm quyền";
                   break;
                }
            }
            if($loi==""){
                echo '<meta http-equiv="refresh" content="0;URL=../index.php?key=qlttnq"/>';
            }else{
                    // echo mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('$loi')</script>";
                    echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>"; 
            }
        }
    }
?>