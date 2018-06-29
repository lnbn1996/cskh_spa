<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
 <script language="javascript">
      $(document).ready(function() {
          var table = $('#tableLichHen').DataTable({
            "ordering": false,
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
  <h2>Thông tin lịch hẹn</h2>
  <hr />
     <table id="tableLichHen" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
                <tr>
                    <!-- <th style="display:none;"></th> -->
                    <th><strong>Tên khách hàng</strong></th>
                    <th><strong>Số điện thoại</strong></th>
                    <th><strong>Ngày hẹn</strong></th>
                    <th><strong>Giờ hẹn</strong></th>
                    <th><strong>Chủ đề</strong></th>
                    <th><strong>Nội dung</strong></th>
                    <th><strong><center>Trạng thái</center></strong></th>
                    <th><strong><center>Cập nhật</center></strong></th>
                </tr>
             </thead>
		<tbody style="font-size: 16px;">
            <?php
              $result = mysqli_query($conn, "SELECT LH_MA, KH_HOTEN, KH_SDT, LH_NGAY, LH_THOIGIAN, LH_NOIDUNG, LH_CHUDE, LH_TRANGTHAI FROM lichhen a, khachhang b WHERE a.KH_MA=b.KH_Ma ORDER BY LH_NGAY DESC ");
              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
            ?>
    		<tr>
                    <!-- <td style="display:none;"><input type="text" name="txtLhMa" value="<?php //echo $row['LH_MA'];  ?>"/ ></td> -->
                    <td><?php echo $row['KH_HOTEN'];  ?></td>
                    <td><?php echo $row['KH_SDT'];  ?></td>
                    <td><?php echo date_format(new DateTime($row['LH_NGAY']), 'd-m-Y');   ?></td>
                    <td><?php echo date_format(new DateTime($row['LH_THOIGIAN']), 'h:i A');  ?></td>
                    <td><?php echo $row['LH_CHUDE'];  ?></td>
                    <td><?php echo $row['LH_NOIDUNG'];  ?></td>
                    <td align="center">
                        <?php 
                            if($row['LH_TRANGTHAI']==0){
                                echo "<input type='checkbox' name='cb_lhtrangthai' value='0' style='display:none;' />";
                                echo "<img src='tainguyen/hinhanh/more.png'/>"; 
                            }elseif($row['LH_TRANGTHAI']==1){
                                echo "<input type='checkbox' name='cb_lhtrangthai' value='1' style='display:none;'/>";
                                echo "<img src='tainguyen/hinhanh/checked.png'/>"; 
                            }else{
                                echo "<img src='tainguyen/hinhanh/remove.png'/>";
                            }  
                        ?> 
                    </td>
                    <!-- cot xac nhan -->
                    <td align='center'>
                        <!-- <input type="submit" name="btnUpdateLH" id="btnUpdateLH" value="Cập nhật" style="width: 80%; height: 20px; font-size: 13px; padding:2%;" /> -->
                        <a href="#modalCapNhatLH" data-target="#modalCapNhatLH" data-toggle="modal" id="<?php echo $row['LH_MA']; ?>" onClick="CapNhatLH(this);">
                        <img src='tainguyen/hinhanh/edit.png' border='0'  /></a>
                    </td>
            </tr>
            <?php
              };
            ?>
		  </tbody>
    </table>
<!-- Modal cập nhật -->
     <div class="modal fade" id="modalCapNhatLH" role="dialog">
                <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background-color: white;">
                            <h2 class="h2-quyen">Cập nhật lịch hẹn </h2>
                            <hr />
                            <form id="fCapNhatLH" name="fCapNhatLH" method="post" action="nhanvien/xuly_lh.php" class="form-horizontal" role="form">
                            <input type="hidden" name="lh_ma" id="lh_ma" value="">
                                        <!-- Tên khách hàng -->
                                        <div class="form-group">
                                                <label for="txtTenKH" class="col-sm-3 control-label">Tên Khách hàng:  </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="txtTenKH" id="txtTenKH" class="form-control" value="" readonly="readonly">
                                                </div>
                                        </div>
                                        <!-- Số điện thoại -->
                                        <div class="form-group">
                                                <label for="txtSdt" class="col-sm-3 control-label">Số điện thoại:  </label>
                                                <div class="col-sm-8">
                                                      <input type="text" name="txtSdt" id="txtSdt" class="form-control" value="" readonly="readonly">
                                                </div>
                                        </div>
                                        <!-- Ngày hẹn -->
                                        <div class="form-group">
                                                <label for="NgayHen" class="col-sm-3 control-label">Ngày hẹn:  </label>
                                                <div class="col-sm-8">
                                                      <input type="text" name="NgayHen" id="NgayHen" class="form-control" value="" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="">
                                                </div>
                                        </div>
                                        <!-- Giờ hẹn -->
                                        <div class="form-group">
                                                <label for="GioHen" class="col-sm-3 control-label">Giờ hẹn:  </label>
                                                <div class="col-sm-8">
                                                      <input type="time" name="GioHen" id="GioHen" class="form-control" value="" required="">
                                                </div>
                                        </div>                                         
                                        <!-- Chủ đề hẹn -->
                                        <div class="form-group">
                                                <label for="txtChudeHen" class="col-sm-3 control-label">Chủ đề hẹn:  </label>
                                                <div class="col-sm-8">
                                                      <input type="text" name="txtChudeHen" id="txtChudeHen" class="form-control" value="" readonly="readonly">
                                                </div>
                                        </div>
                                        <!-- Nội dung hẹn -->
                                        <div class="form-group">
                                                <label for="txtNoiDungHen" class="col-sm-3 control-label">Nội dung hẹn:  </label>
                                                <div class="col-sm-8">
                                                      <input type="text" name="txtNoiDungHen" id="txtNoiDungHen" class="form-control" value="" readonly="readonly">
                                                </div>
                                        </div>
                                        <!-- Trạng thái hẹn
                                        <div class="form-group">
                                                <label for="txtTTHen" class="col-sm-3 control-label">Trạng thái hiện tại:  </label>
                                                <div class="col-sm-8">
                                                      <input type="text" name="txtTTHen" id="txtTTHen" class="form-control" value="" disabled>
                                                </div>
                                        </div> -->
                                        <!-- Xác nhận -->
                                        <div class="form-group">
                                                <label for="txtTTHen" class="col-sm-3 control-label">Xác nhận:  </label>
                                                <div class="col-sm-8">
                                                    <label class="radio-inline for="rdXacNhan0">
                                                        <input type="radio" id="rdXacNhan0" name="rdXacNhan" value="0" />
                                                        Chưa xác nhận
                                                    </label>
                                                    <label class="radio-inline for="rdXacNhan1">
                                                        <input type="radio" id="rdXacNhan1" name="rdXacNhan" value="1" />
                                                        Đồng ý
                                                    </label>
                                                    <label class="radio-inline for="rdXacNhan2">
                                                        <input type="radio" id="rdXacNhan2" name="rdXacNhan" value="2" />
                                                        Huỷ
                                                    </label>
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
<!-- Scripts for Modal/ Ajax/ others -->
<script>
    /* reset modal when closed */
    function CapNhatLH(a) {
        var lh_ma = a.id;
        $.ajax({
            url:"nhanvien/xuly_lh.php",
            method:"GET",
            data: {"lh_ma": lh_ma},
            success: function(response){
                console.log(response);
                var obj = JSON.parse(response);
                var trangthai = "";
                var lh_trangthai=obj.LH_TRANGTHAI;
                if(obj.LH_TRANGTHAI == 0){
                    //trangthai="Chưa xác nhận";
                    $('#fCapNhatLH').find(':radio[name=rdXacNhan][value="0"]').prop('checked', true);
                }else if(obj.LH_TRANGTHAI == 1){
                    //trangthai="Đã xác nhận";
                    $('#fCapNhatLH').find(':radio[name=rdXacNhan][value="1"]').prop('checked', true);
                }else{
                    //trangthai="Đã Huỷ";
                    $('#fCapNhatLH').find(':radio[name=rdXacNhan][value="2"]').prop('checked', true);
                }
                $("#lh_ma").val(obj.LH_MA);
                $("#txtTenKH").val(obj.KH_HOTEN);
                $("#txtSdt").val(obj.KH_SDT);
                $("#NgayHen").val(obj.LH_NGAY);
                $("#GioHen").val(obj.LH_THOIGIAN);
                $("#txtChudeHen").val(obj.LH_CHUDE);
                $("#txtNoiDungHen").val(obj.LH_NOIDUNG);
                //$("#txtTTHen").val(trangthai);
            }
        });
    }
</script>
