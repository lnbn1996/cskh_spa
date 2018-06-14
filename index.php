<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="tainguyen/css/css.css" />
<link rel="stylesheet" href="tainguyen/css/bootstrap.min.css">
<title>Trang chủ quản trị </title>
</head>

<body>

<div class="header" >
	 < ?php
			include('include/menu.php');
		? >
  </div>

<div class="content" >
		<div class="index-lh" >
        	<h2>Lịch hẹn (mới) </h2>
            <hr class="hr-content" />
        	<div> nội dung ... </div>
            <div class="xemthem" >
            	<a href="##"> << xem thêm >>  </a>
             </div>
        </div>
        <div class="index-tk" >
        	<h2 > Tìm kiếm </h2>
            <hr  class="hr-content" />

            <div class="tk-lieutrinh" >
            	<div class="tt-lt-kh"> Thông tin liệu trình </div>
            	<form name="tk-lieutrinh" action="#" method="post" class="form-horizontal" >
                	<div class="form-group">
						    <label for="txtLTma" class="col-sm-3 control-label"> Nhập mã:  </label>
							<div class="col-sm-9">
    						      <input type="text" name="lt-ma" id="lt-ma" class="form-control" placeholder="Mã liệu trình" value=''>
							</div>
					</div>
                		<div class="form-group">
						<div class="col-sm-offset-9 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnTimkiem" id="btnTimKiem" value="Tìm kiếm"/>

						</div>
					</div>
                </form>
            </div>
            <hr />
            <div class="tk-khachhang" >
            	<div class="tt-lt-kh"> Thông tin khách hàng </div>
                <form name="tk-kh" action="#" method="post" class="form-horizontal" >
                	<div class="form-group">
						    <label for="txtKHma" class="col-sm-3 control-label"> Nhập mã:  </label>
							<div class="col-sm-9">
    						      <input type="text" name="kh-ma" id="kh-ma" class="form-control" placeholder="Mã khách hàng" value=''>
							</div>
					</div>
                		<div class="form-group">
						<div class="col-sm-offset-9 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnTimkiem" id="btnTimKiem" value="Tìm kiếm"/>

						</div>
					</div>
                </form>

        </div>
        </div>
        <div class="index-gy" >
        	<h2>Góp ý (mới)</h2>
            <hr  class="hr-content" />
            <div> nội dung ... </div>
            <div class="xemthem" >
            	<a href="##"> << xem thêm >>  </a>
             </div>
        </div>
</div>

<div class="footer" >
	< ?php
			include('include/footer.php');
		? >

  </div>


</body>
</html>
