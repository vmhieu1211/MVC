<?php
 namespace app\controller;

 class HomeController extends Controller
{
    //ten file va ten class phai giong nhau
    public function index()
    {
        //xu ly logic
        // load header
        $this->loadHeader([
            'title' => 'Home page',
        ]);
        //load view
        $this->loadView('home/index_view');

        //loadfooter
        $this->loadFooter();
    }
}