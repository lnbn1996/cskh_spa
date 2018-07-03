<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script>
      $(document).ready(function() {
          var table = $('#tableSpaKH').DataTable( {
          responsive: true,
          "language": {
            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang:",
            "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu:",
            "infoEmpty": "Dữ liệu rỗng",
            "emptyTable": "Chưa có dữ liệu nào ",
            "processing": "Đang xử lý ",
            "search": "Tìm kiếm: ",
            "loadingRecords": "Đang load dữ liệu",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu",
            "paginate": {
              "first": "|<",
              "last": ">|",
              "next": ">>",
              "previous": "<<"
            }
          },
          "lengthMenu": [[5,10,15,20,25,-1],[5,10,15,20,25,"Tất cả"]]
            });
          new $.fn.dataTable.FixedHeader( table );
      });  
</script>
<?php
    include_once("csdl/ketnoi.php");
?>  
<h2 class="h2-kh">Quản lý thông tin Khách Hàng</h2>
 <hr />
        <p>
        	<a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="tainguyen/hinhanh/add.png" width="16" height="16" border="0"/> Thêm mới</a>
            &emsp;
            <a href="#modalTimKiem" data-target="#modalTimKiem" data-toggle="modal"><img src="tainguyen/hinhanh/search.png" width="16" height="16" border="0" />Tìm kiếm theo ngày sinh</a>
        </p>
        <form id="fKhachHang" name="fKhachHang" method="post" action="" class="form-horizontal" role="form">
        <table id="tableSpaKH" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã khách hàng</strong></th>
                    <th><strong>Tên khách hàng</strong></th>
                    <th><strong>Giới tính</strong></th>
                    <th><strong>Ngày Sinh</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Điện thoại</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Loại da</strong></th>
                    <th><strong>Cân nặng</strong></th>
                    <th><strong>Chiều cao</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
              $result = mysqli_query($conn, "SELECT * FROM KHACHHANG WHERE KH_TRANGTHAI=1");
              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
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
              <td><?php echo $row["KH_LOAIDA"]; ?></td>
              <td><?php echo $row["KH_CANNANG"]; ?></td>
              <td><?php echo $row["KH_CHIEUCAO"]; ?></td>
              <!-- Cột chức năng -->
              <td align='center' class='cotNutChucNang'>
              <a href="index.php?key=cnkh&id=<?php echo $row['KH_MA']; ?>">
              <img src='tainguyen/hinhanh/edit.png' border='0'/></a>
              </td>
              
              <td align='center' class='cotNutChucNang'>
              	<a href="index.php?key=kh&ma=<?php echo $row['KH_MA']; ?>" onClick="return deleteConfirm()">
              	<img src='tainguyen/hinhanh/delete.png' border='0' /></a>
              </td>
            </tr>
            <?php
                };
            ?>
			</tbody>
        
        </table>  

 </form>
 <!-- Modal Thêm Mới Khách Hàng -->
    <div class="modal fade" id="modalThemMoi" role="dialog">
        <div class="modal-dialog modal-lg">      
    <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
    <h2 class="h2-kh">Thêm thông tin khách hàng </h2>
    <hr />
                <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
<!-- ten khach hang -->
                    <div class="form-group">
                            <label for="txtTen" class="col-sm-2 control-label">Tên khách hàng:  </label>
                            <div class="col-sm-8">
                                  <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value="" >
                            </div>
                    </div>
<!-- gioi tinh -->
                    <div class="form-group">
                        <label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
<div class="col-sm-8">
                                            <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nam" id="grpGioiTinh"/>Nam</label>

                                            <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nữ" id="grpGioiTinh"/>Nữ</label>

</div>
</div>
<!-- ngay sinh -->
<div class="form-group">
    <label for="lblNgaySinh" class="col-sm-2 control-label">Ngày sinh:  </label>
    <div class="col-sm-8" class="input-group">
            <span class="input-group-btn">
                <select name="slNgaySinh" id="slNgaySinh" class="form-control" >
    <option value="0">Chọn ngày</option>
<?php
                                    for($i=1;$i<=31;$i++)
                                     {
                                            
                                             echo "<option value='".$i."'>".$i."</option>";
                                             
                                     }
                            ?>
</select>
            </span>
            <span class="input-group-btn">
                <select name="slThangSinh" id="slThangSinh" class="form-control">
<option value="0">Chọn tháng</option>
<?php
                            for($i=1;$i<=12;$i++)
                             {
                                        if($i==$thangsinh){
                                             echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                     }
                                     else{
                                     echo "<option value='".$i."'>".$i."</option>";
                                     }
                             }
                    ?>
</select>
            </span>
            <span class="input-group-btn">
                <select name="slNamSinh" id="slNamSinh" class="form-control">
                    <option value="0">Chọn năm</option>
                    <?php
                            for($i=1970;$i<=2010;$i++)
                             {
                                     if($i==$namsinh){
                                             echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                     }
                                     else{
                                     echo "<option value='".$i."'>".$i."</option>";
                                     }
                             }
                    ?>
            </select>
            </span>
    </div>
                    </div>
