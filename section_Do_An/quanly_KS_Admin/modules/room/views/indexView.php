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
            <small>Danh sách phòng</small>
        </div>
    </section>
    <!-- Main content -->
    <section class="content content-wp">
        <div class="row">
            <div class="col-sm-12">
                <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
                <div class="btn-group">
                    <div class="buttonexport" id="buttonlist"> 
                        <a class="btn btn-add" href="?mod=room&action=add"> <i class="fa fa-plus"></i> Thêm phòng
                        </a>  
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
                                <th>Số phòng</th>
                                <th>Hình ảnh phòng</th>
                                <th>Giá phòng</th>
                                <th>Loại phòng</th>
                                <th>Trạng thái</th>
                                <th>Chỉnh sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($list_rooms)) {
                                $t = $start;
                                global $room_id;
                                foreach ($list_rooms as $room) {
                                    $t++;
//                                            $room_id=$room['id'];
//                                            echo $room_id;
                                    ?>
                                    <tr>
                                        <td><?php echo $t; ?></td>
                                        <td><?php echo $room['roomNumber']; ?></td>
                                        <td><img src="public/images/room/<?php echo $room['image']; ?>" class="img-thumbnail" alt="User Image" width="100" height="auto"> </td>
                                        <td><?php echo currency_format($room['price'], '$');    ?></td>
                                        <td><?php echo $room['name']; ?></td>
                                        <td><span class="label-custom label label-default"><?php
                                                //echo $room['state'];
                                                if ($room['state'] == 2) {
                                                    echo "Còn trống";
                                                } elseif ($room['state'] == 1) {
                                                    echo "Đã đặt";
                                                }
                                                ?></span></td>
                                        <td>
                                            <button type="button" name="roomUpdate" class="btn btn-add btn-sm" data-toggle="modal" data-target="#customer1" room-id="<?php echo $room['id']; ?>"><i class="fa fa-pencil"></i></button>
                                            <button type="button" name="roomDelete" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#customer2" del-room-id="<?php echo $room['id']; ?>"><i class="fa fa-trash-o"></i> </button>
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
                <div class="modal-content">
                    <div class="modal-header modal-header-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3><i class="fa fa-user m-r-5"></i> Update Room</h3>
                        <?php //echo $room_id; ?>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <!-- Text input-->
                                        <div class="col-md-3 form-group">
                                            <input type="hidden" name="roomId" value=""/>
                                            <label class="control-label">Số phòng:</label>
                                            <input type="text" name="roomNumber" placeholder="roomNumber" value="" class="form-control">
                                        </div>
                                        <!-- Text input-->
                                        <!--                                        <div class="col-md-3 form-group">
                                                                                    <label class="control-label">Giá phòng:</label>
                                                                                    <input type="number" name="roomPrice" placeholder="Giá phòng" value="" class="form-control">
                                                                                </div>-->
                                        <!--                                        <div class="col-md-3 form-group">
                                                                                    <label class="control-label">Loại phòng:</label>
                                                                                    <input type="text" name="roomType" placeholder="Loại phòng" value="" class="form-control">
                                                                                </div>-->
                                        <div class="col-md-3 form-group">
                                            <label class="control-label">Loại phòng:</label>
                                            <select class="form-control" name="roomType" id="roomType">
                                                <?php
                                                foreach ($list_room_type as $room_type) {
                                                    ?>
                                                    <option value="<?php echo $room_type['id'];?>"><?php echo $room_type['name'];?></option>
                                                    <?php
                                                }
                                                ?>
<!--                                                <option value="1">Single</option>
                                                <option value="2">Double</option>
                                                <option value="3">Queen</option>-->
                                            </select>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <label class="control-label">Trạng thái:</label>
                                            <select class="form-control" name="roomState" id="roomState">
                                                <option value="2">Còn trống</option>
                                                <option value="1">Đã đặt</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label class="control-label">Image:</label>
                                            <input type="text" name="roomImage" placeholder="Image" value="" class="form-control">
                                        </div>
                                        <!--                                        <div class="col-md-12 form-group">
                                                                                    <label class="control-label">Mô tả phòng:</label><br>
                                                                                    <textarea class="ckeditor" id="roomDescription" name="roomDescription" rows="3" style="margin: 0px; width: 930px;height: 350px"></textarea>
                                                                                </div>-->
                                        <div class="col-md-12 form-group user-form-group">
                                            <div class="pull-right">
                                                <input type="submit" name="save-update-room-id" class="btn btn-add btn-sm" value="Save"/>
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
                        <h3><i class="fa fa-user m-r-5"></i> Xóa phòng</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal" method="POST">
                                    <fieldset>
                                        <div class="col-md-12 form-group user-form-group">
                                            <label class="control-label">Bạn có chắc chắn muốn xóa phòng: <span id="roomNumber_del"></span></label>
                                            <div class="pull-right">
                                                <input type="hidden" name="roomId" value=""/>
                                                <input type="button" class="btn btn-danger btn-sm"  data-dismiss="modal" value="NO"/>
                                                <input type="submit" name="btn-yes" class="btn btn-add btn-sm" value="YES"/>
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
    echo $get_pagging;
    ?>
    <div class="clearfix"></div>
    <!-- /.content -->
</div>
<?php
get_footer();
?>