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
<title>Phân quyền</title>
</head>

<body>

 <form name="frmXoa" method="post" action="">
        <h2 class="h2-quyen">Danh sách phân quyền</h2>
        <hr />
        <p>
        <a href=""><img src="img/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
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

			?>
			<tr>
            	<td class="cotCheckBox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php ?>" /></td>
              <td class="cotCheckBox"><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>

              <td align='center' class='cotNutChucNang'>
              <a href="">
              <img src='img/edit.png' border='0'  /></a></td>

              <td align='center' class='cotNutChucNang'>
              <a href="">
              <img src='img/delete.png' border='0' /></a></td>
            </tr>
            <?php
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
