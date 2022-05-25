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
    {
        $MSSV = $_REQUEST["MSSV"];
        $result = PlayerModel::delete($MSSV);        
        $data = PlayerModel::listAll();        
        $VIEW = "./view/page/PlayerList.phtml";
        require("./template/template.phtml");
    }

    
}
?>
