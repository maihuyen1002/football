<?php

class LoginController
{
    //add this function at any function of controller which require to authorize
    public static function authentication()
    {
        if (!isset ($_SESSION["IsLogined"]) || $_SESSION["IsLogined"] != "true")
        {
            header("Location:index.php?action=error");
        }        
    }
    public function logout()
    {
        unset($_SESSION["IsLogined"]);
		header("Location:index.php");		
    }

    public function unauthorized_page()
    {        
        $data = ""; 
        $VIEW = "./view/msg.phtml";
        require("./template/template.phtml");
    }

    public function login()
    {
        if (count($_POST) >= 0 && isset($_POST["UserName"]))
        {
            $username = $_POST["UserName"];
            $password = $_POST["Password"];  
            
            $mysqli = connect();
            $mysqli->query("SET NAMES utf8");
            $query = "SELECT * FROM user WHERE name = $username and password = $password";

            if ($username === "ntson" && $password === "12345")
            {
                $_SESSION["IsLogined"] = True;
                $_SESSION["UserName"] = $username;                
                header("Location:index.php");
            }		
            else
            {
                $data = "Thông tin đăng nhập bị sai, nhập lại thông tin !!!";        
                $VIEW = "./view/DangNhap.phtml";
            }
        }
        else 
        {
            $data = "";        

            $VIEW = "./view/DangNhap.phtml";
        }
        require("./template/template.phtml");
    }
}
