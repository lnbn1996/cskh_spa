function deleteConfirm(){
    if(confirm("Bạn có chắc chắn muốn xóa!")){
        return true;
    }
    else{
        return false;
    }
}
// Check thông tin nhập vào khách hàng / nhân viên
function validateForm(){
	var count=0;
	var form1=name;
	for (var i = 0; i < document.getElementById("form1").elements.length; i++) {
	 	x=document.getElementById("form1").elements[i];
	 	if (x.name=="txtTen" && !/^[a-zA-Z_\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀẾỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,}$/.test(document.form1.txtTen.value)){
	 		alert("Tên không hợp lệ");
	 		return false;
	 	} else if(x.name=="grpGioiTinh"){
	 		count=0;
	 		for (var j = 0; j < document.form1.grpGioiTinh.length; j++) {
				if (document.form1.grpGioiTinh[j].checked==true) break; else count++;
			} 
			if (count==document.form1.grpGioiTinh.length) {
				alert ("Xin chọn giới tính");
				return false;
			}
		} else if(x.name=="slNgaySinh"){
			count=0;
	 		for (var k = 0; k < document.form1.slNgaySinh.length; k++) {
				 if (document.form1.slNgaySinh[k].selected==true && document.form1.slNgaySinh[k].value!=0 )break; else count++;
			}
			if (count==document.form1.slNgaySinh.length) {
				alert ("Xin chọn ngày sinh");
				return false;
			}	
		} else if(x.name=="slThangSinh"){
			count=0;
	 		for (var l = 0; l < document.form1.slThangSinh.length; l++) {
				if (document.form1.slThangSinh[l].selected==true && document.form1.slThangSinh[l].value!=0 ) break; else count++;
			}
			if (count==document.form1.slThangSinh.length) {
				alert ("Xin chọn tháng sinh");
				return false;
			}
		} else if(x.name=="slNamSinh"){
			count=0;
	 		for (var m = 0; m < document.form1.slNamSinh.length; m++) {
				if (document.form1.slNamSinh[m].selected==true && document.form1.slNamSinh[m].value!=0 ) break; else count++;
			}
			if (count==document.form1.slNamSinh.length) {
				alert ("Xin chọn năm sinh");
				return false;
			}
		} else if (x.name=="txtDiaChi" && !/^[a-zA-Z0-9\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]+$/.test(document.form1.txtDienThoai.value)){
			alert ("Địa chỉ không hợp lệ");
			return false;
		} else if (x.name=="txtDienThoai" && !/^[0-9]{10,11}$/.test(document.form1.txtDienThoai.value)){
			alert("Số điện thoại không hợp lệ");
			return false;
		} else if (x.name=="txtEmail" && !/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(document.form1.txtEmail.value)){
			alert("Email không hợp lệ");
			return false;
		}	else if (x.name=="txtLoaiDa" && !/^[a-zA-Z\sÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]*$/.test(document.form1.txtLoaiDa.value)){
			alert("Loại da không hợp lệ");
			return false;
		}	else if (x.name=="txtCanNang" && !/^[0-9]*$/.test(document.form1.txtCanNang.value)){
			alert("Cân nặng không hợp lệ");
			return false;
		} else if (x.name=="txtChieuCao" && !/^[0-9]*$/.test(document.form1.txtChieuCao.value)){
			alert("Chiều cao không hợp lệ");
			return false;
		} else if ((x.name=="txtLoaiDa" || x.name=="txtCanNang" || x.name=="txtChieuCao") && x.value=="") {
			if (x.name=="txtLoaiDa") x.value=" "; else x.value=0;
		}
	}
	document.form1.submit();
}
//Check thay doi mat khau
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('txtMK1');
    var pass2 = document.getElementById('txtMK2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Mật khẩu mới đã khớp!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Mật khẩu mới chưa khớp!"
    }
}
//Check long pass
function checkLongPass()
{
    var pass0 = document.getElementById('txtMK1').value;
    var message1 = document.getElementById('confirmMessage');
    // var badColor = "#ff6666";
    if(pass0.length <= 7 || pass0.length >= 17 ){
    	// message1.style.color = goodColor;
        message1.innerHTML = "Mật khẩu mới phải có độ dài từ 8 - 16 ký tự!"
    }else{
    	message1.innerHTML = "";
    }
}
