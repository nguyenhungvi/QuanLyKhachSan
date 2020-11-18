<?php

function construct() {
//    echo "DÙng chung, load đầu tiên";
    load_model('index');
    load('lib', 'validation');
}

function indexAction() {
    
}
function loginAction(){
    global $error, $username, $password;
    //Kiểm tra xem nut login có được click không
    if(isset($_POST['btn-login'])){
        //Kiểm tra username
        if(empty($_POST['username'])){
            $error['username']="Tên đăng nhập không được để trống";
        }else{
            if(!is_username($_POST['username'])){
                $error['username']="Không đúng định dạng, vui lòng nhập lại";
            }else{
                $username=$_POST['username'];
            }
        }
        
        //Kiểm tra password
        if(empty($_POST['password'])){
            $error['password']="Mật khẩu đăng nhập không được để trống";
        }else{
            if(!is_username($_POST['password'])){
                $error['password']="Không đúng định dạng, vui lòng nhập lại";
            }else{
                $password= md5($_POST['password']);
            }
        }
        
        //Kết luận
        if(empty($error)){
            if(check_login($username, $password)){
                //Lưu trữ phiên đăng nhập
                $_SESSION['is_login']=true;
                $_SESSION['user_login']=$username;
                //Chuyển hướng vào hệ thống
                redirect();
            }else{
                $error['account']="Tên đăng nhập hoặc mật khẩu không đúng";
            }
        }
    }
    load_view('index');
}
function logoutAction(){
    unset($_SESSION['is_login']);
    unset($_SESSION['user_login']);
    redirect("?mod=login&action=login");
}

