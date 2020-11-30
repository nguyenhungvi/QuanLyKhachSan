<?php

function get_list_room($start=0,$num_per_page=6,$where=""){
    //Lấy 1 mảng trong database
//    $result= db_fetch_array("SELECT room.id, room.roomNumber,room.image,room.price,roomtype.name,room.description,room.state FROM `room`,`roomtype` WHERE room.typeCode=roomtype.id");
//    return $result;
    if(!empty($where))
        $where="WHERE {$where}";
    $list_rooms = db_fetch_array("SELECT room.id, room.roomNumber,room.image,roomtype.name,room.state,roomtype.price FROM `room`,`roomtype` {$where} LIMIT {$start},{$num_per_page}");
    return $list_rooms;
}
function get_list_room_type(){
    //Lấy 1 mảng trong database
    $result= db_fetch_array("SELECT * FROM `roomtype`");
    return $result;
}

function get_room_id($id){
    $result= db_fetch_row("SELECT * FROM `room` WHERE `id`={$id}");
    return $result;
}

function update_info_room_id($data,$id){
    db_update('room', $data,"`id`={$id}");
}

function insert_info_room($data){
    db_insert('room', $data);
}

function del_room_id($id){
    db_delete('room', "`id`={$id}");
}

function get_num_row($label){
    $result=db_num_rows("SELECT * FROM {$label}");
    return $result;
}

function get_room_type_id($id){
    $result= db_fetch_row("SELECT * FROM `roomtype` WHERE `id`={$id}");
    return $result;
}
function update_info_room_type_id($data, $id){
    db_update('roomtype', $data,"`id`={$id}");
}

function insert_info_room_type($data){
    db_insert('roomtype', $data);
}

function del_room_type_id($id){
    db_delete('roomtype', "`id`={$id}");
}