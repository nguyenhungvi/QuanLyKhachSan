<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
}

function indexAction() {
    //load_view('index');
}

function listRoomAction() {
    load('helper', 'format');
    load('lib', 'pagging');
//    $list_rooms = get_list_room();
//    $data['list_rooms'] = $list_rooms;
//    TEST
    //Đêm số dòng trên bảng
    $num_rows = get_num_row("`room`");
    //Số lượng bảng ghi trên bảng
    $num_per_page = 3;
    //Tổng số bảng ghi
    $total_row = $num_rows;
    //Tổng số trang
    $num_page = ceil($total_row / $num_per_page);
    //echo $num_page;
    //Tính chỉ số xuất của bản ghi cho từng page
    $page = isset($_GET['page']) ? (int) ($_GET['page']) : 1;
    //Chỉ số bắt đầu chạy
    $start = ($page - 1) * $num_per_page;
    $list_rooms = get_list_room($start, $num_per_page, "room.typeCode=roomtype.id");
    //Truyền tất cả dữ liệu muốn truyền đưa qua cho view
    $data['list_rooms'] = $list_rooms;
    $data['start'] = $start;
    $get_pagging = get_pagging($num_page, $page, "?mod=room&action=listRoom");
    $data['get_pagging'] = $get_pagging;
    //KẾT THÚC TEST
    if (isset($_POST['save-update-room-id'])) {
        updateRoomAction();
    }
    if (isset($_POST['btn-yes'])) {
        del_id_roomAction();
    }
    // truyền vào data dữ liệu tất cả loại phòng
    $list_room_type=get_list_room_type();
    $data['list_room_type']=$list_room_type;
    load_view('index', $data);
}

function updateRoomAction() {
    if (isset($_POST['save-update-room-id'])) {
        $roomId = $_POST['roomId'];
        $data = array(
            'roomNumber' => $_POST['roomNumber'],
            'image' => $_POST['roomImage'],
            'typeCode' => $_POST['roomType'],
            'state' => $_POST['roomState'],
        );
        update_info_room_id($data, $roomId);
        redirect("?mod=room&action=listRoom");
    }
}

function updateRoom_ShowAction() {
    $id = $_POST['id'];
    $room_id = get_room_id($id);
    $result = array(
        'id' => $room_id['id'],
        'roomNuber' => $room_id['roomNumber'],
        'image' => $room_id['image'],
        'typeCode' => $room_id['typeCode'],
        'state' => $room_id['state']
    );
    echo json_encode($result);
}

function addAction() {
    if (isset($_POST['btn-save'])) {
        global $error;
        if (isset($_FILES['roomImage'])) {
            $imagetype = $_FILES['roomImage']['type'];
            if ($imagetype != "image/png" && $imagetype != "image/jpg" && $imagetype != "image/jpeg" && $imagetype != "image/git") {
                $error['image'] = "Không đúng định dạng";
            } else {
                if ($_FILES['roomImage']['size'] > 1000000) {
                    $error['image'] = "Kích thước ảnh quá lớn";
                } else {
                    move_uploaded_file($_FILES['roomImage']['tmp_name'], 'D:/Unitop/xampp/htdocs/Backend/DoAn/QuanLyKhachSan/section_Do_An/quanly_KS_Admin/public/images/room/' . $_FILES['roomImage']['name']);
                    $data = array(
                        'roomNumber' => $_POST['roomNumber'],
                        'image' => $_FILES['roomImage']['name'],
//                        'price' => $_POST['roomPrice'],
                        'typeCode' => $_POST['roomType'],
//                        'description' => $_POST['roomDescription'],
                        'state' => $_POST['roomState']
                    );
                    insert_info_room($data);
                }
            }
        } else {
            $data = array(
                'roomNumber' => $_POST['roomNumber'],
//                'price' => $_POST['roomPrice'],
                'typeCode' => $_POST['roomType'],
//               'description' => $_POST['roomDescription'],
                'state' => $_POST['roomState']
            );
            insert_info_room($data);
        }
    }
    $list_room_type = get_list_room_type();
    $data['list_room_type'] = $list_room_type;
    load_view('add', $data);
}

function del_id_roomAction() {
    if (isset($_POST['btn-yes'])) {
        $id = $_POST['roomId'];
        del_room_id($id);
        redirect("?mod=room&action=listRoom");
    }
}

//RoomType
function listRoomTypeAction() {
    load('helper', 'format');
    $list_RoomType = get_list_room_type();
    $data['list_RoomType'] = $list_RoomType;
    if (isset($_POST['save-update-room-type-id'])) {
        updateRoomTypeAction();
    }
    if (isset($_POST['save-add-room-id'])) {
        addRoomTypeAction();
    }
    if (isset($_POST['btn-yes-room-type'])) {
        delRoomTypeAction();
    }
    load_view('listRoomType', $data);
}

function updateRoomTypeAction() {
    if (isset($_POST['save-update-room-type-id'])) {
        $roomid = $_POST['room_type_Id'];
        $data = array(
            'name' => $_POST['room_type_Name'],
            'price'=> $_POST['room_type_Price'],
            'description'=> $_POST['room_type_Description']
        );
        update_info_room_type_id($data, $roomid);
        //echo "hihi";
        redirect("?mod=room&action=listRoomType");
    }
    $id = $_POST['id'];
    $room_type_id = get_room_type_id($id);
    $result = array(
        'id' => $room_type_id['id'],
        'name' => $room_type_id['name'],
        'price'=>$room_type_id['price'],
        'description'=> $room_type_id['description']
    );
    echo json_encode($result);
}

function addRoomTypeAction() {
    $name_room_type = $_POST['room_type_name'];
    $data = array(
        'name' => $name_room_type
    );
    insert_info_room_type($data);
    redirect("?mod=room&action=listRoomType");
}

function delRoomTypeAction() {
    $id = $_POST['room_type_Id'];
    del_room_type_id($id);
    redirect("?mod=room&action=listRoomType");
}
