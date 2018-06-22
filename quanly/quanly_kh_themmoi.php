<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Link -->
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/css.css" />
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/jquery-3.2.0.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>thêm khách hàng</title>
</head>

<body>
<div class="container">
	<h2 class="h2-kh">Thêm thông tin khách hàng </h2>
    <hr />
			 	<form id="form1" name="form1" method="post" action="quanly_kh_themmoi.php" class="form-horizontal" role="form">
<!-- ten khach hang -->
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên khách hàng:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value="" >
							</div>
					</div>
<!-- gioi tinh -->
					<div class="form-group">
						<label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
<div class="col-sm-10">
											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nam" id="grpGioiTinh"/>Nam</label>

											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nữ" id="grpGioiTinh"/>Nữ</label>

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
											
											 echo "<option value='".$i."'>".$i."</option>";
											 
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
							<input type="text" name="txtDiaChi" id="txtDiaChi" value="" class="form-control" placeholder="Địa chỉ" />
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
			<input type="email" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="khachhang@gmail.com" />


</div>
					 </div>

						<div class="form-group">
							 <label for="lblDiaChi" class="col-sm-2 control-label">Loại da:  </label>
							 <div class="col-sm-10">
								 <input type="text" name="txtLoaiDa" id="txtLoaiDa" value="" class="form-control" placeholder="Loại da"/>
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
								 <input type="text" name="txtChieuCao" id="txtChieuCao" value="" class="form-control" placeholder="Chiều Cao"/>
							 </div>
							 </div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="button" class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới" onclick="validateForm()" />
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="index.php" />

						</div>
					</div>
				</form>
	</div>
	<script type="text/javascript">
		function validateForm(){
			var count=0;
			for (var i = 0; i < document.getElementById("form1").elements.length; i++) {
			 	x=document.getElementById("form1").elements[i];
			 	if (x.name=="txtTen" && !/^[a-zA-Z_\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,}$/.test(document.form1.txtTen.value)){
			 		alert("Tên không hợp lệ");
			 		return false;
			 	} else if(x.name=="grpGioiTinh"){
			 		count=0;
			 		for (var j = 0; j < document.form1.grpGioiTinh.length; j++) {
						if (document.form1.grpGioiTinh[j].checked==true) break; else count++;
					} 
					if (count==document.form1.grpGioiTinh.length) {
						alert ("Xin chọn giới tính");
						return false;
					}
				} else if(x.name=="slNgaySinh"){
					count=0;
			 		for (var k = 0; k < document.form1.slNgaySinh.length; k++) {
						 if (document.form1.slNgaySinh[k].selected==true && document.form1.slNgaySinh[k].value!=0 )break; else count++;
					}
					if (count==document.form1.slNgaySinh.length) {
						alert ("Xin chọn ngày sinh");
						return false;
					}	
				} else if(x.name=="slThangSinh"){
					count=0;
			 		for (var l = 0; l < document.form1.slThangSinh.length; l++) {
						if (document.form1.slThangSinh[l].selected==true && document.form1.slThangSinh[l].value!=0 ) break; else count++;
					}
					if (count==document.form1.slThangSinh.length) {
						alert ("Xin chọn tháng sinh");
						return false;
					}
				} else if(x.name=="slNamSinh"){
					count=0;
			 		for (var m = 0; m < document.form1.slNamSinh.length; m++) {
						if (document.form1.slNamSinh[m].selected==true && document.form1.slNamSinh[m].value!=0 ) break; else count++;
					}
					if (count==document.form1.slNamSinh.length) {
						alert ("Xin chọn năm sinh");
						return false;
					}
				} else if (x.name=="txtDiaChi" && !/^[a-zA-Z0-9\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/.test(document.form1.txtDienThoai.value)){
					alert ("Địa chỉ không hợp lệ");
					return false;
				} else if (x.name=="txtDienThoai" && !/^[0-9]{10,11}$/.test(document.form1.txtDienThoai.value)){
					alert("Số điện thoại không hợp lệ");
					return false;
				} else if (x.name=="txtEmail" && !/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(document.form1.txtEmail.value)){
					alert("Email không hợp lệ");
					return false;
				}	else if (x.name=="txtLoaiDa" && !/^[a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]*$/.test(document.form1.txtLoaiDa.value)){
					alert("Loại da không hợp lệ");
					return false;
				}	else if (x.name=="txtCanNang" && !/^[0-9]*$/.test(document.form1.txtCanNang.value)){
					alert("Cân nặng không hợp lệ");
					return false;
				} else if (x.name=="txtChieuCao" && !/^[0-9]*$/.test(document.form1.txtChieuCao.value)){
					alert("Chiều cao không hợp lệ");
					return false;
				} else if ((x.name=="txtLoaiDa" || x.name=="txtCanNang" || x.name=="txtChieuCao") && x.value=="") {
					if (x.name=="txtLoaiDa") x.value=" "; else x.value=0;
				}
			}
			document.form1.submit();
		}
	</script>
 	<?php 
		include '../csdl/ketnoi.php';
		if (isset($_POST["txtTen"])){
			$ten=$_POST["txtTen"];
			$gioitinh=$_POST["grpGioiTinh"];
			$ngay_sinh=$_POST["slNgaySinh"];
			$thang_sinh=$_POST["slThangSinh"];
			$nam_sinh=$_POST["slNamSinh"];
			$diachi=$_POST["txtDiaChi"];
			$dienthoai=$_POST["txtDienThoai"];
			$email=$_POST["txtEmail"];
			$loaida=$_POST["txtLoaiDa"];
			$cannang=$_POST["txtCanNang"];
			$chieucao= $_POST["txtChieuCao"];
			$sql="SELECT * FROM khachhang";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_num_rows($query)+1;
			$idkh="KH0".$row;
			$mk=$dienthoai/2;
			$sql="INSERT INTO taikhoan (`TENNGUOIDUNG`,`MATKHAU`,`NGAYTAO`,`TK_LOAI`,`NQ_MA`)VALUES('$dienthoai','$mk',now(),'khách hàng',1)";
			if (!mysqli_query($conn,$sql)) echo (mysqli_error($conn));
			$sql="INSERT INTO khachhang (`KH_MA`,`KH_HOTEN`,`KH_GIOITINH`,`KH_NGAYSINH`,`KH_DIACHI`,`KH_SDT`,`KH_EMAIL`,`KH_CANNANG`,`KH_CHIEUCAO`,`KH_NGAYCAPNHAT`,`KH_NGAYTAO`,`KH_LOAIDA`,`KH_THANGSINH`,`KH_NAMSINH`,`KH_TRANGTHAI`,`TENNGUOIDUNG`) VALUES ('$idkh','$ten','$gioitinh',$ngay_sinh,'$diachi','$dienthoai','$email',$cannang,$chieucao,null,now(),'$loaida',$thang_sinh,$nam_sinh,'1','$dienthoai')";
			if (!mysqli_query($conn,$sql)) echo (mysqli_error($conn));

		}
	 ?> 
</body>
			</html>
