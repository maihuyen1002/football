<?php

class PlayerController
{
    public function listPlayerClub()
    {
        if (isset($_REQUEST["ClubID"]))
        {
        $ClubID = $_REQUEST["ClubID"];
        $data = PlayerModel::listPlayerClub($ClubID);        
        $VIEW = "./view/page/PlayerList.phtml";
        require("./template/template.phtml");
        }
    }

    public function listAll()
    {
        $data = PlayerModel::listAll();        
        $VIEW = "./view/page/PlayerList.phtml";
        require("./template/template.phtml");
    }
    
    public function search($keyword)
    {
        $keyword = $_REQUEST["keyword"];
        $data = PlayerModel::find($keyword);
        include('./view/page/SearchPlayerList.phtml');
        
    }

    public function add()
    {
        $data = "";
        if (isset($_REQUEST["PlayerID"]))
        {
            $pl = new PlayerModel();
            $pl->PlayerID = $_REQUEST["PlayerID"];
            $pl->FullName = $_REQUEST["FullName"];
            $pl->ClubID = $_REQUEST["ClubID"];
            $pl->DOB = $_REQUEST["DOB"];
            $pl->Position = $_REQUEST["Position"];
            $pl->Nationality = $_REQUEST["Nationality"];
            $pl->Number = $_REQUEST["Number"];
            $result = PlayerModel::add($pl);
            if ($result == 1)
                $data = "Added successful players";
            else
                $data = "Added error";                
        }
        
        $VIEW = "./view/page/AddPlayer.phtml";
        require("./template/template.phtml");
    }

    public function show()
    {
        $PlayerID = $_REQUEST["PlayerID"];
        $data = PlayerModel::get($PlayerID);
        $VIEW = "./view/page/PlayerInformation.phtml";
        require("./template/template.phtml");
    }

    public function delete()
    {   if (isset($_REQUEST["PlayerID"]))
        {
        $PlayerID = $_REQUEST["PlayerID"];
        $result = PlayerModel::delete($PlayerID);        
        $data = PlayerModel::listAll();        
        $VIEW = "./view/page/PlayerList.phtml";
        require("./template/template.phtml");
        }
    }

    public function updatePlayer()
    {
        if (isset($_REQUEST["PlayerID"]))
        {
        $PlayerID = $_GET["PlayerID"];
        $FullName="";
        $Position="";
        $Number="";
        $Nationality="";
        $DOB ="";
        $ClubID="";

        if(isset($_POST["FullName"]) and $_POST["FullName"] != ""){
            $FullName = $_POST["FullName"];
        }
        if(isset($_POST["Position"]) and $_POST["Position"] != ""){
            $Position = $_POST["Position"];
        }
        if(isset($_POST["Number"]) and $_POST["Number"] != ""){
            $Number = $_POST["Number"];
        }
        if(isset($_POST["Nationality"]) and $_POST["Nationality"] != ""){
            $Nationality = $_POST["Nationality"];
        }
        if(isset($_POST["ClubID"]) and $_POST["ClubID"] != ""){
            $ClubID = $_POST["ClubID"];
        }
        if(isset($_POST["DOB"]) and $_POST["DOB"] != ""){
            $DOB = $_POST["DOB"];
        }
       

        $result=true;
        $result = PlayerModel::updatePlayer($PlayerID, $FullName, $Position, $Number, 
            $Nationality, $ClubID, $DOB);
        if($result==true){
            echo "<script>alert('Modify player successfully!');</script>";
        }
        else{
            echo "<script>alert('Modify player failed!');</script>";
        }
    }
        $VIEW = "./view/page/ModifyPlayer.phtml";
        require("./template/template.phtml");
    
    }

    
}
?>
