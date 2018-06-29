<script src="tainguyen/js/jquery.dataTables.min.js"></script>
<script src="tainguyen/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script>
      $(document).ready(function() {
          var table = $('#tablespaGD').DataTable( {
          responsive: true,
          "language": {
            "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang:",
            "info": "Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu:",
            "infoEmpty": "Dữ liệu rỗng",
            "emptyTable": "Chưa có dữ liệu nào ",
            "processing": "Đang xử lý ",
            "search": "Tìm kiếm: ",
            "loadingRecords": "Đang load dữ liệu",
            "zeroRecords": "Không tìm thấy dữ liệu",
            "infoFiltered": "(Được từ tổng số _MAX_ dòng dữ liệu",
            "paginate": {
              "first": "|<",
              "last": ">|",
              "next": ">>",
              "previous": "<<"
            }
          },
          "pageLength" : -1,
          "lengthMenu": [[5,10,15,20,25,-1],[5,10,15,20,25,"Tất cả"]]
            });
          new $.fn.dataTable.FixedHeader( table );
      });  
</script>
<?php
    include_once("csdl/ketnoi.php");
?> 
<h2 class="h2-lt">Thông tin chi tiết liệu trình </h2>
<hr />
<div class="ttlt">
    <!-- thêm giá trị php sẵn có từ csdl vào ô <value> để cập nhật -->
