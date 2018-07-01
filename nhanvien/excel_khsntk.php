<?php
require_once '../tainguyen/vendor/PHPExcel/IOFactory.php';
require_once '../tainguyen/vendor/PHPExcel.php';
require_once '../csdl/ketnoi.php';
    if(isset($_GET['slNgaySinh']) OR isset($_GET['slThangSinh']) OR isset($_GET['slNamSinh']) ){     
        $sql="SELECT * FROM Khachhang WHERE KH_TRANGTHAI=1 AND ";
        $ngay=$_GET['slNgaySinh'];
        $thang=$_GET['slThangSinh'];
        $nam=$_GET['slNamSinh'];
        if($ngay!="" && $thang=="" && $nam==""){
            $sql.="KH_NGAYSINH='$ngay'";
        }elseif ($ngay=="" && $thang!="" && $nam=="") {
            $sql.="KH_THANGSINH='$thang'";
        }elseif ($ngay=="" && $thang=="" && $nam!="") {
            $sql.="KH_NAMSINH='$nam'";
        }elseif ($ngay!="" && $thang!="" && $nam=="") {
            $sql.="KH_NGAYSINH='$ngay' AND KH_THANGSINH='$thang' ";
        }elseif ($ngay!="" && $thang=="" && $nam!="") {
           $sql.="KH_NGAYSINH='$ngay' AND KH_NAMSINH='$nam' ";
        }elseif ($ngay=="" && $thang!="" && $nam!="") {
           $sql.="KH_THANGSINH='$thang' AND KH_NAMSINH='$nam' "; 
        }elseif ($ngay!="" && $thang!="" && $nam!="") {
            $sql.="KH_NGAYSINH='$ngay' AND KH_THANGSINH='$thang' AND KH_NAMSINH='$nam'";
        }
        elseif ($ngay=="" && $thang=="" && $nam=="") {
            echo "<script type='text/javascript'>alert('Chọn thông tin cần xuất File!!')</script>";
            // echo "<script type='text/javascript'>document.location = '../index.php?key=lhtk';</script>"; 
            die;
        }else{
            echo "<script type='text/javascript'>alert('Có lỗi xảy ra, không xuất file Excel được!')</script>";
            // echo "<script type='text/javascript'>document.location = '../index.php?key=lhtk';</script>";        	
        }
	$objExcel = new PHPExcel;
	$objExcel->setActiveSheetIndex(0);
	$sheet = $objExcel->getActiveSheet()->setTitle('DS_KhachHangSinhNhat');
	$rowCount = 1;
	$sheet->setCellValue('A'.$rowCount,'Mã khách hàng');
	$sheet->setCellValue('B'.$rowCount,'Tên khách hàng');
	$sheet->setCellValue('C'.$rowCount,'Giới tính');
	$sheet->setCellValue('D'.$rowCount,'Ngày sinh');
	$sheet->setCellValue('E'.$rowCount,'Số điện thoại');
	$sheet->setCellValue('F'.$rowCount,'Địa chỉ');
	$sheet->setCellValue('G'.$rowCount,'Email');
	foreach(range('A','G') as $columnID) {
    	$objExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
	}
	$sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$sheet->getStyle('A1:G1')->getFont()->setBold( true );
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_array($result)){
		$rowCount++;
		$ngaysinh=$row["KH_NGAYSINH"]."/".$row["KH_THANGSINH"]."/".$row["KH_NAMSINH"];
		$sheet->setCellValue('A'.$rowCount,$row['KH_MA']);
		$sheet->setCellValue('B'.$rowCount,$row['KH_HOTEN']);
		$sheet->setCellValue('C'.$rowCount,$row['KH_GIOITINH']);
		$sheet->setCellValue('D'.$rowCount,$ngaysinh);
		$sheet->setCellValue('E'.$rowCount,$row['KH_SDT']);
		$sheet->setCellValue('F'.$rowCount,$row['KH_DIACHI']);
		$sheet->setCellValue('G'.$rowCount,$row['KH_EMAIL']);
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
	$sheet->getStyle('A1:'.'G'.($rowCount))->applyFromArray($styleArray);
	$filename = 'ds_khachhang_thongke.xlsx';
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