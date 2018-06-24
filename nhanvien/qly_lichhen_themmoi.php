<!DOCTYPE html>
<html>
<head>
	<title>Thêm mới lịch hẹn</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h2 class="text-info">Cập nhật lịch hẹn với khách hàng</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
	<!--ngay-->
	<div class="form-group">
  				<label for="lblNgayhen" class="col-sm-2 control-label">Ngày hẹn lịch:  </label>
  					<div class="col-sm-10" style="padding-right: 40%">
  						<input type="date" class="form-control" id="NGAYSINH" placeholder="Chọn ngày sinh" name="NGAYSINH">
 					</div>
	</div>
    <!--Thoigian--><div class="form-group">
        	<label class="col-sm-2 control-label">Thời gian</label>
            <div class="col-sm-7"><input type="time" class="form-control" name="tgian" /></div>
        	
        </div>
<!--Nd--><div class="form-group">
			<label for="txtnd" class="col-sm-2 control-label">Nội dung</label>
			<div class="col-sm-7"><textarea cols="5" rows="3" name="txtnd" class="form-control" placeholder="Nhập nội dung"></textarea></div>
		</div>
			<div class="form-group">
        	<label class="col-sm-2 control-label">Chủ đề lịch hẹn</label>
            <div class="col-sm-7" class="input-group">
            	<span class="input-group-btn">
            	<select name="slchude" id="slchude" class="form-control">
                	<option value="0">Chọn chủ đề</option>
                    <option>Da</option>
                    <option>Body</option>
                    <option>Giảm cân</option>
					<option>Tắm trắng</option>
					<option>Khác</option>
                </select>
                  </span>
            </div>
        </div>
</div>

</div>
    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-info" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-info" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="" />

						</div>
    
    
    
    	</form>
    </div>
</body> 
 </html>
 <?php
  		include_once("../csdl/ketnoi.php");
		if(isset($_POST["btnThemMoi"]))
		{
				$ngay = $_POST["NGAYSINH"];
				$tgian= $_POST["tgian"];
				$noidung = $_POST["txtnd"];
				$chude = $_POST["slchude"] ;
				$ngaytao = date('Y-m-d H:i:s');
				$kh_ma = 'KH03';
				$sq="INSERT INTO `lichhen` (`LH_NGAY`,`LH_THOIGIAN`,`LH_NOIDUNG`,`LH_CHUDE`,`LH_TRANGTHAI`,`LH_NGAYTAO`,`KH_MA`) VALUES ('$ngay', '$tgian', '$noidung', '$chude',0, '$ngaytao', '$kh_ma') ";
				$result = mysqli_query($conn,$sq);
				if($result)
					{
					   echo '<meta http-equiv="refresh" content="0;URL=qly_lichhen_themmoi.php/>';
					}
				else
					{
						echo "<script type='text/javascript'>alert('Có lỗi xảy ra, không thêm khách hàng được')</script>";
						echo mysqli_error($conn);
					}
				

		}
 ?>