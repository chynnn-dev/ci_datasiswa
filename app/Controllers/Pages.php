<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        echo view('Layout/header');
        echo view('Layout/footer'); 
    }
}

