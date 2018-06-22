<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
<link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
<script src="tainguyen/js/jquery-3.2.0.min.js"></script>
<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thông báo</title>
</head>

<body>
<div class="container">
	<h2 class="h2-thongbao">Thêm thông báo mới </h2>
    <hr />
    	<form id="form1" name="form1" method="post" action="xuly_thongbao.php" class="form-horizontal" role="form">

					<div class="form-group">
						    <label for="txtTenTB" class="col-sm-2 control-label">Tên thông báo:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTenTB" id="txtTenTB" class="form-control" placeholder="Tên thông báo" value=''>
							</div>
					</div>
                     <div class="form-group">
							 <label for="txtNoiDungTB" class="col-sm-2 control-label">Nội dung thông báo:  </label>
							 <div class="col-sm-10">
								 <textarea name="txtNoiDungTB" id="txtNoiDungTB" value="Nội dung thông báo" class="form-control" placeholder="Nội dung thông báo"/> </textarea>
							 </div>
							 </div>
					<div class="form-group">
						    <label for="txtTenL" class="col-sm-2 control-label">Loại thông báo:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTenL" id="txtTenL" class="form-control" placeholder="Loại thông báo" value=''>
							</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Hủy" onclick="quanly_quyen_thongtin.php" />

						</div>
					</div>
				</form>
</body>
</html>
