<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
    <script src="../tainguyen/js/jquery.dataTables.min.js"></script>
    <script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.0/angular.min.js"></script>
    <!-- For Modal -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <!-- Others Script -->
    <script src="../tainguyen/js/funcs.js"></script>
<title>Untitled Document</title>
</head>

<body>
	<h2 class="h2-quyen">Quản lý thông tin nhóm quyền </h2>
    <hr />
    <p>
    	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
        	<a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal">
       			<div class="btm-group">
              		<div class="col-sm-10">
                		<input type="submit" class="btn btn-info btn-sm" name="btnThemMoi" id="btnThemMoi" value="Thêm nhóm quyền"/>
                    	<input type="submit" class="btn btn-info btn-sm" name="btnThemMoiVT" id="btnThemMoiVT" value="Thêm Vai trò"/>
                    </div>
                </div>
        	</a>
        
    	</form>
	</p>
    
<!-- Tiến độ  --> 
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%">
    70%
</div>
</div>  
<!-- Thông tin -->


<?php
  $i=1;
  while ($i<=10) {
?>
  <div class="list-group">
    	<div class="col-sm-2"  style="margin-bottom: 1%; ">
  			<a href="#" class="list-group-item active">Nhóm gì đó <?php echo $i;?> </a>
  			<a href="#" class="list-group-item"> Nhóm quyền 1</a>
  			<a href="#" class="list-group-item"> Nhóm quyền 2</a>
        <a href="#" class="list-group-item"> Nhóm quyền 3</a>
		</div>
  </div>
<?php 
  $i++;
  }
?>        

              
        
<!-- Modal thêm mới nhóm quyền -->
 	<div class="modal fade" id="modalThemMoi" role="dialog">
      <div class="modal-dialog modal-md">      
<!-- Modal content-->
       	<div class="modal-content" style="background-color: white;">
    	<h2 class="h2-nq">Thêm nhóm quyền </h2>
    	<hr />
   		 <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
			<div class="form-group">
            	<label for="txtTenNQ" class="col-sm-3 control-label">Tên nhóm quyền:  </label>
           		<div class="col-sm-8">
            		<input type="text" name="txtTenNQ" id="txtTenNQ" class="form-control" placeholder="Tên nhóm quyền" value='' required="">
                </div>
            </div>
            
            <div class="form-group">
                <label for="txtDienGiai" class="col-sm-3 control-label">Diễn giải:  </label>
                <div class="col-sm-8">
                	<input type="text" name="txtDienGiai" id="txtDienGiai" class="form-control" placeholder="Diễn giải" value='' required="">
                </div>
             </div>  
             
             <div class="form-group"> 
             	<label for="sell" class="col-sm-3 control-label">Vai trò:  </label>
             		<div class="col-sm-8">
             			<select class="form-control" id="slVaiTro" name="slVaiTro" required="">
                        	<option value="" class="col-sm-8"> Chọn vai trò </option>
                        	<option value="vaitro 1" class="col-sm-8"> Vai trò 1</option>
                        	<option value="vaitro 2" class="col-sm-8"> Vai trò 2</option>
                            <option value="vaitro 2" class="col-sm-8"> Vai trò 3</option>
                     	</select>
              		</div>
              </div> 
             
              <div class="form-group">
              	<div class="col-sm-offset-3 col-sm-9">
                	<input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                    <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal"  />
                 </div>
              </div>
            </form>

</body>
</html>