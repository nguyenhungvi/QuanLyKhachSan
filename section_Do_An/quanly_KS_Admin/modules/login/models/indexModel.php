<?php

function check_login($username,$password){
    $check_user= db_num_rows("SELECT * FROM `admin` WHERE `username`='{$username}' AND `password`='{$password}'");
    if($check_user>0)
        return TRUE;
    return FALSE;
}