<form id="fTTLieuTrinh" name="fTTLieuTrinh" method="post" action="" class="form-horizontal" role="form">
<!-- ma lt-->
<?php
    include("csdl/ketnoi.php");
    if(isset($_GET["ma"])){
        $ma=$_GET["ma"];
        $result = mysqli_query($conn, "SELECT LT_MA, LT_TEN, LT_MOTA, LT_NOIDUNG, LT_GIA, LT_NGAYTAO, LT_NGAYCAPNHAT, LT_TRANGTHAI, a.KH_MA, KH_HOTEN, KH_SDT, LT_LOAI FROM LIEUTRINH as a, KHACHHANG as b WHERE a.KH_MA=b.KH_MA AND LT_MA='$ma'");
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
?>
					<div class="form-group">
						    <label for="MaLT" class="col-sm-2 control-label">Mã liệu trình:  </label>
							<div class="col-sm-4">
							      <input type="text" name="MaLT" id="MaLT" class="form-control" placeholder="Mã" value='<?php echo $row['LT_MA']; ?>' readonly="readonly" />
							</div>
                            <label for="TenLT" class="col-sm-2 control-label">Tên liệu trình: </label>
							<div class="col-sm-4">
								<input type="text" name="TenLT" id="TenLT" value="<?php echo $row['LT_TEN']; ?>" class="form-control" placeholder="Tên liệu trinh"/>	     
							</div>
                          
					</div>
            


					<div class="form-group">
						<label for="txtTen" class="col-sm-2 control-label">Tên khách hàng  </label>
						<div class="col-sm-4">
						<input type="text" name="txtTen" id="txtTen" value="<?php echo $row['KH_HOTEN']; ?>" class="form-control" placeholder="Tên khách hàng" readonly="readonly" />
						</div>
                     	<label for="ltMoTa" class="col-sm-2 control-label"> Mô tả:  </label>
						 <div class="col-sm-4">
							 <input type="text" name="ltMoTa" id="ltMoTa" value="<?php echo $row['LT_MOTA']; ?>" class="form-control" placeholder="Mô tả liệu trình" />
						 </div> 
					</div>
					
<!-- dien thoai -->
				<div class="form-group">
						<label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
						<div class="col-sm-4">
						<input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php echo $row['KH_SDT']; ?>" class="form-control" placeholder="Điện thoại" readonly="readonly" />
						</div>
                        
                        <label for="NDLieuTrinh" class="col-sm-2 control-label">Nội dung liệu trình:  </label>
							<div class="col-sm-4">
								<textarea class="form-control" rows="5"  id="txtNoiDung" name="txtNoiDung"><?php echo $row['LT_NOIDUNG']; ?></textarea>
							</div>
				</div>
                <div class="form-group">
                    <div class="col-lg-4 pull right">
                        <a id="<?php echo $row['LT_MA']; ?>" onClick="CapNhatLT(this);">
                            <input name="btnCapNhatLT" value="Cập nhật cơ bản" id="btnCapNhatLT" class="btn btn-primary" />
                        </a>
                    </div>   
                </div>
			</form>
	</div>
<p>
   	<a href="#modalThemMoiGD" data-target="#modalThemMoiGD" data-toggle="modal"><img src="tainguyen/hinhanh/add.png" width="16" height="16" border="0" /> Thêm mới giai đoạn</a>
</p>
<form id="fTTGiaiDoan" name="fTTGiaiDoan" method="post" action="nhanvien/xuly_ltct.php" class="form-horizontal" role="form">
    <table id="tablespaGD" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>Chọn</strong></th>
                <th><strong>Mã giai đoạn</strong></th>
                <th><strong>Tên giai đoạn</strong></th>
                <th><strong>Nội dung giai đoạn</strong></th>
                <th><strong>Dịch vụ</strong></th>
                <th><strong>Giá dịch vụ (VND)</strong></th>
                <th><strong>Ngày bắt đầu</strong></th>
                <th><strong>Ngày Kết Thúc </strong></th>
                <th><strong>Trạng thái</strong></th>
                <th><strong>Cập nhật</strong></th>
                <th><strong>Xóa</strong></th>
            </tr>
        </thead>

		<tbody>
        <?php
            $query=mysqli_query($conn,"SELECT a.GD_MA, GD_TEN, GD_NOIDUNG, GD_NGAYBATDAU, GD_NGAYKETTHUC, GD_TRANGTHAI, DV_TEN, DV_GIATIEN, LT_MA FROM GIAIDOAN a, GIAIDOAN_DICHVU c, DICHVU b WHERE a.GD_MA=c.GD_MA AND b.DV_MA=c.DV_MA AND LT_MA='$ma' AND GD_TRANGTHAI!=0 ");
            while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                {
        ?>
            <tr>
                <input type="hidden" name="lt_ma" value="<?php echo $row['LT_MA']; ?>" />
                <td class="cotCheckBox"><center><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['GD_MA']; ?>"  /></center></td>
                <td><center><?php echo $row['GD_MA']; ?></center></td> 	
                <td><?php echo $row['GD_TEN'];  ?></td>
                <td><?php echo $row['GD_NOIDUNG']; ?></td>
                <td><?php echo $row['DV_TEN']; ?></td>
                <td><?php echo number_format($row['DV_GIATIEN']); ?></td>
                <td><?php echo date_format(new DateTime($row['GD_NGAYBATDAU']), 'd-m-Y'); ?></td>
                <td><?php echo date_format(new DateTime($row['GD_NGAYKETTHUC']), 'd-m-Y'); ?></td>
                <td>
                    <?php
                        if($row['GD_TRANGTHAI']==1){
                            echo "Chưa thực hiện";
                        }elseif($row['GD_TRANGTHAI']==2){
                            echo "Đang thực hiện";
                        }elseif($row['GD_TRANGTHAI']==3){
                            echo "Đã thực hiện";
                        }
                    ?>    
                </td>
                <td align='center' class='cotNutChucNang'>
                    <a href="#modalCapNhatGD" data-target="#modalCapNhatGD" data-toggle="modal" id="<?php echo $row['GD_MA']; ?>" onClick="CapNhatGD(this);">
                        <img src='tainguyen/hinhanh/edit.png' border='0'/>
                    </a>
                </td>
                <td align='center' class='cotNutChucNang'>
                  	<a id="<?php echo $row['GD_MA']; ?>" onClick="deleteConfirm(); xoaGiaiDoan(this);">
                       	<img src='tainguyen/hinhanh/delete.png' border='0' />
                    </a>
                </td>
            </tr>
        <?php
                }
        ?>
		</tbody>
    </table>
<!-- Nút xoá tất cả giai đoạn -->
    <div class="row" style="background-color:#FFF">
        <div class="col-md-12">
            <input name="btnXoa" type="submit" value="Xóa mục chọn" id="btnXoa" onClick='return deleteConfirm()' class="btn btn-primary" />
        </div>
    </div> 
</form>  
<!-- Modal Thêm Mới Giai Đoạn -->
<div class="modal fade" id="modalThemMoiGD" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: white;">
        <?php
            if(isset($_GET["ma"])){
                $ma=$_GET["ma"];
                $result = mysqli_query($conn, "SELECT LT_MA, LT_TEN, a.KH_MA, KH_HOTEN, KH_SDT FROM LIEUTRINH as a, KHACHHANG as b WHERE a.KH_MA=b.KH_MA AND LT_MA='$ma'");
                $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
            }            
        ?>
            <h2 class="h2-dv">Thêm mới liệu trình </h2>
            <hr />
            <form name="fThemMoiGD" id="fThemMoiGD"  method="post" action="nhanvien/xuly_ltct.php" class="form-horizontal" role="form">
                <input type="hidden" name="makh" value="<?php echo $row['KH_MA']; ?>">
                <div class="form-group">
                    <label for="TenKHThemMoi" class="col-sm-3 control-label">Tên khách hàng:  </label>
                    <div class="col-sm-8">

                        <input type="text" name="TenKHThemMoi" id="TenKHThemMoi" class="form-control" value="<?php echo $row['KH_HOTEN']; ?>" readonly="readonly" />
                    </div>
                </div>
                <input type="hidden" name="malt" value="<?php echo $row['LT_MA']; ?>">
                <div class="form-group">
                    <label for="TenLTThemMoi" class="col-sm-3 control-label">Tên liệu trình:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="TenLTThemMoi" id="TenLTThemMoi" value="<?php echo $row['LT_TEN']; ?>" class="form-control"  readonly="readonly" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="GiaiDoanTen" class="col-sm-3 control-label">Tên giai đoạn:  </label>
                        <div class="col-sm-8">
                            <input type="text" name="GiaiDoanTen" id="GiaiDoanTen" value="" class="form-control" placeholder="Giai đoạn" required=""/>
                        </div>
                </div>
                <div class="form-group">
                    <label for="GiaiDoanTen" class="col-sm-3 control-label">Nội dung giai đoạn:  </label>
                        <div class="col-sm-8">
                            <textarea name="GiaiDoanND" id="GiaiDoanND" class="form-control" placeholder="Giai đoạn"></textarea>
                        </div>
                </div>
                <div class="form-group dichvu">     
                    <label for="sell" class="col-sm-3 control-label">Tên Dịch vụ:  </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="slDichVu[]" name="slDichVu[]" required="">
                            <option value="" class="col-sm-6"> Chọn dịch vụ </option>
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM DICHVU");
                                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                            ?>                       
                            <option value="<?php echo $row['DV_MA'];?>" class="col-sm-6"><?php echo $row['DV_TEN'];?></option>
                            <?php 
                                } 
                            ?>
                        </select>
                    </div>
                    <div>
                         <a class="add-more">
                            <img src="tainguyen/hinhanh/plus-green.png" />
                        </a>
                    </div>
                </div>
                <div class="dichvu-more hide">
                    <div class="form-group"> 
                        <label for="sell" class="col-sm-3 control-label"></label>    
                        <div class="col-sm-6">
                            <select class="form-control" id="slDichVu[]" name="slDichVu[]">
                                <option value="" class="col-sm-6"> Chọn dịch vụ </option>
                                <?php
                                    $query=mysqli_query($conn,"SELECT * FROM DICHVU");
                                    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                    {
                                ?>                       
                                <option value="<?php echo $row['DV_MA'];?>" class="col-sm-6"><?php echo $row['DV_TEN'];?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </div>
                        <div> 
                            <a class="remove">
                                <img src="tainguyen/hinhanh/negative.png" />
                            </a>
                        </div>
                    </div>
                </div>              
                <div class="form-group">
                    <label for="NgayBD" class="col-sm-3 control-label">Ngày bắt đầu:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="NgayBD" id="NgayBD" class="form-control" placeholder="dd-mm-yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="">
                    </div>
                </div>
                <div class="form-group">                           
                    <label for="NgayKT" class="col-sm-3 control-label">Ngày kết thúc:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="NgayKT" id="NgayKT" class="form-control" placeholder="dd-mm-yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                        <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Thêm Mới -->
<!-- Modal Cập nhật giai đoạn -->
<div class="modal fade" id="modalCapNhatGD" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: white;">
        <?php
            if(isset($_GET["ma"])){
                $ma=$_GET["ma"];
                $re= mysqli_query($conn, "SELECT LT_MA, LT_TEN, a.KH_MA, KH_HOTEN, KH_SDT FROM LIEUTRINH as a, KHACHHANG as b WHERE a.KH_MA=b.KH_MA AND LT_MA='$ma'");
                $ro=mysqli_fetch_array($re, MYSQLI_ASSOC);
            }            
        ?>
            <h2 class="h2-dv">Cập nhậnt giai đoạn </h2>
            <hr />
            <form name="fCapNhatGD" id="fCapNhatGD"  method="post" action="nhanvien/xuly_ltct.php" class="form-horizontal" role="form">
                <input type="hidden" name="makh" value="<?php echo $ro['KH_MA']; ?>">
                <div class="form-group">
                    <label for="TenKHCN" class="col-sm-3 control-label">Tên khách hàng:  </label>
                    <div class="col-sm-8">

                        <input type="text" name="TenKHCN" id="TenKHCN" class="form-control" value="<?php echo $ro['KH_HOTEN']; ?>" readonly="readonly" />
                    </div>
                </div>
                <input type="hidden" name="malt" value="<?php echo $ro['LT_MA']; ?>">
                <div class="form-group">
                    <label for="TenLTCN" class="col-sm-3 control-label">Tên liệu trình:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="TenLTCN" id="TenLTCN" value="<?php echo $ro['LT_TEN']; ?>" class="form-control"  readonly="readonly" />
                    </div>
                </div>
                <input type="hidden" name="magd" id="magd" value="" />
                <div class="form-group">
                    <label for="GiaiDoanTen" class="col-sm-3 control-label">Tên giai đoạn:  </label>
                        <div class="col-sm-8">
                            <input type="text" name="GiaiDoanTenCN" id="GiaiDoanTenCN" value="" class="form-control" placeholder="Giai đoạn" value="" required=""/>
                        </div>
                </div>
                <div class="form-group">
                    <label for="GiaiDoanTen" class="col-sm-3 control-label">Nội dung giai đoạn:  </label>
                        <div class="col-sm-8">
                            <textarea name="GiaiDoanNDCN" id="GiaiDoanNDCN" class="form-control" placeholder="Giai đoạn" value="" required="">
                            </textarea>
                        </div>
                </div>
                <div class="form-group">     
                    <label for="sell" class="col-sm-3 control-label">Tên Dịch vụ:  </label>
                    <div class="col-sm-8">
                        <select class="form-control" id="slDichVuCN" name="slDichVuCN">
                            <option value="" class="col-sm-8"> Chọn dịch vụ </option>
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM DICHVU");
                                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                            ?>                       
                            <option value="<?php echo $row['DV_MA'];?>" class="col-sm-8"><?php echo $row['DV_TEN'];?></option>
                            <?php 
                                } 
                            ?>
                                                        <option value="10" class="col-sm-8">Hihihihi</option>
                        </select>
                    </div>
                </div>             
                <div class="form-group">
                    <label for="NgayBD" class="col-sm-3 control-label">Ngày bắt đầu:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="NgayBDCN" id="NgayBDCN" class="form-control" value="" placeholder="dd-mm-yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="">
                    </div>
                </div>
                <div class="form-group">                           
                    <label for="NgayKT" class="col-sm-3 control-label">Ngày kết thúc:  </label>
                    <div class="col-sm-8">
                        <input type="text" name="NgayKTCN" id="NgayKTCN" class="form-control" value="" placeholder="dd-mm-yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required="">
                    </div>
                </div>
                <!-- Xác nhận -->
                <div class="form-group">
                    <label class="col-sm-3 control-label">Trạng thái:  </label>
                    <div class="col-sm-8">
                        <label class="radio-inline for="rdTrangThai1">
                            <input type="radio" id="rdTrangThai1" name="rdTrangThai" value="1" />Chưa thực hiện
                        </label>
                        <label class="radio-inline for="rdTrangThai2">
                            <input type="radio" id="rdTrangThai2" name="rdTrangThai" value="2"/>Đang thực hiện
                        </label>
                        <label class="radio-inline for="rdTrangThai3">
                            <input type="radio" id="rdTrangThai3" name="rdTrangThai" value="3" />Hoàn thành
                        </label>
                        <label class="radio-inline for="rdTrangThai4">
                            <input type="radio" id="rdTrangThai4" name="rdTrangThai" value="4" />Huỷ
                        </label>
                    </div>
                </div>
                <!-- Nút chức năng -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <input type="submit"  class="btn btn-primary" name="btnCapNhatGD" id="btnCapNhatGD" value="Thêm mới"/>
                        <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Cập nhật giai đoạn -->
