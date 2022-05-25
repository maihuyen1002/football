<?php
require_once("./controller/home.php");
require_once("./controller/player.php");
require_once("./controller/club.php");
require_once("./model/player.php");
require_once("./model/club.php");
require_once("config/dbconnect.php"); 

$action = "";
if (isset($_REQUEST["action"]))
{    
    $action = $_REQUEST["action"];
}
 
switch ($action)
{
    case "list":      
        $controller = new PlayerController();
        $controller->listAll();
        break;
    case "search":
        $controller = new PlayerController();
        $keyword = $_REQUEST["keyword"];
        $controller->search($keyword);
        break;
    case "add":
        $controller = new PlayerController();
        $controller->add();
        break;
    case "show":
        $controller = new PlayerController();
        $controller->show();
        break;
    case "delete":
        $controller = new PlayerController();
        $controller->delete();
        break;
    case "clubList":
        $controller = new ClubController();
        $controller->listAllClub();
    case "listPlayerClub":
        $controller = new PlayerController();
        $controller->listPlayerClub();
    case "addClub":
        $controller = new ClubController();
        $controller->addClub();
    break;
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>
