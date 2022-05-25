<?php

class HomeController
{
    public function index()
    {
        //$data = "Hello world !!!!";        
        $VIEW = "./view/page/homepage.phtml";
        require("./template/template.phtml");
    }
}
