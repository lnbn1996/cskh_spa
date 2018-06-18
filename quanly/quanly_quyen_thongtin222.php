<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
    <script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="../tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
        <script language="javascript">
            function deleteConfirm(){
                if(confirm("Bạn có chắc chắn muốn xóa!")){
                    return true;
                }
                else{
                    return false;
                }
            }
        </script>
    <script language="javascript">
      $(document).ready(function() {
          var table= $('#tablespa').DataTable( {
          responsive: true,
          "language": {
            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang:",
            "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu:",
            "infoEmpty": "Dữ liệu rỗng",
            "emptyTable": "Chưa có dữ liệu nào",
            "processing": "Đang xử lý",
            "search": "Tìm kiếm",
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
          "lengthMenu": [[10,15,20,25,30,-1],[10,15,20,25,30,"Tat ca"]]
            });
      new $.fn.dataTable.FixedHeader( table );
      });
    </script>
<?php
    include_once("../csdl/ketnoi.php"); 
      // //Kiểm tra xem có truyền mã  cần xóa
      // if(isset($_GET["ma"]))
      // {
      // //Nếu xóa thì lấy mã và tiến hành xóa
      //   $maloai = $_GET["ma"];
      //   mysqli_query($conn, "DELETE FROM loaisanpham WHERE lsp_ma=$maloai");
      // }
      // //Nếu không truyền mã để xóa thì báo lỗi
      // else
      // {
      //     echo "Không có mã để xóa!";
      // }
      
?>        
<?php 
      // if(isset($_POST['btnXoa']) && isset($_POST['checkbox'])) {
      //   for ($i=0; $i < count($_POST['checkbox']);$i++)
      //   {
      //     $masanpham = $_POST['checkbox'][$i];
      //     mysqli_query($conn,"DELETE FROM loaisanpham where lsp_ma=$masanpham");
          
      //   }
// }
?>
<title>Phân quyền</title>
</head>

<body>

 <form name="frmXoa" method="post" action="">
        <h2 class="h2-quyen">Danh sách phân quyền</h2>
        <hr />
        <p>
        <a href=""><img src="../tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                    	 <th><strong>Chọn</strong></th>
                        <th><strong>Số thứ tự</strong></th>
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
                  	<td class="cotCheckBox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php $row['NQCT_MA'] ?>" /></td>
                    <td class="cotCheckBox"><?php $stt;  ?></td>
                    <td><?php $row['NQCT_TEN'];  ?></td>
                    <td><?php $row['NQCT_DIENGIAI'];   ?></td>

                    <td align='center' class='cotNutChucNang'>
                    <a href="">
                    <img src='../tainguyen/hinhanh/edit.png' border='0'  /></a></td>

                    <td align='center' class='cotNutChucNang'>
                    <a href="">
                    <img src='../tainguyen/hinhanh/delete.png' border='0' /></a></td>
            </tr>
            <?php
                $stt++;
              }
      			?>
      	     </tbody>
      </table>


        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa mục chọn" id="btnXoa" onlick='return deleteConfirm()' class="btn btn-primary" />
            </div>
        </div><!--Nút chức nang-->

 </form>

</body>
</html>
