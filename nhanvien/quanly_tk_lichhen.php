<h2 class="h2-quyen"><a href="index.php?key=lhtk">Lịch hẹn</a></h2>
<hr />
<form id="flhtk" name="fflhtk" method="post" action="index.php?key=lhtk" class="form-horizontal" role="form">
        <!-- Ngày Hen -->
        <div class="form-group">
            <label for="NgayHen" class="col-sm-3 control-label">Ngày Hẹn:  </label>
            <div class="col-sm-8">
                <input type="text" name="NgayHen" id="NgayHen" class="form-control" value="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" placeholder="dd-mm-yyyy">
            </div>
        </div>                                     
        <!-- Trạng thái hẹn -->
        <div class="form-group">
            <label for="txtTTHen" class="col-sm-3 control-label">Trạng thái:  </label>
            <div class="col-sm-8">
                <select class="form-control" id="slTThai" name="slTThai">
                    <option value="" class="col-sm-6">Chọn Trạng Thái </option>                  
                    <option value="0" class="col-sm-6">Chưa xác nhận</option>
                    <option value="1" class="col-sm-6">Đồng ý</option>
                    <option value="2" class="col-sm-6">Huỷ</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <input type="submit" class="btn btn-primary" name="btnTimKiem" id="btnTimKiem" value="Xem trước"/>
                <input type="button" class="btn btn-primary" name="btnExport" id="btnExport" onclick="return exportExcel()" value="Xuất File Excel (.XLSX)"/>
            </div>
        </div>
</form>

<?php
    if(isset($_POST['btnTimKiem'])){    
        $sql="SELECT a.KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI, LH_NGAY, LH_THOIGIAN, LH_CHUDE, LH_NOIDUNG, LH_TRANGTHAI FROM khachhang a, lichhen b WHERE a.KH_MA=b.KH_MA AND ";
        if($_POST['NgayHen']!=""){
            $ngayhen=strtotime($_POST['NgayHen']);
            $ngayhen=date('Y-m-d',$ngayhen);
        }else{$ngayhen="";}
        $trangthai=$_POST['slTThai'];
        if($ngayhen!="" && $trangthai==""){
            $sql.="LH_NGAY='$ngayhen'";
        }elseif ($ngayhen=="" && $trangthai!="") {
            $sql.="LH_TRANGTHAI='$trangthai'";
        }elseif ($ngayhen!="" && $trangthai!="") {
            $sql.="LH_NGAY='$ngayhen' AND LH_TRANGTHAI='$trangthai'";
        }elseif ($ngayhen=="" && $trangthai=="") {
            echo "Hãy nhập thông tin bạn cần thống kê";
            die;
        }
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)==0) {echo "Không tồn tài thông tin cần thống kê"; die;}
?>
<hr />
        <table id="tableLHTK" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã Khách Hàng</strong></th>
                    <th><strong>Tên Khách Hàng</strong></th>
                    <th><strong>Số Điện Thoại</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Ngày hẹn</strong></th>
                    <th><strong>Thời gian</strong></th>
                    <th><strong>Chủ đề</strong></th>
                    <th><strong>Nội dung</strong></th>
                    <th><strong>Trạng Thái</strong></th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
                    if($row["LH_TRANGTHAI"]==0){
                        $trangthai="Chưa xác nhận";
                    }elseif ($row["LH_TRANGTHAI"]==1) {
                        $trangthai="Đồng ý";
                    }elseif ($row["LH_TRANGTHAI"]==2) {
                        $trangthai="Huỷ";
                    }
            ?>           
                <tr>
                    <td><?php echo $row["KH_MA"];   ?></td>
                    <td><?php echo $row["KH_HOTEN"];  ?></td>
                    <td><?php echo $row["KH_SDT"];  ?></td>
                    <td><?php echo $row["KH_DIACHI"];  ?></td>
                    <td><?php echo  date_format(new DateTime($row['LH_NGAY']), 'd-m-Y');  ?></td>
                    <td><?php echo $row["LH_THOIGIAN"];  ?></td>
                    <td><?php echo $row["LH_CHUDE"];  ?></td>
                    <td><?php echo $row["LH_NOIDUNG"];  ?></td>
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
// Export excel
function exportExcel() {
    $('#flhtk').attr('target','')
    $('#flhtk').attr('action','nhanvien/excel_lhtk.php')
    $('#flhtk').submit()
}
</script>
<script type="text/javascript">
document.getElementById('NgayHen').value = "<?php if(isset($_POST['NgayHen'])){echo $_POST['NgayHen'];}?>";
document.getElementById('slTThai').value = "<?php if(isset($_POST['slTThai'])){echo $_POST['slTThai'];}?>";
</script>