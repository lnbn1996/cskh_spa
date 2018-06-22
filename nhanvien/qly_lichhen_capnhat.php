<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cập nhật lịch hẹn</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<h2 class="text-info">Cập nhật lịch hẹn với khách hàng</h2>
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
	<!--ma lich hen--><div class="form-group">
    	<div class="form-group">
        	<label class="col-sm-2 control-label">Mã lịch hẹn</label>
        	<div class="col-sm-7"><input type="text" name="txtmalh" class="form-control" placeholder="Nhập mã" /></div>
    </div>
	<!--ngay--><div class="form-group">
	<label for="lblNgayhen" class="col-sm-2 control-label">Ngày hẹn lịch:  </label>
	<div class="col-sm-7" class="input-group">
			<span class="input-group-btn">
				<select name="slNgayhen" id="slNgayhen" class="form-control" >
	<option value="0">Chọn ngày</option>
<?php
									for($i=1;$i<=31;$i++)
									 {
											 if($i==$ngayhen){
													 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
											 }
											 else{
											 echo "<option value='".$i."'>".$i."</option>";
											 }
									 }
							?>
             </select></span>
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
                </select>
                  </span>
            </div>
        </div>
<!--Trangthai--><div class="form-group">
					<label for="trangthai" class="col-sm-2 control-label">Trạng thái</label>
					<div class="col-sm-7">
					<label class="radio-inline"><input type="radio" value="yes" name="trangthai1"/>Xác nhận
					</label>
                   <label class="radio-inline"><input type="radio" value="no" name="trangthai2"/>Chưa xác nhận
                   </label>
			</div>
		</div>

<div class="form-group">
	<label for="txtmkh" class="col-sm-2 control-label">Mã khách hàng</label>
    <div class="col-sm-7">
    	<textarea cols="5" rows="3" name="txtmkh" class="form-control" placeholder="Nhập mã"></textarea>
    
    </div>

</div>
    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-info" name="btnThemMoi" id="btnThemMoi" value="Cập nhật"/>
                              <input type="button" class="btn btn-info" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="" />

						</div>
					</div>
    
    
    
    	</form>
    </div>
</body>
</html>