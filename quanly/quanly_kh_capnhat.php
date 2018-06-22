<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/css.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<title>Cập nhật khách hàng</title>
</head>

<body>
<div class="container">
	<h2 class="h2-kh">Cập nhật thông tin khách hàng</h2>
    <hr />
 <!-- thêm giá trị php sẵn có vào ô <value> để cập nhật -->   
    <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
<!-- ten khach hang -->
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên khách hàng:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value=''>
							</div>
					</div>
<!-- gioi tinh -->
					<div class="form-group">
						<label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
<div class="col-sm-10">
											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="0" id="grpGioiTinh"
												<?php if(isset($gioitinh)&&$gioitinh=="0"){ echo "checked";} ?> />
											Nam</label>

											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="1" id="grpGioiTinh"
											<?php if(isset($gioitinh)&&$gioitinh=="1"){ echo "checked";} ?> />
											Nữ</label>

</div>
</div>
<!-- ngay sinh -->
<div class="form-group">
	<label for="lblNgaySinh" class="col-sm-2 control-label">Ngày sinh:  </label>
	<div class="col-sm-10" class="input-group">
			<span class="input-group-btn">
				<select name="slNgaySinh" id="slNgaySinh" class="form-control" >
	<option value="0">Chọn ngày</option>
<?php
									for($i=1;$i<=31;$i++)
									 {
											 if($i==$ngaysinh){
													 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
											 }
											 else{
											 echo "<option value='".$i."'>".$i."</option>";
											 }
									 }
							?>
</select>
			</span>
			<span class="input-group-btn">
				<select name="slThangSinh" id="slThangSinh" class="form-control">
<option value="0">Chọn tháng</option>
<?php
							for($i=1;$i<=12;$i++)
							 {
										if($i==$thangsinh){
											 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
									 }
									 else{
									 echo "<option value='".$i."'>".$i."</option>";
									 }
							 }
					?>
</select>
			</span>
			<span class="input-group-btn">
				<select name="slNamSinh" id="slNamSinh" class="form-control">
					<option value="0">Chọn năm</option>
					<?php
							for($i=1970;$i<=2010;$i++)
							 {
									 if($i==$namsinh){
											 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
									 }
									 else{
									 echo "<option value='".$i."'>".$i."</option>";
									 }
							 }
					?>
			</select>
			</span>
	</div>
					</div>
<!-- dia chi -->
					<div class="form-group">
						<label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ:  </label>
						<div class="col-sm-10">
							<input type="text" name="txtDiaChi" id="txtDiaChi" value="" class="form-control" placeholder="Địa chỉ"/>
						</div>
						</div>
<!-- dien thoai -->
						<div class="form-group">
						<label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
					<div class="col-sm-10">
						<input type="text" name="txtDienThoai" id="txtDienThoai" value="" class="form-control" placeholder="Điện thoại" />
					</div>
					</div>
<!-- email-->
					<div class="form-group">
						 <label for="lblEmail" class="col-sm-2 control-label">Email:  </label>
<div class="col-sm-10">
			<input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="khachhang@gmail.com"/>
            		
           
</div>
					 </div>
<!-- can nang -->
					 <div class="form-group">
						 <label for="lblDiaChi" class="col-sm-2 control-label">Cân nặng:  </label>
						 <div class="col-sm-10">
							 <input type="text" name="txtCanNang" id="txtCanNang" value="" class="form-control" placeholder="Cân Nặng"/>
						 </div>
						 </div>
<!--chieu cao -->
						 <div class="form-group">
							 <label for="lblDiaChi" class="col-sm-2 control-label">Chiều cao:  </label>
							 <div class="col-sm-10">
								 <input type="text" name="txtCanNang" id="txtCanNang" value="" class="form-control" placeholder="Chiều Cao"/>
							 </div>
							 </div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="index.php" />

						</div>
					</div>
				</form>
	</div>


    
    
    
</body>

</html>