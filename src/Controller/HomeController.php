<?php

namespace Controller;

class HomeController
{
    public function index()
    {
        $this->routeManager();
    }

    public function routeManager(){
        return require 'index.php';
    }

}