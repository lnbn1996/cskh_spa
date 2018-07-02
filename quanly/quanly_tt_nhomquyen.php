<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.7.0/angular.js"></script>
<h2 class="h2-quyen">Quản lý thông tin nhóm quyền </h2>
<hr />
<div class="col-sm-12" style="margin-bottom: 1%;">
<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">  
    <div class="btm-group">
        <div class="col-sm-6">
        <a href="#modalThemMoi" data-target="#modalThemMoi" data-toggle="modal"><input type="submit" class="btn btn-info btn-sm" name="btnThemMoiNQ" id="btnThemMoiNQ" value="Thêm nhóm quyền"/></a>
        <a href="#modalThemVaiTro" data-target="#modalThemVaiTro" data-toggle="modal"><input type="submit" class="btn btn-info btn-sm" name="btnThemMoiVT" id="btnThemMoiVT" value="Thêm vai trò cho nhóm quyền"/></a>    
        </div>
    </div>  
</form>
</div>
<!-- Thông tin -->
<?php
    $sql="SELECT nq_ma, nq_ten FROM nhomquyen";
    $query=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
        $nq_ma=$row['nq_ma'];
?>
<div class="list-group">
    <div class="col-sm-4"  style="margin-bottom: 1%;">
        <ul class="list-group">
  		<li class="list-group-item list-group-item-action list-group-item-info">
            <?php echo "Nhóm ".$row['nq_ten'];?>
            <a id="<?php echo $nq_ma ?>" onClick="deleteConfirm(); xoaNhomQuyen(this);"><img align="right" src="tainguyen/hinhanh/remove.png" /></a>  
        </li>

  		<?php
            $s="SELECT c.nqct_ma, nqct_ten FROM nhomquyen as a, nhomquyenchitiet as b, nq_nqct as c WHERE a.nq_ma=c.nq_ma AND b.nqct_ma=c.nqct_ma AND c.nq_ma='$nq_ma'";
            $q=mysqli_query($conn,$s);
            while($r=mysqli_fetch_array($q,MYSQLI_ASSOC))
            {
        ?>
            <li class="list-group-item">
            <?php echo $r['nqct_ten'];?>
            <a href="quanly/xuly_ttnq.php?nq=<?php echo $nq_ma;?>&nqct=<?php echo $r['nqct_ma'];?>" onClick="return deleteConfirm();"><img src="tainguyen/hinhanh/remove.png" align="right"/>
            </a>
            </li>
        <?php
            }
        ?>
        </ul>
	</div>
</div>
<?php
    }
?>               
<!-- Modal thêm mới nhóm quyền -->
<div class="modal fade" id="modalThemMoi" role="dialog">
    <div class="modal-dialog modal-lg">      
<!-- Modal content-->
       	<div class="modal-content" style="background-color: white;">
    	<h2 class="h2-nq" style="padding-left: 1%;">Thêm nhóm quyền </h2>
    	<hr />
   		 <form id="fThemMoiNQ" name="fThemMoiNQ" method="post" action="quanly/xuly_ttnq.php" class="form-horizontal" role="form">
			<div class="form-group">
            	<label for="txtTenNQ" class="col-sm-3 control-label">Tên nhóm quyền:  </label>
           		<div class="col-sm-8">
            		<input type="text" name="txtTenNQ" id="txtTenNQ" class="form-control" placeholder="Tên nhóm quyền" value='' required="">
                </div>
            </div>           
            <div class="form-group">
                <label for="txtDienGiai" class="col-sm-3 control-label">Diễn giải:  </label>
                <div class="col-sm-8">
                	<input type="text" name="txtDienGiai" id="txtDienGiai" class="form-control" placeholder="Diễn giải" value='' required="">
                </div>
             </div>
            <!-- Select Vai Trò  -->
            <div class="form-group vaitro">     
                <label for="sell" class="col-sm-3 control-label">Tên vai trò:  </label>
                <div class="col-sm-6">
                    <select class="form-control" id="slVaiTro[]" name="slVaiTro[]" required="">
                        <option value="" class="col-sm-6"> Chọn vai trò </option>
                        <?php
                            $query=mysqli_query($conn,"SELECT * FROM NHOMQUYENCHITIET");
                            while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>                       
                        <option value="<?php echo $row['NQCT_MA'];?>" class="col-sm-6"><?php echo $row['NQCT_TEN'];?></option>
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
            <!-- Select Vai Trò FADE -->
            <div class="vaitro-more hide">
                <div class="form-group">     
                    <label for="sell" class="col-sm-3 control-label">Tên vai trò:  </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="slVaiTro[]" name="slVaiTro[]">
                            <option value="" class="col-sm-6"> Chọn vai trò </option>
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM NHOMQUYENCHITIET");
                                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                            ?>                       
                            <option value="<?php echo $row['NQCT_MA'];?>" class="col-sm-6"><?php echo $row['NQCT_TEN'];?></option>
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
              	<div class="col-sm-offset-3 col-sm-10">
                	<input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                    <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal"  />
                 </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal thêm nhóm quyền -->
