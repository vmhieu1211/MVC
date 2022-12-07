<?php
namespace admin\app\controller;

use admin\app\controller\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function store()
    {
        if(isset($_POST['save'])){
            $nameRole = trim(strip_tags($_POST['name'] ?? ''));
            $description = trim(strip_tags($_POST['description'] ?? ''));   
        }
        if(empty($nameRole)){
            $_SESSION['errNameRole'] = 'Vui long nhap ten vai tro';
            return redirect('dashboard','index');
        } else{
            if(isset($_SESSION['errNameRole'])){
                unset($_SESSION['errNameRole']);
            }
            //luu vao db
            // kiem tra xem du lieu can luu da ton tai trong db chua?
            // neu chua thi luu 
            // neu co thi luu va thong bao loi
        }
        
    }
}