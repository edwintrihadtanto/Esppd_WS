<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome');
    }
    
    public function tes(){
        var_dump($_POST);
    }
}
