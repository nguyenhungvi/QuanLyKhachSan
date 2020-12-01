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
            <small>Danh sách loại phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                    <div class="buttonexport" id="buttonlist">
                        <button type="button" name="roomTypeAdd" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer3" room-type-id="<?php echo $room_type['id']; ?>"><i class="fa fa-plus"></i> Thêm loại phòng</button>
                    </div>
                    <button class="btn btn-exp btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Xuất dữ liệu</button>
                    <ul class="dropdown-menu exp-drop" role="menu">
                        <li>
                            <a href="#" onclick="$('#dataTableExample1').tableExport({type: 'pdf', pdfFontSize: '7', escape: 'false'});"> 
                                <img src="public/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
                        </li>
                    </ul>
                </div>
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="table-responsive">
                    <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr class="info">
                                <th>STT</th>
                                <th>Tên loại Phòng</th>
                                <th>Giá phòng</th>
                                <th>Mô tả</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_RoomType)) {
                                $t = 0;
                                //show_array($list_RoomType);
                                foreach ($list_RoomType as $room_type) {
                                    $t++;
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $room_type['name']; ?></td>
                                        <td><?php echo currency_format($room_type['price'],'$'); ?></td>
                                        <td><?php echo $room_type['description']; ?></td>
                                        <td>
                                            <button type="button" name="roomTypeUpdate" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1" room-type-id="<?php echo $room_type['id']; ?>"><i class="fa fa-pencil"></i></button>
                                            <button type="button" name="roomTypeDelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2" del-room-type-id="<?php echo $room_type['id']; ?>"><i class="fa fa-trash-o"></i> </button>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- customer Modal1 -->
        <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content content-roomType">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Cập nhật loại phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Text input-->
                                        <div class="col-md-9 form-group">
                                            <input type="hidden" name="room_type_Id" value=""/>
                                            <label class="control-label">Loại phòng:</label>
                                            <input type="text" name="room_type_Name" placeholder="room_type_Name" value="" class="form-control">
                                        </div>
                                        <!-- Text input-->
                                        <div class="col-md-3 form-group">
                                            <label class="control-label">Giá phòng:</label>
                                            <input type="text" name="room_type_Price" placeholder="Giá phòng" value="" class="form-control">
                                        </div>
                                        <!--Mô tả-->
                                        <div class="col-md-12 form-group">
                                            <label class="control-label">Mô tả phòng:</label><br>
                                            <textarea class="ckeditor" id="room_type_Description" name="room_type_Description" rows="3" style="margin: 0px; width: 930px;height: 350px"></textarea>
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-update-room-type-id" class="btn btn-add btn-sm" value="Save"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!--Add modal 3-->
        <!-- customer Modal1 -->
        <div class="modal fade" id="customer3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog w-dialog">
                <div class="modal-content content-roomType">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Thêm phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Text input-->
                                        <div class="col-md-6 form-group">
                                            <label class="control-label">Loại phòng:</label>
                                            <input type="text" name="room_type_name" placeholder="Tên loại phòng" value="" class="form-control">
                                        </div>
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-add-room-id" class="btn btn-add btn-sm" value="Save"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- Modal -->    
        <!-- Customer Modal2 -->
        <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Xóa loại phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <div class="col-md-12 form-group user-form-group">
                                            <label class="control-label">Bạn có chắc chắn muốn xóa loại phòng: <span id="roomName_del"></span></label>
                                            <div class="pull-right">
                                                <input type="hidden" name="room_type_Id" value=""/>
                                                <input type="button" class="btn btn-danger btn-sm"  data-dismiss="modal" value="NO"/>
                                                <input type="submit" name="btn-yes-room-type" class="btn btn-add btn-sm" value="YES"/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!--Thiết kế phân trang-->

    </section>
    <?php
    //echo $get_pagging;
    ?>
    <div class="clearfix"></div>
    <!-- /.content -->
</div>
<?php
get_footer();
?>