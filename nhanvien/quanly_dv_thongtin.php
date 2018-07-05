<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
 <script language="javascript">
      $(document).ready(function() {
          var table = $('#tablespa').DataTable({
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
        <a href="quanly_dv_thongtin.php"><h2 class="h2-dv">Thông tin dịch vụ</h2></a>
        <hr />
        <p>
        <a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="tainguyen/hinhanh/add.png" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <form name="fMain" id="fMain" method="post" action="nhanvien/xuly_dv.php">
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn</strong></th>
                    <th><strong>STT</strong></th>
                    <th><strong>Tên dịch vụ</strong></th>
                    <th><strong>Nội dung </strong></th>
                    <th><strong>Giá tiền (VND) </strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
              $stt=1;
              $result = mysqli_query($conn, "SELECT * FROM dichvu");
              while($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
              {
            ?>
			<tr>
            	<td class="cotCheckBox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['DV_MA']; ?>" /></td>
              <td class="cotCheckBox"><?php echo $stt; ?></td>
              <td><?php echo $row['DV_TEN']; ?></td>
              <td><?php echo $row['DV_NOIDUNG']; ?></td>
              <td><?php echo number_format($row['DV_GIATIEN']); ?></td>
             
              <td align='center' class='cotNutChucNang'>
              <a href="#modalCapNhat" data-target="#modalCapNhat" data-toggle="modal" id="<?php echo $row['DV_MA']; ?>" onClick="CapNhatDV(this);" ">
              <img src='tainguyen/hinhanh/edit.png' border='0'  /></a></td>
              
              <td align='center' class='cotNutChucNang'>
              <a href="nhanvien/xuly_dv.php?ma=<?php echo $row['DV_MA']; ?>" onClick="return deleteConfirm()">
              <img src='tainguyen/hinhanh/delete.png' border='0' /></a>
              </td>
            </tr>
            <?php
                $stt++;
              };
            ?>
			</tbody>
        
        </table>  
        
        
        <!--Nút Thêm mới , xóa tất cả-->
    <div class="row" style="background-color:#FFF">
        <div class="col-md-12">
           	<input name="btnXoa" type="submit" value="Xóa mục chọn" id="btnXoa" onClick='return deleteConfirm()' class="btn btn-primary" />
            </div>
        </div>    
    </form>

<!-- Modal thêm dịch vụ -->
    <div class="modal fade" id="modalThemMoi" role="dialog">
        <div class="modal-dialog modal-lg">      
    <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
            <h2 class="h2-dv">Thêm Dịch Vụ </h2>
            <hr />
                <form id="fThemMoi" name="fThemMoi" method="post" action="nhanvien/xuly_dv.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtTen" class="col-sm-2 control-label">Tên dịch vụ:  </label>
                        <div class="col-sm-9">
                            <input type="text" name="txtTenDV" id="txtTenDV" class="form-control" placeholder="Tên dịch vụ" required="" value=''>
                        </div>
                   </div>
                   <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Nội dung:  </label>
                        <div class="col-sm-9">
                            <input type="text" name="txtNoiDungDV" id="txtNoiDungDV" value="" class="form-control" required="" placeholder="Nội dung dịch vụ"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Giá dịch vụ:  </label>
                        <div class="col-sm-9">
                            <input type="text" name="txtGiaDV" id="txtGiaDV" value="" class="form-control" required="" placeholder="VND"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                            <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />
                        </div>
                    </div>
                </form>
            </div>            
        </div>
    </div>
<!-- End Modal thêm dv -->

<!-- Modal cập nhật dịch vụ -->
    <div class="modal fade" id="modalCapNhat" role="dialog">
        <div class="modal-dialog modal-lg">      
    <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
            <h2 class="h2-dv"> Cập nhật Dịch Vụ </h2>
            <hr />
                <form id="fCapNhat" name="fCapNhat" method="post" action="nhanvien/xuly_dv.php" class="form-horizontal" role="form">
                <input type="hidden" name="dv_ma" id="dv_ma" value="">
                        <div class="form-group">
                            <label for="txtTen" class="col-sm-2 control-label">Tên dịch vụ:  </label>
                            <div class="col-sm-9">
                                <input type="text" name="txtTenDVCN" id="txtTenDVCN" class="form-control" required="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lblDiaChi" class="col-sm-2 control-label">Nội dung:  </label>
                            <div class="col-sm-9">
                                <input type="text" name="txtNoiDungCN" id="txtNoiDungCN" value="" required="" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lblDiaChi" class="col-sm-2 control-label">Giá dịch vụ (VND):  </label>
                            <div class="col-sm-9">
                                <input type="text" name="txtGiaDVCN" id="txtGiaDVCN" value="" required="" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập Nhật"/>
                                <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />
                            </div>
                        </div>
                </form>
            </div>            
        </div>
    </div>
<!-- End Modal cập nhật dv -->
<script>
    /* reset modal when closed */
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    /* function tách số tiền fThemMoi */
    (function($, undefined) {
    $(function() {
        var $fm = $( "#fThemMoi" );
        var $inp = $fm.find( "#txtGiaDV" );
        $inp.on( "keyup", function( event ) {           
         // When user select text in the document, also abort.
        // var selection = window.getSelection().toString();
        // if ( selection !== '' ) {
        //     return;
        // }   
        // // When the arrow keys are pressed, abort.
        // if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
        //     return;
        // }    
        var $this = $( this );        
        // Get the value.
        var inp = $this.val();          
        var inp = inp.replace(/[\D\s\._\-]+/g, "");
            inp = inp ? parseInt( inp, 10 ) : 0;
            $this.val( function() {
                        return ( inp === 0 ) ? "" : inp.toLocaleString( "en-US" );
                    });
            });     
        });
    })(jQuery);
    /* End function tách số tiền fThemMoi */

    /* function tách số tiền fCapNhat */
    (function($, undefined) {
    $(function() {
        var $fm1 = $( "#fCapNhat" );
        var $gia = $fm1.find( "#txtGiaDVCN" );
        $gia.on( "keyup", function( event ) {              
        var $this = $( this );        
        // Get the value.
        var gia = $this.val();          
        var gia = gia.replace(/[\D\s\._\-]+/g, "");
            gia = gia ? parseInt( gia, 10 ) : 0;
            $this.val( function() {
                        return ( gia === 0 ) ? "" : gia.toLocaleString( "en-US" );
                    } );
            });     
        });
    })(jQuery);
    /* End function tách số tiền fCapNhat */

    /* Function cho Modal Cập Nhật */
    function CapNhatDV(a) {
        var dv_ma = a.id;
        $.ajax({
            url:"nhanvien/xuly_dv.php",
            method:"GET",
            data: {"dv_ma": dv_ma},
            success: function(response){
                console.log(response);
                var obj = JSON.parse(response);
                $("#dv_ma").val(obj.dv_ma);
                $("#txtTenDVCN").val(obj.dv_ten);
                $("#txtNoiDungCN").val(obj.dv_noidung);
                // $("#txtGiaDVCN").val(obj.dv_giatien);
                var $gia = obj.dv_giatien;
                var $gia = $gia.replace(/[\D\s\._\-]+/g, "");
                $gia = $gia ? parseInt( $gia, 10 ) : 0;
                $("#txtGiaDVCN").val( function() {
                    return ( $gia === 0 ) ? "" : $gia.toLocaleString( "en-US" );
                } );
            }
        });
    }
</script>
