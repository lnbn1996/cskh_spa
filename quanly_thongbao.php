<script src="tainguyen/js/jquery-3.2.0.min.js"></script>
<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script>
      $(document).ready(function() {
          var table = $('#tablespaTB').DataTable( {
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
<h2 class="h2-nv">Quản lý thông báo</h2>
<hr />
<p>
<a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
</p>
<form id="fThongBao" name="fThongBao" method="post" action="" class="form-horizontal" role="form">
<table id="tablespaTB" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
        <tr>
          <th><strong>Mã thông báo</strong></th>
          <th><strong>Nội dung</strong></th>
          <th><strong>Ngày đăng</strong></th>
          <th><strong>Loại</strong></th>
          <th><strong>Mã nv</strong></th>
          <th width="100"><strong>Xóa</strong></th>
        </tr>
    </thead>
    <tbody>
        <?php
          $result = mysqli_query($conn, "SELECT * FROM THONGBAO");
          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
        ?>
        <tr>
          <td><?php echo $row["TB_MA"];    ?></td>
          <td><?php echo $row["TB_NOIDUNG"];  ?></td>
          <td><?php echo $row["TB_NGAYDANG"]; ?></td>
          <td><?php echo $row["TB_LOAI"];  ?></td>
          <td><?php echo $row["NV_MA"];   ?></td>

          <td align='center' class='cotNutChucNang'>
            <a href="xuly_tb.php?ma=<?php echo $row['TB_MA']; ?>" onClick="return deleteConfirm()">
            <img src='tainguyen/hinhanh/delete.png' border='0' /></a>
          </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<!-- Modal Thêm Mới  -->
  <div class="modal fade" id="modalThemMoi" role="dialog">
    <div class="modal-dialog modal-lg">
<!-- Modal content-->
      <div class="modal-content" style="background-color: white; padding: 1%;">
      <h2 class="h2-nv">Thêm thông báo mới </h2>
<hr />
<form id="fThemMoi" name="fThemMoi" method="post" action="index.php?key=tb" class="form-horizontal" role="form">
    <div class="form-group">
        <label for="txtTenTB" class="col-sm-2 control-label">Tên thông báo:  </label>
        <div class="col-sm-10">
              <input type="text" name="txtTenTB" id="txtTenTB" class="form-control" placeholder="Tên thông báo" value='' required="">
        </div>
    </div>
    <div class="form-group">
        <label for="txtNoiDungTB" class="col-sm-2 control-label">Nội dung thông báo:  </label>
        <div class="col-sm-10">
           <textarea name="txtNoiDungTB" id="txtNoiDungTB" value="Nội dung thông báo" class="form-control" placeholder="Nội dung thông báo" required="" ></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="txtTenL" class="col-sm-2 control-label">Loại thông báo:  </label>
        <div class="col-sm-10">
            <input type="text" name="txtTenL" id="txtTenL" class="form-control" placeholder="Loại thông báo" value='' required=""/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm"/>
            <input type="button" class="btn btn-primary" name="btnBoQua1"  id="btnBoQua1"  value="Bỏ qua" data-dismiss="modal" />
        </div>
    </div>
      </form>
    </div>
  </div>
</div>


<!-- End Modal Thêm Mới -->
<?php
  include 'csdl/ketnoi.php';
  include ('xuly_tb.php');
?>

<script>
       $('#modalThemMoi').on('hidden.bs.modal', function () {
           $(this).find('form').trigger('reset');
       });
</script>
