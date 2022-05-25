<?php

class ClubController
{
    protected $clubModel;




    public function listAllClub()
    {
        $data = ClubModel::listAllClub();        
        $VIEW = "./view/page/ClubList.phtml";
        require("./template/template.phtml");
    }
    
    public function search()
    {
        $keyword = $_REQUEST["keyword"];
        $data = ClubModel::find($keyword);
        $VIEW = "./view/page/ClubList.phtml";
        require("./template/template.phtml");
    }

    public function addClub()
    {
        $data = "";
        if (isset($_REQUEST["ClubID"]) && isset($_REQUEST["ClubName"])&& isset($_REQUEST["ShortName"]) && isset($_REQUEST["StadiumID"])&& isset($_REQUEST["CoachID"]))
        {
            $cl = new ClubModel();
            $cl->ClubID = $_REQUEST["ClubID"];
            $cl->ClubName = $_REQUEST["ClubName"];
            $cl->ShortName = $_REQUEST["ShortName"];
            $cl->StadiumID = $_REQUEST["StadiumID"];
            $cl->CoachID = $_REQUEST["CoachID"];
        
            $result = ClubModel::addClub($cl);
            if ($result == 1)
                $data = "Added successful Clubs";
            else
                $data = "Added error";                
        }
        
        $VIEW = "./view/page/AddClub.phtml";
        require("./template/template.phtml");
    }

    public function show()
    {
        $ClubID = $_REQUEST["ClubID"];
        $data = ClubModel::getClub($ClubID);
        $VIEW = "./view/page/ClubInformation.phtml";
        require("./template/template.phtml");
    }

    public function delete()
    {
        $ClubID = $_REQUEST["ClubID"];
        $result = ClubModel::deleteClub($ClubID);        
        $data = ClubModel::listAllClub();        
        $VIEW = "./view/page/ClubList.phtml";
        require("./template/template.phtml");
    }
}
?>
