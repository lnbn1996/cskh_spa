<?php
include_once('../csdl/ketnoi.php');
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
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!aaaaaaa')</script>";
                        // echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>";   
                    }
                }else{
                    // echo mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!')</script>";
                    echo "<script type='text/javascript'>document.location = '../index.php?key=qlttnq';</script>"; 
                }
        }
?>