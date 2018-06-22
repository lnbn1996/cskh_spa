<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../tainguyen/css/css.css" />
<link rel="stylesheet" href="../tainguyen/css/bootstrap.min.css">
<script src="../tainguyen/js/jquery-3.2.0.min.js"></script>
<script src="../tainguyen/js/jquery.dataTables.min.js"></script>
<script src="../tainguyen/js/dataTables.bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm dịch vụ</title>
</head>

<body>
<div class="container">
	<h2 class="h2-dv">Thêm Dịch Vụ </h2>
    <hr />
    	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
<!-- ten khach hang -->
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
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="index.php" />

						</div>
					</div>
				</form>
</body>
</html>