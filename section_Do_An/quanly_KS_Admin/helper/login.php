<?php

function is_login(){
    if(isset($_SESSION['is_login'])){
        return TRUE;
    }
    return FALSE;
}
