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
							      <input type="text" name="MaLT" id="MaLT" class="form-control" placeholder="Mã" value='<?php echo $row['LT_MA']; ?>' disabled />
							</div>
                            <label for="TenLT" class="col-sm-2 control-label">Tên liệu trình: </label>
							<div class="col-sm-3">
								<input type="text" name="TenLT" id="TenLT" value="<?php echo $row['LT_TEN']; ?>" class="form-control" placeholder="Tên liệu trinh"/>	     
							</div>
                          
					</div>
            


					<div class="form-group">
						<label for="txtTen" class="col-sm-2 control-label">Tên khách hàng  </label>
						<div class="col-sm-4">
						<input type="text" name="txtTen" id="txtTen" value="<?php echo $row['KH_HOTEN']; ?>" class="form-control" placeholder="Tên khách hàng" disabled />
						</div>
                     	<label for="ltMoTa" class="col-sm-2 control-label"> Mô tả:  </label>
						 <div class="col-sm-3">
							 <input type="text" name="ltMoTa" id="ltMoTa" value="<?php echo $row['LT_MOTA']; ?>" class="form-control" placeholder="Mô tả liệu trình" />
						 </div> 
					</div>
					
<!-- dien thoai -->
				<div class="form-group">
						<label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại:  </label>
						<div class="col-sm-4">
						<input type="text" name="txtDienThoai" id="txtDienThoai" value="<?php echo $row['KH_SDT']; ?>" class="form-control" placeholder="Điện thoại" disabled />
						</div>
                        
                        <label for="NDLieuTrinh" class="col-sm-2 control-label">Nội dung liệu trình:  </label>
							<div class="col-sm-3">
								<!-- <textarea class="form-control" rows="2"  id="txtNoiDung" name="txtNoiDung" style="text-align:left">
                                <?php //echo $row['LT_NOIDUNG']; ?>                        
                                </textarea> -->
                                <input type="text" class="form-control"  id="txtNoiDung" name="txtNoiDung" value="<?php echo $row['LT_NOIDUNG']; ?>" />
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
<form id="fTTGiaiDoan" name="fTTGiaiDoan" method="post" action="" class="form-horizontal" role="form">
    <table id="tablespa" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th><strong>Tên giai đoạn</strong></th>
                <th><strong>ND giai đoạn</strong></th>
                <th><strong>Dịch vụ</strong></th>
                <th><strong>Ngày bắt đầu</strong></th>
                <th><strong>Ngày Kết Thúc </strong></th>
                <th><strong>Trạng thái</strong></th>
                <th><strong>Cập nhật</strong></th>
                <th><strong>Xóa</strong></th>
            </tr>
        </thead>

		<tbody>
            <tr> 	
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td><?php  ?></td>
                <td align='center' class='cotNutChucNang'>
                    <a href="">
                        <img src='tainguyen/hinhanh/edit.png' border='0'/>
                    </a>
                </td>
                <td align='center' class='cotNutChucNang'>
                  	<a onclick="return deleteConfirm()" href="">
                       	<img src='tainguyen/hinhanh/delete.png' border='0' />
                    </a>
                </td>
            </tr>
		</tbody>
    </table>
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
            <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="txtTen" class="col-sm-3 control-label">Tên khách hàng:  </label>
                    <div class="col-sm-8">
                        <input type="hidden" name="makh" value="<?php echo $row['KH_MA']; ?>">
                        <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên khách hàng" value="<?php echo $row['KH_HOTEN']; ?>" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="TenLT" class="col-sm-3 control-label">Tên liệu trình:  </label>
                    <div class="col-sm-8">
                        <input type="hidden" name="malt" value="<?php echo $row['LT_MA']; ?>">
                        <input type="text" name="TenLT" id="TenLT" value="<?php echo $row['LT_TEN']; ?>" class="form-control" placeholder="Tên liệu trình" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label for="GiaiDoanTen" class="col-sm-3 control-label">Tên Giai đoạn:  </label>
                        <div class="col-sm-8">
                            <input type="text" name="GiaiDoanTen" id="GiaiDoanTen" value="" class="form-control" placeholder="Giai đoạn" required=""/>
                        </div>
                </div>
                <div class="form-group dichvu">     
                    <label for="sell" class="col-sm-3 control-label">Tên Dịch vụ:  </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="slDichVu[]" id="slDichVu[]" required="">
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
                         <button class="btn btn-success add-more" type="button">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                </div>
                <div class="dichvu-more hide">
                    <div class="form-group"> 
                        <label for="sell" class="col-sm-3 control-label"></label>    
                        <div class="col-sm-6">
                            <select class="form-control" id="slDichVu[]" id="slDichVu[]" required="">
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
                            <button class="btn btn-danger remove" type="button">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
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
<script>
    /* reset modal when closed */
    $('#modalThemMoiGD').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    function CapNhatLT(a) {
        var lt_ma = a.id;
        var lt_ten = $("#TenLT").val();
        var lt_mota = $("#ltMoTa").val();
        var lt_nd = $("#txtNoiDung").val();
        console.log(lt_ma);
        console.log(lt_ten);
        console.log(lt_mota);
        console.log(lt_nd);
        $.ajax({
            url: 'index.php?key=ltct&ma=LT01',
            type: "post",
            data: {"lt_ma":lt_ma,"lt_ten":lt_ten,"lt_mota":lt_mota,"lt_nd":lt_nd},
            success: function(response) {   
                location.reload();
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