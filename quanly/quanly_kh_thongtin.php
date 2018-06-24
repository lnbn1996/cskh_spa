<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
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
<title>Quản lý thông tin khách hàng</title>
</head>

<body>
 <h2 class="h2-kh">Quản lý thông tin Khách Hàng</h2>
 <hr />
        <p>
        	<a href=""><img src="../tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn tất cả</strong></th>
                    <th><strong>ID khách hàng</strong></th>
                    <th><strong>Tên khách hàng</strong></th>
                    <th><strong>Giới tính</strong></th>
                    <th><strong>Ngày Sinh</strong></th>
                    <th><strong>Địa chỉ</strong></th>
                    <th><strong>Điện thoại</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Loại da</strong></th>
                    <th><strong>Cân nặng</strong></th>
                    <th><strong>Chiều cao</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
           
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
              <td><?php  ?></td>
              <td><?php  ?></td>
              
              
            
             
              <td align='center' class='cotNutChucNang'>
              <a href="">
              <img src='../tainguyen/hinhanh/edit.png' border='0'/></a>
              </td>
              
              <td align='center' class='cotNutChucNang'>
              	<a onclick="return deleteConfirm()" href="">
              	<img src='../tainguyen/hinhanh/delete.png' border='0' /></a>
              </td>
            </tr>
         
			</tbody>
        
        </table>  

 </form>
  <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa khách hàng" id="btnXoa" onlick="return deleteConfirm()" class="btn btn-primary" />
            </div>
        </div>
</body>
</html>