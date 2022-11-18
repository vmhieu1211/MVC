<?php
namespace app\controller;

class Controller
{
    protected $rootPathView;
    public function __construct()
    {   
        $this->rootPathView = PATH_APP_VIEW;
    }
    protected function loadView($path,$data = [])
    {
        // load view vao controller hay dau do
        // $path : duong dan den file voew
        // $data : du lieu gui ra ngoai view
        extract ($data);
        // bien key cua mang thanh 1 bien ngoai view
        /*
            ['name' => 'Teo;]
            //$name = 'Teo' // su dung ngoai view
        */
        require $this->rootPathView.$path.'.php';
        //require 'app/view/login/form_view.php'

    }
    public function __call($name, $arguments)
    {
        exit("Not found request {$name}");
    }
}
