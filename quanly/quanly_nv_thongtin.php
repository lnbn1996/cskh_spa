<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<<<<<<< HEAD
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
=======
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
	<script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="../tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý thông tin nhân viên</title>
</head>

<body>
 <h2 class="h2-nv">Quản lý thông tin Nhân Viên</h2>
 <hr />
        <p>
        	<a href=""><img src="img/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm nhân viên mới</a>
        </p>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn tất cả</strong></th>
                    <th><strong>ID nhân viên</strong></th>
                    <th><strong>Tên nhân viên</strong></th>
                    <th><strong>Giới tính</strong></th>
                    <th><strong>Ngày Sinh</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Điện thoại</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Trạng thái</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
<<<<<<< HEAD
           
=======

>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b
			<tr>
            	<td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row[""] ?>"  /></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
              <td><?php  ?></td>
<<<<<<< HEAD
              
              
            
             
=======




>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b
              <td align='center' class='cotNutChucNang'>
              <a href="">
              <img src='img/edit.png' border='0'/></a>
              </td>
<<<<<<< HEAD
              
=======

>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b
              <td align='center' class='cotNutChucNang'>
              	<a onclick="return deleteConfirm()" href="">
              	<img src='img/delete.png' border='0' /></a>
              </td>
            </tr>
<<<<<<< HEAD
         
			</tbody>
        
        </table>  
=======

			</tbody>

        </table>
>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b

 </form>
  <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa nhân viên" id="btnXoa" onlick="return deleteConfirm()" class="btn btn-primary" />
            </div>
        </div>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> dd6f62abb9a3debb8766c701c586c01a0330099b