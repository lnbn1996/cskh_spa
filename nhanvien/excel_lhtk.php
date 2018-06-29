<?php
require_once '../tainguyen/vendor/PHPExcel/IOFactory.php';
require_once '../tainguyen/vendor/PHPExcel.php';
require_once '../csdl/ketnoi.php';
if(isset($_POST['NgayHen'])){
        $sql="SELECT a.KH_MA, KH_HOTEN, KH_SDT, KH_DIACHI, LH_NGAY, LH_THOIGIAN, LH_CHUDE, LH_NOIDUNG, LH_TRANGTHAI FROM khachhang a, lichhen b WHERE a.KH_MA=b.KH_MA AND ";
        if($_POST['NgayHen']!=""){
            $ngayhen=strtotime($_POST['NgayHen']);
            $ngayhen=date('Y-m-d',$ngayhen);
        }else{$ngayhen="";}
        $trangthai=$_POST['slTThai'];
        if($ngayhen!="" && $trangthai==""){
            $sql.="LH_NGAY='$ngayhen'";
        }elseif ($ngayhen=="" && $trangthai!="") {
            $sql.="LH_TRANGTHAI='$trangthai'";
        }elseif ($ngayhen!="" && $trangthai!="") {
            $sql.="LH_NGAY='$ngayhen' AND LH_TRANGTHAI='$trangthai'";
        }elseif ($ngayhen=="" && $trangthai=="") {
            echo "<script type='text/javascript'>alert('Chọn thông tin cần xuất File!!')</script>";
            echo "<script type='text/javascript'>document.location = '../index.php?key=lhtk';</script>"; 
            die;
        }else{
            echo "<script type='text/javascript'>alert('Có lỗi xảy ra, không xuất file Excel được!')</script>";
            echo "<script type='text/javascript'>document.location = '../index.php?key=lhtk';</script>";        	
        }	
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('DS_LichHen');
	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'Mã khách hàng');
	$sheet->setCellValue('B'.$rowCount,'Tên khách hàng');
	$sheet->setCellValue('C'.$rowCount,'Số Điện Thoại');
	$sheet->setCellValue('D'.$rowCount,'Địa chỉ');
	$sheet->setCellValue('E'.$rowCount,'Ngày hẹn');
	$sheet->setCellValue('F'.$rowCount,'Thời gian');
	$sheet->setCellValue('G'.$rowCount,'Chủ đề');
	$sheet->setCellValue('H'.$rowCount,'Nội dung');
	$sheet->setCellValue('I'.$rowCount,'Trạng thái');
	foreach(range('A','I') as $columnID) {
    	$objExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
	}
	$sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A1:I1')->getFont()->setBold( true );
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$tt=$row['LH_TRANGTHAI'];
		if($tt==0){
			$trangthai="Chưa xác nhận";
		}else if($tt==1){
			$trangthai="Đồng ý";
		}else if($tt==2){
			$trangthai="Huỷ";
		}
		$sheet->setCellValue('A'.$rowCount,$row['KH_MA']);
		$sheet->setCellValue('B'.$rowCount,$row['KH_HOTEN']);
		$sheet->setCellValue('C'.$rowCount,$row['KH_SDT']);
		$sheet->setCellValue('D'.$rowCount,$row['KH_DIACHI']);
		$sheet->setCellValue('E'.$rowCount,date_format(new DateTime($row['LH_NGAY']),'d-m-Y'));
		$sheet->setCellValue('F'.$rowCount,$row['LH_THOIGIAN']);
		$sheet->setCellValue('G'.$rowCount,$row['LH_CHUDE']);
		$sheet->setCellValue('H'.$rowCount,$row['LH_NOIDUNG']);
		$sheet->setCellValue('I'.$rowCount,$trangthai);
	}
	$styleArray = array(
		'font'  => array(
        	'size'  => 12,
        	'name'  => 'Arial'
    	),
		'borders' => array(
			'allborders' => array(
				'style' => PHPExcel_Style_Border::BORDER_THIN
			)
		)
	);
	$sheet->getStyle('A1:'.'I'.($rowCount))->applyFromArray($styleArray);
	$filename = 'ds_lichhen.xlsx';
    header('Content-Encoding: UTF-8');
    header('Content-Type: application/vnd.ms-excel;');
	header("Content-Disposition: attachment;filename=\"$filename\"");
	header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");
	$objWriter = PHPExcel_IOFactory::createWriter($objExcel,"Excel2007");
	ob_end_clean();
	$objWriter->save("php://output");
	// exit;
}
?>