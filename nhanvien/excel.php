<meta charset="utf-8" />
<?php
require('../tainguyen/vendor/PHPExcel.php');
require('../csdl/ketnoi.php');

if(isset($_POST['NgayBD'])){
	$sql="SELECT e.KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI, a.LT_MA, LT_TEN, b.GD_TEN, GD_NOIDUNG, GD_NGAYBATDAU, GD_NGAYKETTHUC, GD_TRANGTHAI, DV_TEN FROM khachhang e, lieutrinh a, giaidoan b, giaidoan_dichvu c, dichvu d WHERE e.KH_MA=a.KH_MA AND a.LT_MA=b.LT_MA and b.GD_MA=c.GD_MA and c.DV_MA=d.DV_MA AND ";
	/*Lấy dữ liệu gửi qua*/
    if($_POST['NgayBD']!=""){
        $nbd=strtotime($_POST['NgayBD']);
        $ngaybd=date('Y-m-d',$nbd);
    }else{$ngaybd="";}
    if($_POST['NgayKT']!=""){
        $nkt=strtotime($_POST['NgayKT']);
        $ngaykt=date('Y-m-d',$nkt);
    }else{$ngaykt="";}
    $trangthai=$_POST['slTThai'];
	/*Tạo câu select*/
        if($ngaybd!="" && $ngaykt=="" && $trangthai==""){
            $sql.="GD_NGAYBATDAU='$ngaybd'";
        }elseif ($ngaybd=="" && $ngaykt!="" && $trangthai=="") {
            $sql.="GD_NGAYKETTHUC='$ngaykt'";
        }elseif ($ngaybd=="" && $ngaykt=="" && $trangthai!="") {
            $sql.="GD_TRANGTHAI='$trangthai'";
        }elseif ($ngaybd!="" && $ngaykt!="" && $trangthai=="") {
            $sql.="GD_NGAYBATDAU>='$ngaybd' AND GD_NGAYKETTHUC<='$ngaykt'";
        }elseif ($ngaybd!="" && $ngaykt=="" && $trangthai!="") {
           $sql.="GD_NGAYBATDAU='$ngaybd' AND GD_TRANGTHAI='$trangthai'";
        }elseif ($ngaybd=="" && $ngaykt!="" && $trangthai!="") {
            $sql.="GD_NGAYKETTHUC='$ngaykt' AND GD_TRANGTHAI='$trangthai' ";
        }elseif ($ngaybd!="" && $ngaykt!="" && $trangthai!="") {
            $sql.="GD_NGAYBATDAU='$ngaybd' AND GD_NGAYKETTHUC='$ngaykt' AND GD_TRANGTHAI='$trangthai'";
        }
        elseif ($ngaybd=="" && $ngaykt=="" && $trangthai=="") {
             echo "<script type='text/javascript'>alert('Chọn thông tin cần xuất File!!')</script>";
            echo "<script type='text/javascript'>document.location = '../index.php?key=lttk';</script>"; 
        }else{
            echo "<script type='text/javascript'>alert('Có lỗi xảy ra, không xuất file Excel được!')</script>";
            echo "<script type='text/javascript'>document.location = '../index.php?key=lttk';</script>";        	
        }	
	//========================= Xuất File Excel=====================//
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('DS_ThongKe');

	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'Mã khách hàng');
	$sheet->setCellValue('B'.$rowCount,'Tên khách hàng');
	$sheet->setCellValue('C'.$rowCount,'Số Điện Thoại');
	$sheet->setCellValue('D'.$rowCount,'Mã Liệu Trình');
	$sheet->setCellValue('E'.$rowCount,'Tên Liệu Trình');
	$sheet->setCellValue('F'.$rowCount,'Tên Giai Đoạn');
	$sheet->setCellValue('G'.$rowCount,'Dịch vụ');
	$sheet->setCellValue('H'.$rowCount,'Ngày Bắt Đầu');
	$sheet->setCellValue('I'.$rowCount,'Ngày Kết Thúc');
	$sheet->setCellValue('J'.$rowCount,'Trạng Thái');

	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$sheet->setCellValue('A'.$rowCount,$row['KH_MA']);
		$sheet->setCellValue('B'.$rowCount,$row['KH_HOTEN']);
		$sheet->setCellValue('C'.$rowCount,$row['KH_SDT']);
		$sheet->setCellValue('D'.$rowCount,$row['LT_MA']);
		$sheet->setCellValue('E'.$rowCount,$row['LT_TEN']);
		$sheet->setCellValue('F'.$rowCount,$row['GD_TEN']);
		$sheet->setCellValue('G'.$rowCount,$row['DV_TEN']);
		$sheet->setCellValue('H'.$rowCount,$row['GD_NGAYBATDAU']);
		$sheet->setCellValue('I'.$rowCount,$row['GD_NGAYKETTHUC']);
		$sheet->setCellValue('J'.$rowCount,$row['GD_TRANGTHAI']);
	}

	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename = 'ds_thongke.xlsx';
	$objWriter->save($filename);

	header('Content-Disposition: attachment; filename="' . $filename . '"');  
	// header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
	header("Content-type: application/octet-stream"); 
	header('Content-Length: ' . filesize($filename));  
	header('Content-Transfer-Encoding: binary');  
	header('Cache-Control: must-revalidate');  
	header('Pragma: no-cache');

	readfile($filename);  
	return;
}

?>