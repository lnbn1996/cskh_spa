<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
    <!-- Font Css -->
    <link rel="stylesheet" type="text/css" href="tainguyen/css/font-awesome.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="tainguyen/css/menu.css" />
    <link rel="stylesheet" href="tainguyen/css/style.css">
    <link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
    <link rel="stylesheet" href="tainguyen/css/responsive.css">
    <!-- Javascript -->
    <script src="tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>
<?php
    include("../csdl/ketnoi.php");
    if(isset($_GET['btnTimKiem'])){     
        $sql="SELECT * FROM Khachhang WHERE KH_TRANGTHAI=1 AND ";
        $ngay=$_GET['slNgaySinh'];
        $thang=$_GET['slThangSinh'];
        $nam=$_GET['slNamSinh'];
        if($ngay!="" && $thang=="" && $nam==""){
            $sql.="KH_NGAYSINH='$ngay'";
        }elseif ($ngay=="" && $thang!="" && $nam=="") {
            $sql.="KH_THANGSINH='$thang'";
        }elseif ($ngay=="" && $thang=="" && $nam!="") {
            $sql.="KH_NAMSINH='$nam'";
        }elseif ($ngay!="" && $thang!="" && $nam=="") {
            $sql.="KH_NGAYSINH='$ngay' AND KH_THANGSINH='$thang' ";
        }elseif ($ngay!="" && $thang=="" && $nam!="") {
           $sql.="KH_NGAYSINH='$ngay' AND KH_NAMSINH='$nam' ";
        }elseif ($ngay=="" && $thang!="" && $nam!="") {
           $sql.="KH_THANGSINH='$thang' AND KH_NAMSINH='$nam' "; 
        }elseif ($ngay!="" && $thang!="" && $nam!="") {
            $sql.="KH_NGAYSINH='$ngay' AND KH_THANGSINH='$thang' AND KH_NAMSINH='$nam'";
        }
        elseif ($ngay=="" && $thang=="" && $nam=="") {
            echo "Hãy nhập thông tin bạn cần thống kê";
            die;
        }
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)==0) {echo "Không tồn tài thông tin cần thống kê"; die;}
?>
<div class="form-group"">
    <div class="col-sm-offset-4 col-sm-6">
<a href="excel_khsntk.php?slNgaySinh=<?php echo $ngay?>&slThangSinh=<?php echo $thang?>&slNamSinh=<?php echo $nam?>">
<input type="button" class="btn btn-primary" name="btnExport" id="btnExport" value="Xuất File Excel (.XLSX)"/>
</a>
    </div>
</div>
<br>
<hr />
<table id="tableLTKT" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã Khách Hàng</strong></th>
                    <th><strong>Tên Khách Hàng</strong></th>
                    <th><strong>Giới Tính</strong></th>
                    <th><strong>Ngày sinh</strong></th>
                    <th><strong>Số Điện Thoại</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Email</strong></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
                    $ngaysinh=$row["KH_NGAYSINH"]."/".$row["KH_THANGSINH"]."/".$row["KH_NAMSINH"];
            ?>           
                <tr>
                  <td><?php echo $row["KH_MA"];  ?></td>
                  <td><?php echo $row["KH_HOTEN"];  ?></td>
                  <td><?php echo $row["KH_GIOITINH"];  ?></td>
                  <td><?php echo $ngaysinh ?></td>
                  <td><?php echo $row["KH_DIACHI"]; ?></td>
                  <td><?php echo $row["KH_SDT"];  ?></td>
                  <td><?php echo $row["KH_EMAIL"];?></td>
                </tr>
            <?php
                }
                echo mysqli_error($conn);
            ?>
            </tbody>    
        </table>
<?php
    } //end if btnTimKiem
?>