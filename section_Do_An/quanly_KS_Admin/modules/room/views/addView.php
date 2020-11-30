<?php
get_header();
get_sidebar();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-home"></i>
        </div>
        <div class="header-title">
            <h1>Phòng</h1>
            <small>Thêm phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group" id="buttonlist"> 
                            <a class="btn btn-add " href="?mod=room&action=listRoom"> 
                                <i class="fa fa-list"></i> Danh sách phòng </a>  
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="col-sm-3" enctype="multipart/form-data" method="POST">
                            <div class="form-group">
                                <label>Số phòng</label>
                                <input type="text" name="roomNumber" class="form-control" placeholder="Số phòng" >
                            </div>
<!--                            <div class="form-group">
                                <label>Giá phòng</label>
                                <input type="text" name="roomPrice" class="form-control" placeholder="Giá phòng" >
                            </div>-->
                            <div class="form-group">
                                <label>Kiểu phòng</label>
                                <!--<input type="text" name="roomType" class="form-control" placeholder="Kiểu phòng" >-->
                                <select class="form-control" name="roomType" id="roomType">
                                    <?php
                                    foreach ($list_room_type as $type){
                                        ?>
                                        <option value="<?php echo $type['id'];?>"><?php echo $type['name'];?></option>
                                        <?php
                                    }
                                    ?>
<!--                                    <option value="1">Single</option>
                                    <option value="2">Double</option>
                                    <option value="3">Queen</option>-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <!--<input type="text" name="roomState" class="form-control" placeholder="Trạng thái" >-->
                                <select class="form-control" name="roomState" id="roomState">
                                    <option value="2">Còn trống</option>
                                    <option value="1">Đã đặt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh phòng</label>
                                <input type="file" name="roomImage" value="">
                                <?php echo form_error('image'); ?>
                            </div>
<!--                            <div class="form-group" style="margin: 0px; width: 930px;">
                                <label class="control-label">Mô tả phòng</label><br>
                                <textarea class="ckeditor" id="roomDescription" name="roomDescription" rows="3" ></textarea>
                            </div>-->
                            <div class="reset-button">
                                <input type="submit" name="btn-reset" class="btn btn-danger"  value="Reset"/>
                                <input type="submit" name="btn-save" class="btn btn-success" value="Save"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

<?php
get_footer();
?>