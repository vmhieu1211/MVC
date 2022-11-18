<?php
// muc dich moi thu deu phai chay xuat phat tu file root index.php

if(!defined('APP_PATH')){
    die("cannot access");
}
// muc dich tiep nhan cac request tu phia client gui len
// cac request do co the la cac phiong thuc : GET, POST ...
// index.php?c=login&m=index
// c: ten controller
// m: phuong thuc nam trong controller
// su dung ky thuat lazy loading (ten file va class giong nhau)
// trong 1 file chi nen chua 1 class
$c = ucfirst($_GET['c'] ?? 'home'); // controller mac dinh ten la login
// ucfirst : viet hoa chu cai dau tien trong chuoi (Login)
$m = $_GET['m'] ?? 'dashboard'; 

//ten controller
$nameController = "{$c}Controller"; // chinh la ten file
// ten file
$fileController = "{$nameController}.php";
// full path file controller
$fullPathController = NAMESPACE_CONTROLLER. $fileController;
$fullRealPathController = str_replace("\\","/",$fullPathController);

//lam the nao khoi tao doi tuong controller
if(file_exists($fullRealPathController)){
    //tu dong khoi tao doi tuong
    $controller = NAMESPACE_CONTROLLER.$nameController;
    $obj = new $controller; // new app\controller\LoginController
    //tu dong goi phuong thuc trong class
    $obj->$m();
} else {
    exit('not found request');
}
//index.php?c=home&m=dashboard