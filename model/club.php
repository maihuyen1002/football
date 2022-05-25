<?php

class ClubModel
{
    public $ClubID;
    public $ClubName;
    public $ShortName;
    public $StadiumID;
    public $CoachID;
    
    function __construct() {
        $this->ClubID = "";
        $this->ClubName = "";
        $this->ShortName = "";
        $this->StadiumID = "";
        $this->CoachID = "";
    }
    
    public static function listAllClub() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM Club";
        $result = $mysqli->query($query);
        $listClub = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $Club = new ClubModel();
                $Club->ClubID = $row["ClubID"];
                $Club->ClubName = $row["ClubName"];
                  
                $listClub[] = $Club; //add an item into array
            }
        }
        $mysqli->close();
        return $listClub;
    }
    public static function find($keyword) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM Club WHERE ClubName LIKE '%$keyword%'";
        $result = $mysqli->query($query);
        $listClub = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $Club = new ClubModel();
                $Club->ClubID = $row["ClubID"];
                $Club->ClubName = $row["ClubName"];     
                $listClub[] = $Club; //add an item into array
            }
        }
        $mysqli->close();
        return $listClub;
    }

    public static function addClub($Club)
    {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");

        $ClubID = $Club->ClubID;
        $ClubName = $Club->ClubName;
        $ShortName = $Club->ShortName;
        $StadiumID = $Club->StadiumID;
        $CoachID = $Club->CoachID;


        $query = "INSERT INTO Club values ($ClubID, '$ClubName', '$ShortName', '$StadiumID', '$CoachID')";
        
        if ($mysqli->query($query))        
            return 1;        
        return 0;
    }

    public static function getClub($ClubID) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM Club WHERE ClubID='$ClubID'";
        $result = $mysqli->query($query);
       
        if  ($row = $result->fetch_object() ) {

            $Club = new ClubModel();
            $Club->ClubID = $row->ClubID;
            $Club->ClubName = $row->ClubName;
            $Club->ShortName = $row->ShortName;
            $Club->StadiumID = $row->StadiumID;
            $Club->CoachID = $row->CoachID;
        }

        $mysqli->close();
        return $Club;
    }

    public static function deleteClub($ClubID)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "DELETE FROM Club WHERE ClubID=$ClubID";
        $r = 0;
        if ($mysqli->query($query))       
            $r = 1;
        $mysqli->close();
        return $r;
        
    }
}
?>
