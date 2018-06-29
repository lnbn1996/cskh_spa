<?php
require_once '../tainguyen/vendor/PHPExcel/IOFactory.php';
require_once '../tainguyen/vendor/PHPExcel.php';
require_once '../csdl/ketnoi.php';
if(isset($_POST['NgayBD'])){
	$sql="SELECT e.KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI, a.LT_MA, LT_TEN, b.GD_TEN, GD_NOIDUNG, GD_NGAYBATDAU, GD_NGAYKETTHUC, GD_TRANGTHAI, DV_TEN FROM khachhang e, lieutrinh a, giaidoan b, giaidoan_dichvu c, dichvu d WHERE e.KH_MA=a.KH_MA AND a.LT_MA=b.LT_MA and b.GD_MA=c.GD_MA and c.DV_MA=d.DV_MA AND ";
    if($_POST['NgayBD']!=""){
        $nbd=strtotime($_POST['NgayBD']);
        $ngaybd=date('Y-m-d',$nbd);
    }else{$ngaybd="";}
    if($_POST['NgayKT']!=""){
        $nkt=strtotime($_POST['NgayKT']);
        $ngaykt=date('Y-m-d',$nkt);
    }else{$ngaykt="";}
    $trangthai=$_POST['slTThai'];
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
	foreach(range('A','J') as $columnID) {
    	$objExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
	}
	$sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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
	$styleArray = array(
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A1:'.'J'.($rowCount))->applyFromArray($styleArray);
	$filename = 'ds_thongke.xlsx';
    header('Content-Encoding: UTF-8');
    header('Content-Type: application/vnd.ms-excel;');
	header("Content-Disposition: attachment;filename=\"$filename\"");
	header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");
	$objWriter = PHPExcel_IOFactory::createWriter($objExcel,"Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
	exit;
}
?>