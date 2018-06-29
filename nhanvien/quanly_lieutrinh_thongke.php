<h2 class="h2-quyen"><a href="index.php?key=lttk">Thống Kê Liệu Trình</a></h2>
<hr />
<form id="flttk" name="flttk" method="post" action="index.php?key=lttk" class="form-horizontal" role="form">
        <!-- Ngày BD -->
        <div class="form-group">
            <label for="NgayBD" class="col-sm-3 control-label">Ngày Bắt Đầu:  </label>
            <div class="col-sm-8">
                <input type="text" name="NgayBD" id="NgayBD" class="form-control" value="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" placeholder="dd-mm-yyyy">
            </div>
        </div>
        <!-- Ngày KT -->
        <div class="form-group">
            <label for="NgayKT" class="col-sm-3 control-label">Ngày Kết Thúc:  </label>
            <div class="col-sm-8">
                <input type="text" name="NgayKT" id="NgayKT" class="form-control" value="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" placeholder="dd-mm-yyyy">
            </div>
        </div>                                       
        <!-- Trạng thái hẹn -->
        <div class="form-group">
            <label for="txtTTHen" class="col-sm-3 control-label">Trạng thái:  </label>
            <div class="col-sm-8">
                <select class="form-control" id="slTThai" name="slTThai">
                    <option value="" class="col-sm-6">Chọn Trạng Thái</option>                  
                    <option value="1" class="col-sm-6">Chưa Thực hiện</option>
                    <option value="2" class="col-sm-6">Đã thực hiện</option>
                    <option value="3" class="col-sm-6">Hoàn Thành</option>
                    <option value="4" class="col-sm-6">Huỷ</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <input type="submit"  class="btn btn-primary" name="btnTimKiem" id="btnTimKiem" value="Xem trước"/>
                <input type="submit"  class="btn btn-primary" name="btnExport" id="btnExport" value="Xuất File Excel Trực Tiếp(.xlsx)" onclick="return exportExcel()"/>
            </div>
        </div>
</form>

<?php
    if(isset($_POST['btnTimKiem'])){     
        $sql="SELECT e.KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI, a.LT_MA, LT_TEN, b.GD_TEN, GD_NOIDUNG, GD_NGAYBATDAU, GD_NGAYKETTHUC, GD_TRANGTHAI, DV_TEN FROM khachhang e, lieutrinh a, giaidoan b, giaidoan_dichvu c, dichvu d WHERE e.KH_MA=a.KH_MA AND a.LT_MA=b.LT_MA and b.GD_MA=c.GD_MA and c.DV_MA=d.DV_MA AND ";
        if($_POST['NgayBD']!=""){
            $nbd=strtotime($_POST['NgayBD']);
            $ngaybd=date('Y-m-d',$nbd);
        }else{$ngaybd="";}
        if($_POST['NgayKT']!=""){
        $nkt=strtotime($_POST['NgayKT']);
        $ngaykt=date('Y-m-d',$nkt);
        }else{$ngaykt="";}
        $trangthai=$_POST['slTThai'];

        if($ngaybd!="" && $ngaykt=="" && $trangthai==""){
            $sql.="GD_NGAYBATDAU='$ngaybd'";
        }elseif ($ngaybd=="" && $ngaykt!="" && $trangthai=="") {
            $sql.="GD_NGAYKETTHUC='$ngaykt'";
        }elseif ($ngaybd=="" && $ngaykt=="" && $trangthai!="") {
            $sql.="GD_TRANGTHAI='$trangthai'";
        }elseif ($ngaybd!="" && $ngaykt!="" && $trangthai=="") {
            $sql.="GD_NGAYBATDAU>='$ngaybd' AND GD_NGAYKETTHUC<='$ngaykt'";
        }elseif ($ngaybd!="" && $ngaykt=="" && $trangthai!="") {
           $sql.="GD_NGAYBATDAU='$ngaybd' AND GD_TRANGTHAI='$trangthai'";
        }elseif ($ngaybd=="" && $ngaykt!="" && $trangthai!="") {
            $sql.="GD_NGAYKETTHUC='$ngaykt' AND GD_TRANGTHAI='$trangthai' ";
        }elseif ($ngaybd!="" && $ngaykt!="" && $trangthai!="") {
            $sql.="GD_NGAYBATDAU='$ngaybd' AND GD_NGAYKETTHUC='$ngaykt' AND GD_TRANGTHAI='$trangthai'";
        }
        elseif ($ngaybd=="" && $ngaykt=="" && $trangthai=="") {
            echo "Hãy nhập thông tin bạn cần thống kê";
            die;
        }
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)==0) {echo "Không tồn tài thông tin cần thống kê"; die;}
?>
<hr />
<table id="tableLTKT" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã Khách Hàng</strong></th>
                    <th><strong>Tên Khách Hàng</strong></th>
                    <th><strong>Số Điện Thoại</strong></th>
                    <th><strong>Mã Liệu Trình</strong></th>
                    <th><strong>Tên Liệu Trình</strong></th>
                    <th><strong>Tên Giai Đoạn</strong></th>
                    <th><strong>Dịch vụ</strong></th>
                    <th><strong>Ngày Bắt Đầu</strong></th>
                    <th><strong>Ngày Kết Thúc</strong></th>
                    <th><strong>Trạng Thái</strong></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
                    if($row["GD_TRANGTHAI"]==1){
                        $trangthai="Chưa thực hiện";
                    }elseif ($row["GD_TRANGTHAI"]==2) {
                        $trangthai="Đang thực hiện";
                    }elseif ($row["GD_TRANGTHAI"]==3) {
                        $trangthai="Hoàn thành";
                    }elseif ($row["GD_TRANGTHAI"]==4) {
                        $trangthai="Huỷ";
                    }
            ?>           
                <tr>
                    <td><?php echo $row["KH_MA"];   ?></td>
                    <td><?php echo $row["KH_HOTEN"];  ?></td>
                    <td><?php echo $row["KH_SDT"];  ?></td>
                    <td><?php echo $row["LT_MA"];  ?></td>
                    <td><?php echo $row["LT_TEN"];  ?></td>
                    <td><?php echo $row["GD_TEN"];  ?></td>
                    <td><?php echo $row["DV_TEN"];  ?></td>
                    <td><?php echo date_format(new DateTime($row['GD_NGAYBATDAU']), 'd-m-Y');  ?></td>
                    <td><?php echo date_format(new DateTime($row['GD_NGAYKETTHUC']), 'd-m-Y');   ?></td>
                    <td><?php echo $trangthai;   ?></td>
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
<script>
// Select để in trực tiếp
function exportExcel(){
    $('#flttk').attr('target','')
    $('#flttk').attr('action','nhanvien/excel_lttk.php')
    $('#flttk').submit()
}
</script>
<script type="text/javascript">
document.getElementById('NgayBD').value = "<?php if(isset($_POST['NgayBD'])){echo $_POST['NgayBD'];}?>";
document.getElementById('NgayKT').value = "<?php if(isset($_POST['NgayKT'])){echo $_POST['NgayKT'];}?>";
document.getElementById('slTThai').value = "<?php if(isset($_POST['slTThai'])){echo $_POST['slTThai'];}?>";
</script>