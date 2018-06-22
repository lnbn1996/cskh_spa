<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
 	<script src="tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.0/angular.min.js"></script>
    <!-- For Modal -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!-- Others Script -->
    <script src="tainguyen/js/funcs.js"></script>
<title>Quản lý thông báo</title>
</head>

<body>
	<title>Phân quyền</title>
</head>

<body>

 <form name="frmXoa" method="post" action="xuly_quyen.php">
        <h2 class="h2-tb">Quản lý thông báo</h2>
        <hr />
        <p>
        <a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><img src="tainguyen/hinhanh/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                    <tr>
                    	<th><strong>Chọn</strong></th>
                        <th><strong>Mã thông báo</strong></th>
                        <th><strong>Nội dung</strong></th>
                        <th><strong>Ngày đăng</strong></th>
                        <th><strong>Loại</strong></th>
                         <th><strong>Mã nv</strong></th>
                        
                        <th width="100"><strong>Xóa</strong></th>
                    </tr>
            </thead>
      	    <tbody>
           
      			<tr>
                  	<td class="cotCheckBox"><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php ?>" /></td>
                    <td class="cotCheckBox"><?php   ?></td>
                    <td><?php     ?></td>
                    <td><?php     ?></td>
                    <td><?php     ?></td>
                    <td><?php     ?></td>
                     
    
                    <td align='center' class='cotNutChucNang'>
                        <a href="xuly_quyen.php?ma=<?php ?>" onClick="return deleteConfirm()"/>
                        <img src='tainguyen/hinhanh/delete.png' border='0' /></a>
                    </td>
            </tr>
           
      	     </tbody>
      </table>


        <!--Nút Thêm mới , xóa tất cả-->
        <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa mục chọn" id="btnXoa" onClick='return deleteConfirm()' class="btn btn-primary" />
            </div>
        </div><!--Nút chức nang-->

 </form>
</body>
</html>