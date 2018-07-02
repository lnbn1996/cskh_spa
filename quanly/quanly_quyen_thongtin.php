<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="../tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.0/angular.min.js"></script>
    <!-- For Modal -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!-- Others Script -->
    <script src="../tainguyen/js/funcs.js"></script>
    <!-- Script for DataTable to Show -->
    <script language="javascript">
      $(document).ready(function() {
          var table = $('#tablespa').DataTable( {
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
    include_once("../csdl/ketnoi.php");
    session_start();
?>        
<title>Phân quyền</title>
</head>

<body>

 <form name="frmXoa" method="post" action="xuly_quyen.php">
        <h2 class="h2-quyen">Danh sách phân quyền</h2>
        <hr />
        <p>
        <a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="../tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                    	 <!-- <th><strong>Chọn</strong></th> -->
                        <th><strong>Mã Quyền</strong></th>
                        <th><strong>Tên quyền</strong></th>
                         <th><strong>Mô tả</strong></th>
                        <th width="100"><strong>Cập nhật</strong></th>
                        <th width="100"><strong>Xóa</strong></th>
                    </tr>
            </thead>
      	    <tbody>
            <?php
              $stt=1;
              $result = mysqli_query($conn, "SELECT * FROM nhomquyenchitiet");
              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
            ?>
      			<tr>
<!--                   	<td class="cotCheckBox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['NQCT_MA']; ?>" /></td> -->
                    <td class="cotCheckBox"><?php echo $row['NQCT_MA'];  ?></td>
                    <td><?php  echo $row['NQCT_TEN'];  ?></td>
                    <td><?php echo $row['NQCT_DIENGIAI'];   ?></td>

                    <td align='center' class='cotNutChucNang'>
                        <!-- <a href="quanly_quyen_thongtin.php?ma=<?php //echo $row['NQCT_MA']; ?>"> -->
                        <a href="#modalCapNhat" data-target="#modalCapNhat" data-toggle="modal" id="<?php echo $row['NQCT_MA']; ?>" onClick="CapNhatQ(this);">
                        <img src='../tainguyen/hinhanh/edit.png' border='0'  /></a>
                    </td>
    
                    <td align='center' class='cotNutChucNang'>
                        <a href="xuly_quyen.php?ma=<?php echo $row['NQCT_MA']; ?>" onClick="return deleteConfirm()"/>
                        <img src='../tainguyen/hinhanh/delete.png' border='0' /></a>
                    </td>
            </tr>
            <?php
                $stt++;
              };
      			?>
      	     </tbody>
      </table>


        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa mục chọn" id="btnXoa" onClick='return deleteConfirm()' class="btn btn-primary" />
            </div>
        </div><!--Nút chức nang-->

 </form>
  <br>
 <!-- Modal cập nhật -->
     <div class="modal fade" id="modalCapNhat" role="dialog">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background-color: white;">
                            <h2 class="h2-quyen">Cập nhật quyền </h2>
                            <hr />
                            <form id="formtest" name="formtest" method="post" action="xuly_quyen.php" class="form-horizontal" role="form">
                                      <div class="form-group">
                                                <label for="txtTen" class="col-sm-2 control-label">Mã quyền:  </label>
                                        <div class="col-sm-9">
                                                      <input type="text" class="form-control" name="nqct_macn" id="nqct_macn" value="" required="">
                                        </div>
                                        </div>
                            <input type="hidden" >
                                        <div class="form-group">
                                                <label for="txtTen" class="col-sm-2 control-label">Tên quyền:  </label>
                                        <div class="col-sm-9">
                                                      <input type="text" name="txtTenQ" id="txtTenQ" class="form-control" placeholder="Tên quyền" value="" required="">
                                                </div>
                                        </div>
                                         <div class="form-group">
                                                 <label for="lblDiaChi" class="col-sm-2 control-label">Mô tả:  </label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="txtMoTaQ" id="txtMoTaQ" value="" class="form-control" placeholder="Mô tả" required=""/>
                                                 </div>
                                                 </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                  <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập Nhật"/>
                                                  <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Trở về" data-dismiss="modal" />

                                            </div>
                                        </div>
                            </form>
                        </div>
                    </div>
     </div>
<!-- End Modal Cập nhật -->

<!-- Modal Thêm mới -->
     <div class="modal fade" id="modalThemMoi" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: white;">
                        <h2 class="h2-quyen">Thêm quyền </h2>
                        <hr />
                            <form id="form1" name="form1" method="post" action="xuly_quyen.php" class="form-horizontal" role="form">
                              <div class="form-group">
                                                <label for="txtTen" class="col-sm-2 control-label">Mã quyền:  </label>
                                                <div class="col-sm-9">
                                                      <input type="text" name="txtMaQ" id="txtMaQ" class="form-control" placeholder="Mã quyền" value='' required="">
                                                </div>
                                        </div>
                    <!-- ten quyen -->
                                        <div class="form-group">
                                                <label for="txtTen" class="col-sm-2 control-label">Tên quyền:  </label>
                                                <div class="col-sm-9">
                                                      <input type="text" name="txtTenQ" id="txtTenQ" class="form-control" placeholder="Tên quyền" value='' required="">
                                                </div>
                                        </div>
                                         <div class="form-group">
                                                 <label for="lblDiaChi" class="col-sm-2 control-label">Mô tả:  </label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="txtMoTaQ" id="txtMoTaQ" value="" class="form-control" placeholder="Mô tả" required=""/>
                                                 </div>
                                                 </div>


                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                  <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                                                  <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Trở về" data-dismiss="modal" />

                                            </div>
                                        </div>
                                    </form>
                        </div>
                </div>
     </div>
<!-- End Modal Thêm mới -->
</body>
</html>
<!-- Scripts for Modal/ Ajax/ others -->
<script>
    /* reset modal when closed */
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    function CapNhatQ(a) {
        var nqct_ma = a.id;
        console.log(nqct_ma);
        $.ajax({
            url:"xuly_quyen.php",
            method:"GET",
            data: {"nqct_ma": nqct_ma},
            success: function(response){
                // console.log(response);
                var obj = JSON.parse(response);
                $("#nqct_macn").val(obj.nqct_ma);
                $("#txtTenQ").val(obj.nqct_ten);
                $("#txtMoTaQ").val(obj.nqct_diengiai);

            }
        });
    }
</script>