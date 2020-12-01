$(document).ready(function () {
    $("button[name='roomUpdate']").click(function () {
        var id = $(this).attr('room-id');
        var data = {id: id};
        var roomType;
        var roomState;
        //console.log(id);
        $.ajax({
            url: '?mod=room&action=updateRoom_Show', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomId']").val(data.id);
                $("input[name='roomNumber']").val(data.roomNuber);
                $("input[name='roomImage']").val(data.image);
//                CKEDITOR.instances['roomDescription'].setData(data.description);
                roomType = data.typeCode;
                $("#roomType>option[value='" + roomType + "']").attr('selected', 'selected');
                $("#roomType>option[value!='" + roomType + "']").removeAttr('selected');
                roomState = data.state;
                $("#roomState>option[value='" + roomState + "']").attr('selected', 'selected');
                $("#roomState>option[value!='" + roomState + "']").removeAttr('selected');
                console.log(roomState);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});
$(document).ready(function () {

    $("button[name='roomDelete']").click(function () {
        var id = $(this).attr('del-room-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&action=updateRoom_Show', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='roomId']").val(data.id);
                $("#roomNumber_del").html("<strong>" + data.roomNuber + "</strong>");
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

});

//Loại Phòng
$(document).ready(function () {
    $("button[name='roomTypeUpdate']").click(function () {
        var id = $(this).attr('room-type-id');
        var data = {id: id};
        //console.log(id);
        var test;
        $.ajax({
            url: '?mod=room&action=updateRoomType', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='room_type_Id']").val(data.id);
                $("input[name='room_type_Name']").val(data.name);
                $("input[name='room_type_Price']").val(data.price);
                CKEDITOR.instances['room_type_Description'].setData(data.description);
                console.log(data.price);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });


});

$(document).ready(function () {

    $("button[name='roomTypeDelete']").click(function () {
        var id = $(this).attr('del-room-type-id');
        var data = {id: id};
        console.log(id);
        $.ajax({
            url: '?mod=room&action=updateRoomType', //Trang xử lý, mặc định trang hiện tại xử lý ngầm lên server
            method: 'POST', //POST OR GET, mặc định GET
            data: data, //Dữ liệu truyền lên server, biến được khai báo bên trên
//            dataType: 'text', //html,text, script
            dataType: 'json', //dataType kiểu json
            success: function (data) {
                //Xử lý dữ liệu trả về
                $("input[name='room_type_Id']").val(data.id);
                $("#roomName_del").html("<strong>" + data.name + "</strong>");
                console.log(data);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
            }
        });
    });

});