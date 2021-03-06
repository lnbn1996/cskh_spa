<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
 <script language="javascript">
      $(document).ready(function() {
          var table = $('#tableLieuTrinh').DataTable({
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
<h2 class="h2-kh">Quản lý thông tin liệu trình</h2>
<hr />
<p>
   	<a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal""><img src="tainguyen/hinhanh/add.png" width="16" height="16" border="0" /> Thêm mới</a>
</p>
<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        <table id="tableLieuTrinh" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Mã liệu trình</strong></th>
                    <th><strong>Tên liệu trình</strong></th>
                    <th><strong>Mô tả</strong></th>
                    <th><strong>Nội dung</strong></th>
                    <th><strong>Giá(VND)</strong></th>
                    <th><strong>Ngày tạo</strong></th>
                    <th><strong>Loại liệu trình</strong></th>
                    <th><strong>Mã khách hàng</strong></th>
                    <th><strong>Tên khách hàng</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
            </thead>
			<tbody>
            <?php
              $result = mysqli_query($conn, "SELECT LT_MA, LT_TEN, LT_MOTA, LT_NOIDUNG, LT_GIA, LT_NGAYTAO, LT_NGAYCAPNHAT, LT_TRANGTHAI, a.KH_MA, KH_HOTEN, LT_LOAI FROM LIEUTRINH as a, KHACHHANG as b WHERE a.KH_MA=b.KH_MA AND LT_TRANGTHAI!=0");
              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
                $malt=$row['LT_MA'];
            ?>            
    			<tr>
                <?php
                    $sql=mysqli_query($conn,"SELECT SUM(dv_giatien) as GIA_TIEN FROM lieutrinh a, giaidoan b, giaidoan_dichvu c, dichvu d WHERE a.LT_MA=b.LT_MA and b.GD_MA=c.GD_MA and c.DV_MA=d.DV_MA and a.LT_MA='$malt'");
                    $r=mysqli_fetch_array($sql,MYSQLI_ASSOC);
                    $gia=$r['GIA_TIEN'];
                    // $s1=mysqli_query($conn,"UPDATE LIEUTRINH SET LT_GIA='$gia' WHERE LT_MA='$malt' ");
                    // $r2=mysqli_fetch_array($sql,MYSQLI_ASSOC);
                ?>
                    <td><?php echo $row['LT_MA'];  ?></td>
                    <td><?php echo $row['LT_TEN']; ?></td>
                    <td><?php echo $row['LT_MOTA']; ?></td>
                    <td><?php echo $row['LT_NOIDUNG']; ?></td>
                    <td><?php echo number_format($gia); ?></td>
                    <td><?php echo $row['LT_NGAYTAO']; ?></td>
                    <td><?php echo $row['LT_LOAI']; ?></td>
                    <td><?php echo $row['KH_MA']; ?></td>
                    <td><?php echo $row['KH_HOTEN']; ?></td>
                     <!-- Cột chức năng  -->
                    <td align='center' class='cotNutChucNang'>
                        <a href="index.php?key=ltct&ma=<?php echo $row['LT_MA']; ?>">
                        <img src='tainguyen/hinhanh/edit.png' border='0'/></a>
                    </td>
                  
                    <td align='center' class='cotNutChucNang'>
                        <a href="nhanvien/xuly_lt.php?ma=<?php echo $row['LT_MA']; ?>" onClick="return deleteConfirm();">
                        <img src='tainguyen/hinhanh/delete.png' border='0' /></a>
                    </td>
                    </tr>
            <?php
                };
            ?>         
			</tbody>    
        </table>  
</form>

<!-- Modal thêm mới liệu trình -->
    <div class="modal fade" id="modalThemMoi" role="dialog">
        <div class="modal-dialog modal-md">      
    <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
    <h2 class="h2-dv">Thêm mới liệu trình </h2>
    <hr />
        <form id="form1" name="form1" method="post" action="nhanvien/xuly_lt.php" class="form-horizontal" role="form">

                    <div class="form-group">
                            <label for="txtTen" class="col-sm-3 control-label">Tên khách hàng :  </label>
                            <div class="col-sm-8">
                                  <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value='' required="">
                             </div>
                    </div>
                    <div class="form-group">
                            <label for="txtDT" class="col-sm-3 control-label">SĐT :  </label>
                            <div class="col-sm-8">
                                  <input type="text" name="txtDT" id="txtDT" class="form-control" placeholder="Số điện thoại" value='' required="">
                            </div>
                    </div>                    
                     <div class="form-group">
                             <label for="TenLT" class="col-sm-3 control-label">Tên liệu trình :  </label>
                             <div class="col-sm-8">
                                 <input type="text" name="TenLT" id="TenLT" value="" class="form-control" placeholder="Tên liệu trình" required="" />
                             </div>
                    </div>
                   <div class="form-group"> 
                            <label for="sell" class="col-sm-3 control-label">Loại liệu trình:  </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="slLoaiLT" name="slLoaiLT" required="">
                                    <option value="" class="col-sm-8"> Chọn loại liệu trình </option>
                                    <option value="Ngắn hạn" class="col-sm-8"> Ngắn hạn</option>
                                    <option value="Dài hạn" class="col-sm-8"> Dài hạn</option>
                                    <option value="Khác" class="col-sm-8"> Khác</option>
                                </select>
                          </div>
                    </div>                    
                    <div class="form-group">
                             <label for="MoTa" class="col-sm-3 control-label">Mô tả :  </label>
                             <div class="col-sm-8">
                                 <input type="text" name="txtMoTa" id="txtMoTa" value="" class="form-control" placeholder="Mô tả"/>
                             </div>
                    </div>
                    
                    <div class="form-group">
                             <label for="noidung" class="col-sm-3 control-label">Nội dung :  </label>
                             <div class="col-sm-8">
                                <textarea class="form-control" rows="4" name="txtNoiDung" name="txtNoiDung"></textarea>
                             </div>
                    </div>                   
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal"  />

                        </div>
                    </div>
                </form>

            </div>            
        </div>
    </div>
<!-- End Modal thêm mới -->
<script>
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    // function xoaLieuTrinh(a) {
    //     var lt_ma = a.id;
    //     $.ajax({
    //         url: 'nhanvien/xuly_lt.php',
    //         type: "get",
    //         data: 'ma=' + lt_ma,
    //         success: function() {   
    //             location.reload();  
    //         }
    //     });
    // };
</script>