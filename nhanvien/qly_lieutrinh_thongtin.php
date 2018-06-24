<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông tin liệu trình</title>
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
</head>

<body>
	<!--<div class="container">
    <h2 class="text-info">Thông tin liệu trình</h2>
    	<form name="form3" id="form3" method="post" action="" class="form-horizontal" role="form">
        	<div class="form-group">
            	<strong><label for="txtmlt" class="col-sm-2 control-label">Mã liệu trình</label></strong>
                <div class="col-sm-10">
                	<input type="text" name="txtmlt" class="form-control" />
                </div>
            </div>
        
        </form>
    </div>-->
    
    <h2 class="h2-kh">Quản lý thông tin liệu trình</h2>
 <hr />
        <p>
        	<a href=""><img src="img/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                	<th><strong>Chọn tất cả</strong></th>
                    <th><strong>Mã liệu trình</strong></th>
                    <th><strong>Tên liệu trình</strong></th>
                    <th><strong>Mô tả</strong></th>
                    <th><strong>Nội dung</strong></th>
                    <th><strong>Giá liệu trình</strong></th>
                    <th><strong>Ngày tạo</strong></th>
                    <th><strong>Loại liệu trình</strong></th>
                    <th><strong>Trạng thái liệu trình</strong></th>
                    <th><strong>Mã khách hàng</strong></th>
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
              
              
            
             
              <td align='center' class='cotNutChucNang'>
              <a href="">
              <img src='img/edit.png' border='0'/></a>
              </td>
              
              <td align='center' class='cotNutChucNang'>
              	<a onclick="return deleteConfirm()" href="">
              	<img src='img/delete.png' border='0' /></a>
              </td>
            </tr>
         
			</tbody>
        
        </table>  

 </form>
  <div class="row" style="background-color:#FFF"><!--Nút chức nang-->
            <div class="col-md-12">
            	<input name="btnXoa" type="submit" value="Xóa liệu trình" id="btnXoa" onlick="return deleteConfirm()" class="btn btn-info" />
            </div>
        </div>
</body>
</body>
</html>