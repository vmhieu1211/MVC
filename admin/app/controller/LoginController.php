<?php

namespace admin\app\controller;

use admin\app\controller\Controller;
use admin\app\model\Login;

class LoginController extends Controller
{
    protected $loginModel;

    public function __construct()
    {
        parent::__construct();
        $this->loginModel = new Login();
    }

    public function index()
    {
        $this->loadView('login/index_view');
    }

    public function handleLogin()
    {
        if (isset($_POST['btnLogin'])) {
            $username = trim(strip_tags($_POST['username'] ?? ''));
            $password = trim(strip_tags($_POST['password'] ?? ''));
            if (empty($username) || empty($password)) {
                $_SESSION['error_login'] = 'Vui long nhap du lieu';
                return (redirect('login', 'index', ['state=fail']));
            } else {
                if (isset($_SESSION['error_login'])) {
                    unset($_SESSION['error_login']);
                }
            }
            $infoUser = $this->loginModel->loginUser($username, $password);
            if (empty($infoUser)) {
                //nhap linh tinh - khong ton tai
                $_SESSION['fail_login'] = 'Tai khoan khong ton tai';
                return (redirect('login', 'index'));
            } else {
                // co ton tai user
                if (isset($_SESSION['fail_login'])) {
                    unset($_SESSION['failo_login']);
                }

                // luu thong tin vao session
                $_SESSION['user_id'] = $infoUser['id'];
                $_SESSION['username'] = $infoUser['username'];
                $_SESSION['email'] = $infoUser['email'];
                $_SESSION['phone'] = $infoUser['phone'];
                $_SESSION['role_id'] = $infoUser['role_id'];
                // di vao trang dashboard
                return redirect('dashboard','index');
            }
        }
    }
}
