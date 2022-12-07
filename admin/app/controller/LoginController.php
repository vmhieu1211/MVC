<?php
namespace admin\app\controller;

use admin\app\controller\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->loadView('login/index_view');
    }

}