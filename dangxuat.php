<?php 
	include_once('csdl/ketnoi.php');
	session_start(); 
	if (isset($_SESSION['tennguoidung'])){
    		unset($_SESSION['tennguoidung']); // xóa session login
    		unset($_SESSION['nv_hoten']);
    		unset($_SESSION['nq_ma']);
    		session_destroy();
	}
	header('Location: dangnhap.php');
?>