<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
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
    $list_rooms=get_list_room($start,$num_per_page,"room.typeCode=roomtype.id");
    //Truyền tất cả dữ liệu muốn truyền đưa qua cho view
    $data['list_rooms']=$list_rooms;
    $data['start']=$start;
    $get_pagging=get_pagging($num_page,$page,"?mod=room&action=listRoom");
    $data['get_pagging']=$get_pagging;
    //KẾT THÚC TEST
    if (isset($_POST['save-update-room-id'])) {
        updateRoomAction();
    }
    if(isset($_POST['btn-yes'])){
        del_id_roomAction();
    }
    load_view('index', $data);
}

function updateRoomAction() {
    if (isset($_POST['save-update-room-id'])) {
        $roomId = $_POST['roomId'];
        $data = array(
            'roomNumber' => $_POST['roomNumber'],
            'image' => $_POST['roomImage'],
            'price' => $_POST['roomPrice'],
            'typeCode' => $_POST['roomType'],
            'state' => $_POST['roomState'],
            'description' => $_POST['roomDescription']
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
        'price' => $room_id['price'],
        'typeCode' => $room_id['typeCode'],
        'description' => $room_id['description'],
        'state' => $room_id['state']
    );
    echo json_encode($result);
}

function addAction() {
    if (isset($_POST['btn-save'])) {
        global $error;
        if (isset($_FILES['roomImage'])) {
            move_uploaded_file($_FILES['roomImage']['tmp_name'], 'D:/Unitop/xampp/htdocs/Backend/DoAn/section_Do_An(1)/quanly_KS_Admin/public/images/room/' . $_FILES['roomImage']['name']);
            $data = array(
                'roomNumber' => $_POST['roomNumber'],
                'image' => $_FILES['roomImage']['name'],
                'price' => $_POST['roomPrice'],
                'typeCode' => $_POST['roomType'],
                'description' => $_POST['roomDescription'],
                'state' => $_POST['roomState']
            );
            insert_info_room($data);
        } else {
            $data = array(
                'roomNumber' => $_POST['roomNumber'],
                'price' => $_POST['roomPrice'],
                'typeCode' => $_POST['roomType'],
                'description' => $_POST['roomDescription'],
                'state' => $_POST['roomState']
            );
            insert_info_room($data);
        }
    }
    $list_room_type=get_list_room_type();
    $data['list_room_type']=$list_room_type;
    load_view('add',$data);
}

function del_id_roomAction(){
    if(isset($_POST['btn-yes'])){
        $id=$_POST['roomId'];
        del_room_id($id);
        redirect("?mod=room&action=listRoom");
    }
}
