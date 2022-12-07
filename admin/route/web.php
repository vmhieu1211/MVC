<?php
// muc dich moi thu deu phai chay xuat phat tu file root index.php
if(!defined('ADMIN_APP_PATH')){
    die('can not access');
}
// muc dich tiep nhan cac request tu phia client gui len
// cac request do co the la cac phuong thuc : GET, POST ....
// index.php?c=login&m=index
// c : ten controller
// m: phuong thuc nam trong controller
// su dung ky thuat lazy loading (ten file va ten class giong nhau)
// trong 1 file chi nen chua 1 class thoi
$c = ucfirst($_GET['c'] ?? 'login'); // controller mac dinh ten la login
// ucfirst : viet hoa chu cai dau tien trong chuoi (Login)
$m = $_GET['m'] ?? 'index'; // phuong thuc mac dinh la index

// ten controller
$nameController = "{$c}Controller"; // chinh la ten file
//ten file
$fileController = "{$nameController}.php";
// full path file controller
$fullPathController = NAMESPACE_CONTROLLER.$fileController;
$fullRealPathController = str_replace("\\","/",$fullPathController);

// lam the nao khoi tao dc doi tuong controller
if(file_exists($fullRealPathController)){
    // tu dong khoi tao doi tuong
    $controller = ADMIN_NAMESPACE_CONTROLLER.$nameController;
    // app\controller\LoginController
    $obj = new $controller; // new app\controller\LoginController
    // tu dong goi phuong thuc trong class
    $obj->$m();
} else {
    exit('not found request');
}
//domain/admin/index.php?c=login