<!-- dia chi -->
                    <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ:  </label>
                        <div class="col-sm-8">
                            <input type="text" name="txtDiaChi" id="txtDiaChi" value="" class="form-control" placeholder="Địa chỉ" />
                        </div>
                        </div>
<!-- dien thoai -->
                        <div class="form-group">
                        <label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="txtDienThoai" id="txtDienThoai" value="" class="form-control" placeholder="Điện thoại" />
                    </div>
                    </div>
<!-- email-->
                    <div class="form-group">
                         <label for="lblEmail" class="col-sm-2 control-label">Email:  </label>
<div class="col-sm-8">
            <input type="email" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="khachhang@gmail.com" />


</div>
                     </div>

                        <div class="form-group">
                             <label for="lblDiaChi" class="col-sm-2 control-label">Loại da:  </label>
                             <div class="col-sm-8">
                                 <input type="text" name="txtLoaiDa" id="txtLoaiDa" value="" class="form-control" placeholder="Loại da"/>
                             </div>
                             </div>
<!-- can nang -->
                     <div class="form-group">
                         <label for="lblDiaChi" class="col-sm-2 control-label">Cân nặng:  </label>
                         <div class="col-sm-8">
                             <input type="text" name="txtCanNang" id="txtCanNang" value="" class="form-control" placeholder="Cân Nặng"/>
                         </div>
                         </div>
<!--chieu cao -->
                         <div class="form-group">
                             <label for="lblDiaChi" class="col-sm-2 control-label">Chiều cao:  </label>
                             <div class="col-sm-8">
                                 <input type="text" name="txtChieuCao" id="txtChieuCao" value="" class="form-control" placeholder="Chiều Cao"/>
                             </div>
                             </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                              <input type="button" class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới" onclick="return validateForm()" />
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />

                        </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
 <!-- End Modal Thêm Mới -->
<!-- Modal Search Ngày SN -->
<div class="modal fade" id="modalTimKiem" role="dialog">
    <div class="modal-dialog modal-lg">      
    <!-- Modal content-->
        <div class="modal-content" style="background-color: white; padding: 6%;">
        <form id="fkhtk" name="fkhtk" method="get" action="nhanvien/quanly_kh_timkiem.php" class="form-horizontal" role="form">
        <!-- Ngày Sinh -->
        <div class="form-group">
            <label for="lblNgaySinh" class="col-sm-3 control-label">Ngày sinh:  </label>
            <div class="col-sm-8" class="input-group">
                <select name="slNgaySinh" id="slNgaySinh" class="form-control" >
                    <option value="">Chọn ngày</option>
                    <?php
                      for($i=1;$i<=31;$i++)
                      {
                      echo "<option value='".$i."'>".$i."</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <!-- Tháng Sinh -->
        <div class="form-group">
            <label for="lblThangSinh" class="col-sm-3 control-label">Tháng sinh:  </label>
            <div class="col-sm-8" class="input-group">
                <select name="slThangSinh" id="slThangSinh" class="form-control" >
                    <option value="">Chọn tháng</option>
                    <?php
                      for($i=1;$i<=12;$i++)
                      {
                      echo "<option value='".$i."'>".$i."</option>";
                      }
                    ?>
                </select>
            </div>
        </div>
        <!-- Năm Sinh -->
        <div class="form-group">
            <label for="lblNamSinh" class="col-sm-3 control-label">Năm sinh:  </label>
            <div class="col-sm-8" class="input-group">
                <select name="slNamSinh" id="slNamSinh" class="form-control" >
                    <option value="">Chọn năm</option>
                    <?php
                      for($i=1970;$i<=2010;$i++)
                      {
                      echo "<option value='".$i."'>".$i."</option>";
                      }
                    ?>
                </select>
            </div>
        </div>                                       
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-8">
                <input type="submit" class="btn btn-primary" name="btnTimKiem" id="btnTimKiem" value="Xem trước"/>
                <input type="button" class="btn btn-primary" name="btnExport" id="btnExport" onclick="return exportExcel()" value="Xuất File Excel (.XLSX)"/>
                <input type="button" class="btn btn-warning" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />
            </div>
        </div>
    </form>
        </div>            
    </div>
</div>
<!-- End Modal Search Ngày SN -->
<?php
    include 'csdl/ketnoi.php';
    include ('xuly_kh.php');
?>
<script>
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    function exportExcel(){
    $('#fkhtk').attr('target','')
    $('#fkhtk').attr('action','nhanvien/excel_khsntk.php')
    $('#fkhtk').submit()
    }
</script>
<script type="text/javascript">
// Popup window code
$(document).ready(function() {
    $('#fkhtk').submit(function() {
        window.open('', 'formpopup', 'resizeable,scrollbars');
        this.target = 'formpopup';
        location.reload();
    });
});
</script>