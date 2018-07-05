<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script>
      $(document).ready(function() {
          var table = $('#tablespaNV').DataTable( {
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
      });
</script>
<?php
    include_once("csdl/ketnoi.php");
?>
 <h2 class="h2-nv">Quản lý thông tin Nhân Viên</h2>
 <hr />
        <p>
        	<a href="href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal""><img src="tainguyen/hinhanh/add.png" width="16" height="16" border="0" /> Thêm mới nhân viên </a>
        </p>
        <form id="fNhanVien" name="fNhanVien" method="post" action="" class="form-horizontal" role="form">
        <table id="tablespaNV" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>ID nhân viên</strong></th>
                    <th><strong>Tên nhân viên</strong></th>
                    <th><strong>Giới tính</strong></th>
                    <th><strong>Ngày Sinh</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Điện thoại</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Nhóm quyền</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>

				<?php
					$result = mysqli_query($conn, "SELECT * FROM NHANVIEN a, TAIKHOAN b, NHOMQUYEN c WHERE a.TENNGUOIDUNG=b.TENNGUOIDUNG AND c.NQ_MA=a.NQ_MA AND NV_TRANGTHAI=1");
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
					{
						$ngaysinh=$row["NV_NGAYSINH"]."/".$row["NV_THANGSINH"]."/".$row["NV_NAMSINH"];
				?>

			<tr>

              <td><?php echo $row["NV_MA"]; ?></td>
              <td><?php echo $row["NV_HOTEN"]; ?></td>
              <td><?php echo $row["NV_GIOITINH"]; ?></td>
              <td><?php echo $ngaysinh; ?></td>
              <td><?php echo $row["NV_DIACHI"];  ?></td>
              <td><?php echo $row["NV_SDT"]; ?></td>
              <td><?php echo $row["NV_EMAIL"]; ?></td>
              <td><?php echo $row["NQ_TEN"]; ?></td>

              <td align='center' class='cotNutChucNang'>
              <a href="index.php?key=cnnv&id=<?php echo $row['NV_MA']; ?>">
              <img src='tainguyen/hinhanh/edit.png' border='0'/></a>
              </td>

              <td align='center' class='cotNutChucNang'>
              	<a href="index.php?key=nv&ma=<?php echo $row['NV_MA']; ?>" onClick="return deleteConfirm()">
              	<img src='tainguyen/hinhanh/delete.png' border='0' /></a>
              </td>
            </tr>
      <?php } ?>
			</tbody>
    </table>

 </form>


<!-- Modal Thêm Mới Khách Hàng -->
    <div class="modal fade" id="modalThemMoi" role="dialog">
        <div class="modal-dialog modal-lg">
<!-- Modal content-->
          <div class="modal-content" style="background-color: white; padding: 1%;">
            <h2 class="h2-nv">Thêm thông tin nhân viên </h2>
              <hr />
                  <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
          <!-- ten khach hang -->
                    <div class="form-group">
                          <label for="txtTen" class="col-sm-2 control-label">Tên nhân viên:  </label>
                        <div class="col-sm-10">
                              <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên nhân viên" value=''>
                        </div>
                    </div>
          <!-- gioi tinh -->
                    <div class="form-group">
                      <label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
          <div class="col-sm-10">
                <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nam" id="grpGioiTinh"/>Nam</label>
                <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nữ" id="grpGioiTinh"/>Nữ</label>

          </div>
          </div>
          <!-- ngay sinh -->
          <div class="form-group">
            <label for="lblNgaySinh" class="col-sm-2 control-label">Ngày sinh:  </label>
            <div class="col-sm-10" class="input-group">
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
                             echo "<option value='".$i."'>".$i."</option>";
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
                      <div class="col-sm-10">
                        <input type="text" name="txtDiaChi" id="txtDiaChi" value="" class="form-control" placeholder="Địa chỉ"/>
                      </div>
                      </div>
          <!-- dien thoai -->
                      <div class="form-group">
                      <label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
                    <div class="col-sm-10">
                      <input type="text" name="txtDienThoai" id="txtDienThoai" value="" class="form-control" placeholder="Điện thoại" />
                    </div>
                    </div>
          <!-- email-->
            <div class="form-group">
                <label for="lblEmail" class="col-sm-2 control-label">Email:  </label>
                <div class="col-sm-10">
                    <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="nhanvien@gmail.com"/>

                </div>
            </div>
<!-- Chọn nhóm quyền -->
            <div class="form-group">
                <label for="slNhomQuyen" class="col-sm-2 control-label">Tên nhóm quyền:  </label>
                <div class="col-sm-10">
                    <select class="form-control" id="slNhomQuyen" name="slNhomQuyen" required="">
                        <option value="" class="col-sm-10"> Chọn nhóm quyền </option>
                        <?php
                            $query=mysqli_query($conn,"SELECT * FROM NHOMQUYEN");
                            while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>                       
                        <option value="<?php echo $row['NQ_MA'];?>" class="col-sm-6"><?php echo $row['NQ_TEN'];?></option>
                        <?php 
                            } 
                        ?>
                    </select>
                </div>
            </div> 
              <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"  onclick="return validateForm()"/>
                        <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal"  />

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- End Modal Thêm Mới -->
<?php
  include 'csdl/ketnoi.php';
  include ('quanly/xuly_nv.php');
?>

<script>
       $('#modalThemMoi').on('hidden.bs.modal', function () {
           $(this).find('form').trigger('reset');
       });
</script>
