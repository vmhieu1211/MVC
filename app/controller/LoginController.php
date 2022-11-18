<?php
namespace app\controller;
// ten duong dan thu muc chua file

use app\controller\Controller;

class LoginController extends Controller
{
    // ten file va ten class phai giong nhau
    public function index()
    {
        $message = '';
        if(isset($_SESSION['errorLogin'])){
            $message = $_SESSION['errorLogin'];
        }

        $this->loadView('login/form_view',[
            'title' => 'Login admin website',
            'message' => $message
        ]);
    }

    public function handleLogin()
    {
        if(isset($_POST['btnLogin'])){
            $username = strip_tags($_POST['username'] ?? '');
            $password = strip_tags($_POST['password'] ?? '');
            if(!empty($username) && !empty($password)){
                // call data tu database de kiem tra voi du lieu cua nguoi dung gui len
                if($username === 'admin' && $password === '123'){
                    // xoa bo session loi
                    if(isset($_SESSION['errorLogin'])){
                        unset($_SESSION['errorLogin']);
                    }
                    // luu thong tin nguoi dung vao session va chuyen sang trang khac
                    $_SESSION['username'] = $username;
                    return redirect('home','index');
                } else {
                    $_SESSION['errorLogin'] = 'Tai khoan khong ton tai';
                    // chuyen lai ve form login
                    return redirect('login','index',['state'=>'fail']);
                }
            } else {
                //thong bao loi - quay ve form login
                // tao ra session de luu loi
                $_SESSION['errorLogin'] = 'Vui long nhap du lieu';
                // chuyen lai ve form login
                return redirect('login','index',['state'=>'fail']);
            }
        }
    }
}