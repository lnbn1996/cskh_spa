<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../tainguyen/css/bootstrap.min.css">
    <script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="../tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
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
<title>Dịch vụ</title>
</head>

<body>
        <a href="quanly_dv_thongtin.php"><h2 class="h2-dv">Thông tin dịch vụ</h2></a>
        <hr />
        <p>
        <a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="../tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <form name="fMain" id="fMain" method="post" action="xuly_dv.php">
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn</strong></th>
                    <th><strong>STT</strong></th>
                    <th><strong>Tên dịch vụ</strong></th>
                    <th><strong>Nội dung </strong></th>
                    <th><strong>Giá tiền (VND) </strong></th>
                    <th width="100"><strong>Cập nhật</strong></th>
                    <th width="100"><strong>Xóa</strong></th>
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
              <a href="#modalCapNhat" data-target="#modalCapNhat" data-toggle="modal" id="<?php echo $row['DV_MA']; ?>" onClick="CapNhatDV(this);"">
              <img src='../tainguyen/hinhanh/edit.png' border='0'  /></a></td>
              
              <td align='center' class='cotNutChucNang'>
              <a href="xuly_dv.php?ma=<?php echo $row['DV_MA']; ?>" onClick="return deleteConfirm()">
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

<!-- Modal thêm dịch vụ -->
    <div class="modal fade" id="modalThemMoi" role="dialog">
        <div class="modal-dialog modal-lg">      
    <!-- Modal content-->
            <div class="modal-content" style="background-color: white;">
            <h2 class="h2-dv">Thêm Dịch Vụ </h2>
            <hr />
                <form id="fThemMoi" name="fThemMoi" method="post" action="xuly_dv.php" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="txtTen" class="col-sm-2 control-label">Tên dịch vụ:  </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtTenDV" id="txtTenDV" class="form-control" placeholder="Tên dịch vụ" value=''>
                        </div>
                   </div>
                   <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Nội dung:  </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtNoiDungDV" id="txtNoiDungDV" value="" class="form-control" placeholder="Nội dung dịch vụ"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lblDiaChi" class="col-sm-2 control-label">Giá dịch vụ:  </label>
                        <div class="col-sm-10">
                            <input type="text" name="txtGiaDV" id="txtGiaDV" value="" class="form-control" placeholder="VND"/>
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
                <form id="fCapNhat" name="fCapNhat" method="post" action="xuly_dv.php" class="form-horizontal" role="form">
                <input type="hidden" name="dv_ma" id="dv_ma" value="">
                        <div class="form-group">
                            <label for="txtTen" class="col-sm-2 control-label">Tên dịch vụ:  </label>
                            <div class="col-sm-10">
                                <input type="text" name="txtTenDVCN" id="txtTenDVCN" class="form-control" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lblDiaChi" class="col-sm-2 control-label">Nội dung:  </label>
                            <div class="col-sm-10">
                                <input type="text" name="txtNoiDungCN" id="txtNoiDungCN" value="" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lblDiaChi" class="col-sm-2 control-label">Giá dịch vụ (VND):  </label>
                            <div class="col-sm-10">
                                <input type="text" name="txtGiaDVCN" id="txtGiaDVCN" value="" class="form-control" />
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
</body>
</html>
<script>
    /* reset modal when closed */
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    /* function tách số tiền fThemMoi */
    (function($, undefined) {
    $(function() {
        var $form = $( "#fThemMoi" );
        var $input = $form.find( "#txtGiaDV" );
        $input.on( "keyup", function( event ) {           
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
        var input = $this.val();          
        var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;
            $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
            });     
        });
    })(jQuery);
    /* End function tách số tiền fThemMoi */
    /* function tách số tiền fCapNhat */
    (function($, undefined) {
    $(function() {
        var $form = $( "#fCapNhat" );
        var $input = $form.find( "#txtGiaDVCN" );
        $input.on( "keyup", function( event ) {              
        var $this = $( this );        
        // Get the value.
        var input = $this.val();          
        var input = input.replace(/[\D\s\._\-]+/g, "");
            input = input ? parseInt( input, 10 ) : 0;
            $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
            });     
        });
    })(jQuery);
    /* End function tách số tiền fCapNhat */

    /* Function cho Modal Cập Nhật */
    function CapNhatDV(a) {
        var dv_ma = a.id;
        $.ajax({
            url:"xuly_dv.php",
            method:"GET",
            data: {"dv_ma": dv_ma},
            success: function(response){
                // console.log(response);
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