<?php
    include("../csdl/ketnoi.php");
    // Delete Giai Đoạn
    if(isset($_GET["magd"])&&isset($_GET["madv"]))
        {
          //Nếu xóa thì lấy mã và tiến hành xóa
            $gd_ma = $_GET["magd"];
            $dv_ma = $_GET["madv"];
            $malt = $_GET["malt"];
            $query=mysqli_query($conn, "UPDATE `GIAIDOAN_DICHVU` SET GDDV_TRANGTHAI=0 WHERE gd_ma='$gd_ma' AND dv_ma='$dv_ma'");
            if($query){
                echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>";
            }else{
                echo "<script type='text/javascript'>alert('Có lỗi xảy ra, không thẻ xoá')</script>";
                echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>";
            }
        }
    /* Thêm mới giai đoạn */    
    if(isset($_POST["btnThemMoi"]))
        {
                $makh = $_POST["makh"];
                $tenkh = $_POST["TenKHThemMoi"];
                $malt = $_POST["malt"];
                $tenlt = $_POST["TenLTThemMoi"];
                $tengd = $_POST["GiaiDoanTen"];
                if(isset($_POST["GiaiDoanND"])){$ndgd = $_POST["GiaiDoanND"];}else{$ndgd="";}
                // Convert String To Date
                $ngayA = strtotime($_POST["NgayBD"]);
                $ngaybd = date('Y-m-d',$ngayA);
                if($ngaybd<date("Y-m-d")){$ngaybd=date("Y-m-d");}
                $ngayB = strtotime($_POST["NgayKT"]);
                $ngaykt = date('Y-m-d',$ngayB);
                if($ngaykt<date("Y-m-d") AND ($ngaykt<$ngaybd)){$ngaykt=$ngaybd;}
                // End Convert
                $trangthai_gd = 1;
                $sql="INSERT INTO giaidoan (gd_ten, gd_noidung, gd_ngaybatdau, gd_ngayketthuc, gd_trangthai, LT_MA) VALUES ('$tengd','$ndgd','$ngaybd','$ngaykt', '$trangthai_gd', '$malt')";
                $query=mysqli_query($conn,$sql);
                if($query){
                    $query1=mysqli_query($conn,"SELECT GD_MA FROM GIAIDOAN  WHERE LT_MA='$malt' ORDER BY GD_MA DESC  LIMIT 0,1 ");
                    $row=mysqli_fetch_array($query1,MYSQLI_ASSOC);
                    $magd = $row['GD_MA'];
                    if(isset($_POST['slDichVu'])){
                        for ($i=0; $i < count($_POST['slDichVu'])-1;$i++)
                        {
                            $dv_ma = $_POST['slDichVu'][$i];
                            $q=mysqli_query($conn,"SELECT * FROM DICHVU WHERE DV_MA='$dv_ma'");
                            if(mysqli_num_rows($q)==1){
                                $query2=mysqli_query($conn,"INSERT INTO giaidoan_dichvu (gd_ma, dv_ma, gddv_trangthai) VALUES ('$magd','$dv_ma',1)");
                            }
                        }
                    echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>"; 
                    }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!')</script>";
                        echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>";   
                    }
                }else{
                    // echo mysqli_error($conn);
                    echo "<script type='text/javascript'>alert('Có lỗi xảy ra, thêm giai đoạn không thành công!')</script>";
                    echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>"; 
                }
        }
    /* Cập nhật giai đoạn */
    if(isset($_POST["btnCapNhatGD"]))
        {
                $makh = $_POST["makh"];
                $tenkh = $_POST["TenKHCN"];
                $malt = $_POST["malt"];
                $tenlt = $_POST["TenLTCN"];
                $magd = $_POST["magd"];
                //Thong tin can cap nhat====================================================
                $tengd = $_POST["GiaiDoanTenCN"];
                if(isset($_POST["GiaiDoanNDCN"])){$ndgd = $_POST["GiaiDoanNDCN"];}else{$ndgd="";}
                // Xu ly Ngay bat dau
                $ngayA = strtotime($_POST["NgayBDCN"]);
                $ngaybdcn = date('Y-m-d',$ngayA);
                /*Ngày bắt đầu sau khi cập nhớ phải lớn hơn ngày hiện tại 
                nếu bé hơn thì phải bằng hoặc lớn ngày bắt đầu cũ*/
                if($ngaybdcn<date("Y-m-d")) 
                    {
                        $slngay=mysqli_query($conn,"SELECT gd_ngaybatdau from giaidoan where gd_ma='$magd'");
                        $r1=mysqli_fetch_array($slngay,MYSQLI_ASSOC);
                        $old=$r1["gd_ngaybatdau"];
                        if($ngaybdcn<$old){
                            $ngaybdcn=$old;
                        }
                    }
                // Xu ly Ngay ket thuc
                $ngayB = strtotime($_POST["NgayKTCN"]);
                $ngayktcn = date('Y-m-d',$ngayB);
                /*Ngày kết thúc phải lớn hơn bằng ngày hiện tại và không được bé hơn ngày bắt đầu sau khi cập nhật*/
                if($ngayktcn<$ngaybdcn)
                    {
                        $ngayktcn=$ngaybdcn;
                    }
                // End Xu ly ngay
                $trangthai_gddv = $_POST["rdTrangThai"];
                $dv_ma = $_POST["slDichVuCN-Ma"];
                //Update to DB
                $sql="UPDATE GIAIDOAN SET GD_TEN='$tengd', GD_NOIDUNG='$ndgd', GD_NGAYBATDAU='$ngaybdcn', GD_NGAYKETTHUC='$ngayktcn' WHERE GD_MA='$magd'";
                $res=mysqli_query($conn,$sql);
                if($res){
                    $res1=mysqli_query($conn,"UPDATE GIAIDOAN_DICHVU SET GDDV_TRANGTHAI='$trangthai_gddv' WHERE GD_MA='$magd' AND DV_MA='$dv_ma'");
                    if($res1){
                        echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>"; 
                    }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, cập nhật không thành côngggggggggggg!')</script>";
                        echo mysqli_error($conn);
                        echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>";  
                    }
                }else{
                        echo "<script type='text/javascript'>alert('Có lỗi xảy ra, cập nhật không thành công!')</script>";
                        echo "<script type='text/javascript'>document.location = '../index.php?key=ltct&ma=$malt';</script>"; 
                    }
        }
    /* Lấy info cho modal cập nhật giai đoạn */   
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { //kiểm tra xe có request Ajax gửi tới hay không
        $gd_ma = $_GET["gd_ma"];
        $dv_ma = $_GET["dv_ma"];
        $result = mysqli_query($conn, "SELECT a.gd_ma as gd_ma, gd_ten, gd_noidung, DATE_FORMAT(gd_ngaybatdau,'%d-%m-%Y') as gd_ngaybatdau, DATE_FORMAT(gd_ngayketthuc,'%d-%m-%Y') as gd_ngayketthuc, b.gddv_trangthai, b.dv_ma, dv_ten FROM giaidoan as a, giaidoan_dichvu as b, dichvu as c WHERE a.gd_ma=b.gd_ma AND c.dv_ma=b.dv_ma AND a.gd_ma='$gd_ma' AND b.dv_ma='$dv_ma'");
        $gd_tt = mysqli_fetch_object($result);
        echo json_encode($gd_tt);
    }
?>