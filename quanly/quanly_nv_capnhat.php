<?php
	require_once('csdl/ketnoi.php');
	$manv=$_GET["id"];
	$query=mysqli_query($conn,"SELECT * FROM nhanvien where NV_MA='$manv'");
	$result=mysqli_fetch_array($query);
?>


<div class="container">
	<h2 class="h2-nv">Cập nhật thông tin nhân viên</h2>
    <hr />

 <!-- thêm giá trị php sẵn có vào ô <value> để cập nhật -->


    <form id="form1" name="form1" method="post" action=<?php echo ("index.php?key=cnnv&id=$manv"); ?> class="form-horizontal" role="form" >
<!-- ten khach hang -->
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên nhân viên:  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên nhân viên" value=<?php echo ("\"".$result["NV_HOTEN"]."\"") ?>>
							</div>
					</div>
<!-- gioi tinh -->
					<div class="form-group">
						<label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính:  </label>
<div class="col-sm-10">
											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nam" id="grpGioiTinh"
											 <?php  if ($result["NV_GIOITINH"]=="nam") echo "checked=\"checked\"" ?> />
											Nam</label>

											<label class="radio-inline"><input type="radio" name="grpGioiTinh" value="nữ" id="grpGioiTinh"
											 <?php  if ($result["NV_GIOITINH"]=="nữ") echo "checked=\"checked\"" ?> />
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
										 if ($result["NV_NGAYSINH"]==$i) {
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
								 if ($result["NV_THANGSINH"]==$i) {
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
								 if ($result["NV_NAMSINH"]==$i) {
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
							<input type="text" name="txtDiaChi" id="txtDiaChi" value=<?php echo ("\"".$result["NV_DIACHI"]."\"") ?> class="form-control" placeholder="Địa chỉ"/>
						</div>
						</div>
<!-- dien thoai -->
						<div class="form-group">
						<label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
					<div class="col-sm-10">
						<input type="text" name="txtDienThoai" id="txtDienThoai" value=<?php echo ("\"".$result["NV_SDT"]."\"") ?> class="form-control" placeholder="Điện thoại" />
					</div>
					</div>
<!-- email-->
					<div class="form-group">
						 <label for="lblEmail" class="col-sm-2 control-label">Email:  </label>
<div class="col-sm-10">
			<input type="text" name="txtEmail" id="txtEmail" value=<?php echo ("\"".$result["NV_EMAIL"]."\"") ?> class="form-control" placeholder="nhanvien@gmail.com"/>

</div>
					 </div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Cập nhật" onclick="validateForm()"/>
									<a href="index.php?key=nv">
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
				$sql="UPDATE `nhanvien` SET `NV_HOTEN` = '$ten' ,`NV_GIOITINH` = '$gioitinh',`NV_NGAYSINH` = $ngay_sinh,`NV_DIACHI` = '$diachi',`NV_SDT` = '$dienthoai',`NV_EMAIL` = '$email',`NV_THANGSINH` = $thang_sinh,`NV_NAMSINH` = $nam_sinh WHERE `NV_MA` = '$manv'";
				if (!mysqli_query($conn,$sql))
				{
					//echo "Có lỗi xảy ra, không cập nhật được!";
					echo (mysqli_error($conn));
				}else{
					echo "<script type='text/javascript'>document.location = 'index.php?key=cnnv&id=$manv';</script>";
				}
			}
		 ?>
