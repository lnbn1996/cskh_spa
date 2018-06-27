<?php
	require_once('csdl/ketnoi.php');
	$makh=$_GET["id"];
	$query=mysqli_query($conn,"SELECT * FROM khachhang where KH_MA='$makh'");
	$result=mysqli_fetch_array($query);
?>
<div class="container">
	<h2 class="h2-kh">Cập nhật thông tin khách hàng </h2>
    <hr />
			 	<form id="form1" name="form1" method="post" action=<?php echo ("index.php?key=cnkh&id=$makh"); ?> class="form-horizontal" role="form">
<!-- ten khach hang -->
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên khách hàng:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value=<?php echo ("\"".$result["KH_HOTEN"]."\"") ?> >
							</div>
					</div>
<!-- gioi tinh -->
					<div class="form-group">
						<label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
<div class="col-sm-10">
											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nam" id="grpGioiTinh" <?php  if ($result["KH_GIOITINH"]=="nam") echo "checked=\"checked\"" ?>/>Nam</label>

											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nữ" id="grpGioiTinh" <?php  if ($result["KH_GIOITINH"]=="nữ") echo "checked=\"checked\"" ?>/>Nữ</label>

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
											
											if ($result["KH_NGAYSINH"]==$i) {
												echo "<option selected=\"selected\" value='".$i."'>".$i."</option>";
											} else
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
									if ($result["KH_THANGSINH"]==$i) {
												echo "<option selected=\"selected\" value='".$i."'>".$i."</option>";
											} else
											echo "<option value='".$i."'>".$i."</option>";
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
									 if ($result["KH_NAMSINH"]==$i) {
												echo "<option selected=\"selected\" value='".$i."'>".$i."</option>";
											} else
											echo "<option value='".$i."'>".$i."</option>";
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
							<input type="text" name="txtDiaChi" id="txtDiaChi"  class="form-control" placeholder="Địa chỉ" value=<?php echo ("\"".$result["KH_DIACHI"]."\"") ?> />
						</div>
						</div>
<!-- dien thoai -->
						<div class="form-group">
						<label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
					<div class="col-sm-10">
						<input type="text" name="txtDienThoai" id="txtDienThoai" class="form-control" placeholder="Điện thoại" value=<?php echo ("\"".$result["KH_SDT"]."\"") ?>/>
					</div>
					</div>
<!-- email-->
					<div class="form-group">
						 <label for="lblEmail" class="col-sm-2 control-label">Email:  </label>
<div class="col-sm-10">
			<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="khachhang@gmail.com" value=<?php echo ("\"".$result["KH_EMAIL"]."\"") ?>/>


</div>
					 </div>

						<div class="form-group">
							 <label for="lblDiaChi" class="col-sm-2 control-label">Loại da:  </label>
							 <div class="col-sm-10">
								 <input type="text" name="txtLoaiDa" id="txtLoaiDa" class="form-control" placeholder="Loại da" value=<?php echo ("\"".$result["KH_LOAIDA"]."\"") ?> />
							 </div>
							 </div>
<!-- can nang -->
					 <div class="form-group">
						 <label for="lblDiaChi" class="col-sm-2 control-label">Cân nặng:  </label>
						 <div class="col-sm-10">
							 <input type="text" name="txtCanNang" id="txtCanNang" class="form-control" placeholder="Cân Nặng" value=<?php echo ("\"".$result["KH_CANNANG"]."\"") ?>/>
						 </div>
						 </div>
<!--chieu cao -->
						 <div class="form-group">
							 <label for="lblDiaChi" class="col-sm-2 control-label">Chiều cao:  </label>
							 <div class="col-sm-10">
								 <input type="text" name="txtChieuCao" id="txtChieuCao" class="form-control" placeholder="Chiều Cao" value=<?php echo ("\"".$result["KH_CHIEUCAO"]."\"") ?>/>
							 </div>
							 </div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="button" class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Cập nhật" onclick="validateForm()" />
						      <a href="index.php?key=kh">
                              	<input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Trở về"/>
							  </a>
						</div>
					</div>
				</form>
	</div>
<?php 
		include 'csdl/ketnoi.php';
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
			$sql="UPDATE `khachhang` SET `KH_HOTEN` = '$ten' ,`KH_GIOITINH` = '$gioitinh',`KH_NGAYSINH` = $ngay_sinh,`KH_DIACHI` = '$diachi',`KH_SDT` = '$dienthoai',`KH_EMAIL` = '$email',`KH_CANNANG` = $cannang,`KH_CHIEUCAO` = $chieucao,`KH_NGAYCAPNHAT` = now(),`KH_LOAIDA` = '$loaida',`KH_THANGSINH` = $thang_sinh,`KH_NAMSINH` = $nam_sinh WHERE `KH_MA` = '$makh'";
			if (!mysqli_query($conn,$sql)) 
			{
				echo "Có lỗi xảy ra, không cập nhật được!"; //echo (mysqli_error($conn));
			}else{
				echo "<script type='text/javascript'>document.location = 'index.php?key=cnkh&id=$makh';</script>";
			}
		}
	 ?>  