<script>
    /* reset modal when closed */
    /*Xoá giai đoạn*/
    function xoaGiaiDoan(a) {
        var gd_ma = a.id;
        $.ajax({
            url: 'nhanvien/xuly_ltct.php',
            type: "get",
            data: 'ma=' + gd_ma,
            success: function() {   
                location.reload();
            }
        });
    };
    /*Cập nhật thông tin liệu trình*/
    function CapNhatLT(a) {
        var lt_ma = a.id;
        var lt_ten = $("#TenLT").val();
        var lt_mota = $("#ltMoTa").val();
        var lt_nd = $("#txtNoiDung").val();
        $.ajax({
            url: 'index.php?key=ltct&ma=LT01',
            type: "post",
            data: {"lt_ma":lt_ma,"lt_ten":lt_ten,"lt_mota":lt_mota,"lt_nd":lt_nd},
            success: function(response) {   
                location.reload();
            }
        });
    };
    /*Cập nhật thông tin giai đoạn*/
    function CapNhatGD(a) {
        var gd_ma = a.id;
        $.ajax({
            url: 'nhanvien/xuly_ltct.php',
            type: "get",
            data: {"gd_ma":gd_ma},
            success: function(response) {   
                console.log(response);
                var obj = JSON.parse(response);
                if(obj.gd_trangthai == 1){
                    $('#fCapNhatGD').find(':radio[name=rdTrangThai][value="1"]').prop('checked', true);
                }else if(obj.gd_trangthai == 2){
                    $('#fCapNhatGD').find(':radio[name=rdTrangThai][value="2"]').prop('checked', true);
                }else if(obj.gd_trangthai == 3){
                    $('#fCapNhatGD').find(':radio[name=rdTrangThai][value="3"]').prop('checked', true);
                }else if(obj.gd_trangthai == 4){
                    $('#fCapNhatGD').find(':radio[name=rdTrangThai][value="4"]').prop('checked', true);
                }
                $("#slDichVuCN").val(obj.dv_ma).attr("selected","true");
                $("#GiaiDoanTenCN").val(obj.gd_ten);
                $("#GiaiDoanNDCN").val(obj.gd_noidung);
                $("#NgayBDCN").val(obj.gd_ngaybatdau);
                $("#NgayKTCN").val(obj.gd_ngayketthuc);
                $("#magd").val(obj.gd_ma);
            }
        });
    };
</script>
<script type="text/javascript">
 
    $(document).ready(function() {
    //here first get the contents of the div with name class dichvu-more and add it to after "dichvu" div class.
      $(".add-more").click(function(){ 
          var html = $(".dichvu-more").html();
          $(".dichvu").after(html);
      });
    //here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".form-group").remove();
      });
 
    });
 
</script>
<!-- Xử lý php nhỏ -->
<?php
    if(isset($_POST['lt_ma']))
        {
            $lt_ma = $_POST['lt_ma'];
            $lt_ten = $_POST['lt_ten'];
            $lt_mota = $_POST['lt_mota'];
            $lt_nd = $_POST['lt_nd'];
            mysqli_query($conn, "UPDATE `LIEUTRINH` SET LT_TEN='$lt_ten', LT_MOTA='$lt_mota', LT_NOIDUNG='$lt_nd' WHERE lt_ma='$lt_ma'");
        }
?>