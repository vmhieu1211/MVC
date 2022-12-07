<?php
namespace admin\app\controller;

use admin\app\controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return $this->loadView('dashboard/index_view');
    }
}