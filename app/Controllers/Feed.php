<?php

namespace App\Controllers;

class Feed extends BaseController
{
    public function index()
    {
        return $this->view('/feed/index',[]);
    }

    public function view($page, $data){       
        echo view('/templates/header', ["title" => $data->title]);
        echo view($page,$data);
        
    }
}
