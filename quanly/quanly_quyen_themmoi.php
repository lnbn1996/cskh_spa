<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head href="tainguyen/css/css.css" rel="stylesheet" type="text/css">

<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
<script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
<script src="../tainguyen/js/jquery.dataTables.min.js"></script>
<script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm quyền</title>
</head>

<body>
<div class="container">
	<h2 class="h2-quyen">Thêm quyền </h2>
    <hr />
    	<form id="form1" name="form1" method="post" action="xuly_quyen.php" class="form-horizontal" role="form">
<!-- ten khach hang -->
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên quyền:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTenQ" id="txtTenQ" class="form-control" placeholder="Tên quyền" value=''>
							</div>
					</div>
                     <div class="form-group">
							 <label for="lblDiaChi" class="col-sm-2 control-label">Mô tả:  </label>
							 <div class="col-sm-10">
								 <input type="text" name="txtMoTaQ" id="txtMoTaQ" value="" class="form-control" placeholder="Mô tả"/>
							 </div>
							 </div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Trở về" onclick="quanly_quyen_thongtin.php" />

						</div>
					</div>
				</form>
</body>
</html>