<!-- Modal thêm mới vai trò cho nhóm quyền -->
<div class="modal fade" id="modalThemVaiTro" role="dialog">
    <div class="modal-dialog modal-lg">      
<!-- Modal content-->
        <div class="modal-content" style="background-color: white;">
        <h2 class="h2-nq" style="padding-left: 1%;">Thêm nhóm quyền </h2>
        <hr />
         <form id="fThemMoiVT" name="fThemMoiVT" method="post" action="quanly/xuly_ttnq.php" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="slNhomQuyen" class="col-sm-3 control-label">Tên nhóm quyền:  </label>
                <div class="col-sm-8">
                    <select class="form-control" id="slNhomQuyen" name="slNhomQuyen" required="">
                        <option value="" class="col-sm-6"> Chọn nhóm quyền </option>
                        <?php
                            $query=mysqli_query($conn,"SELECT * FROM NHOMQUYEN");
                            while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>                       
                        <option value="<?php echo $row['NQ_MA'];?>" class="col-sm-6"><?php echo $row['NQ_TEN'];?></option>
                        <?php 
                            } 
                        ?>
                    </select>
                </div>
            </div>           
            <!-- Select Vai Trò  -->
            <div class="form-group vaitro2">     
                <label for="sell" class="col-sm-3 control-label">Tên vai trò:  </label>
                <div class="col-sm-6">
                    <select class="form-control" id="slVaiTro[]" name="slVaiTro[]" required="">
                        <option value="" class="col-sm-6"> Chọn vai trò </option>
                        <?php
                            $query=mysqli_query($conn,"SELECT * FROM NHOMQUYENCHITIET");
                            while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                            {
                        ?>                       
                        <option value="<?php echo $row['NQCT_MA'];?>" class="col-sm-6"><?php echo $row['NQCT_TEN'];?></option>
                        <?php 
                            } 
                        ?>
                    </select>
                </div>
                <div>
                    <a class="add-more2">
                        <img src="tainguyen/hinhanh/plus-green.png" />
                    </a>
                </div>
            </div>
            <!-- Select Vai Trò FADE -->
            <div class="vaitro2-more hide">
                <div class="form-group">     
                    <label for="sell" class="col-sm-3 control-label">Tên vai trò:  </label>
                    <div class="col-sm-6">
                        <select class="form-control" id="slVaiTro[]" name="slVaiTro[]">
                            <option value="" class="col-sm-6"> Chọn vai trò </option>
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM NHOMQUYENCHITIET");
                                while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                                {
                            ?>                       
                            <option value="<?php echo $row['NQCT_MA'];?>" class="col-sm-6"><?php echo $row['NQCT_TEN'];?></option>
                            <?php 
                                } 
                            ?>
                        </select>
                    </div>
                    <div>
                        <a class="remove2">
                            <img src="tainguyen/hinhanh/negative.png" />
                        </a>
                    </div>
                </div>
            </div>            
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-10">
                    <input type="submit"  class="btn btn-primary" name="btnVaiTro" id="btnVaiTro" value="Cập nhật"/>
                    <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" data-dismiss="modal"  />
                 </div>
              </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal thêm vai trò cho nhóm quyền -->
<script type="text/javascript">
    /*Popup vai trò cho thêm nhóm quyền*/
    $(document).ready(function() {
    //here first get the contents of the div with name class dichvu-more and add it to after "dichvu" div class.
      $(".add-more").click(function(){ 
          var html = $(".vaitro-more").html();
          $(".vaitro").after(html);
      });
    //here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove",function(){ 
          $(this).parents(".form-group").remove();
      });
 
    });
    ///*Popup vai trò cho thêm vai trò*/
    $(document).ready(function() {
    //here first get the contents of the div with name class dichvu-more and add it to after "dichvu" div class.
      $(".add-more2").click(function(){ 
          var html = $(".vaitro2-more").html();
          $(".vaitro2").after(html);
      });
    //here it will remove the current value of the remove button which has been pressed
      $("body").on("click",".remove2",function(){ 
          $(this).parents(".form-group").remove();
      });
 
    });
</script>
<script>
    $('#modalThemMoi').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    function xoaNhomQuyen(a) {
        var nq_ma = a.id;
        // console.log(nq_ma);
        $.ajax({
            url: 'quanly/xuly_ttnq.php',
            type: "get",
            data: 'nq_ma=' + nq_ma,
            success: function() {   
                location.reload();  
            }
        });
    };
</script>