<?php

class PlayerModel
{
    public $PlayerID;
    public $FullName;
    public $ClubID;
    public $DOB;
    public $Position;
    public $Nationality;
    public $Number;
    
    function __construct() {
        $this->PlayerID = "";
        $this->FullName = "";
        $this->ClubID = "";
        $this->Position = "";
        $this->Number = "";
        $this->Nationality = "";
        $this->ClubName = "";
        $this->ClubID = "";
    }
    
    public static function listAll() {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM player p, club c where p.ClubID = c.ClubID";
        $result = $mysqli->query($query);
        $listPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->PlayerID = $row["PlayerID"];
                $player->FullName = $row["FullName"]; 
                $player->Position = $row["Position"];  
                $player->Number = $row["Number"];  
                $player->Nationality = $row["Nationality"];
                $player->ClubName = $row["ClubName"];
                $player->ClubID = $row["ClubID"];
                $listPlayer[] = $player; //add an item into array
            }
        }
        $mysqli->close();
        return $listPlayer;
    }
    public static function find($keyword) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT PlayerID, FullName, Position, Nationality, Number,  ClubName, club.ClubID "
        ."FROM player left JOIN club ON player.ClubID = club.ClubID "
        ."where player.FullName like '%$keyword%'";  
        ;
        $result = $mysqli->query($query);
        $listPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->PlayerID = $row["PlayerID"];
                $player->FullName = $row["FullName"];
                $player->Position = $row["Position"];
                $player->Nationality = $row["Nationality"];
                $player->Number=$row["Number"];
               // $player->DOB=$row["DOB"];
                $player->ClubName=$row["ClubName"];
                $player->ClubID=$row["ClubID"];       
                $listPlayer[] = $player; //add an item into array
            }
        }
        $mysqli->close();
        return $listPlayer;
    }

    public static function add($player)
    {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");

        $PlayerID = $player->PlayerID;
        $FullName = $player->FullName;
        $ClubID = $player->ClubID;
        $DOB = $player->DOB;
        $Position = $player->Position;
        $Nationality = $player->Nationality;
        $Number = $player->Number;

        $query = "INSERT INTO player values ($PlayerID, '$FullName', '$ClubID', '$DOB', '$Position', '$Nationality', '$Number')";
        
        if ($mysqli->query($query))        
            return 1;        
        return 0;
    }

    public static function get($PlayerID) {
        $mysqli = connect();
        
        $mysqli->query("SET NAMES utf8");
        $query = "SELECT * FROM player WHERE PlayerID='$PlayerID'";
        $result = $mysqli->query($query);
       
        if  ($row = $result->fetch_object() ) {

            $player = new PlayerModel();
            $player->PlayerID = $row->PlayerID;
            $player->ClubID = $row->ClubID;
            $player->FullName = $row->FullName;
            $player->DOB = $row->DOB;
            $player->Position = $row->Position;
            $player->Nationality = $row->Nationality;
            $player->Number = $row->Number;
        }

        $mysqli->close();
        return $player;
    }

    public static function listPlayerClub($ClubID) {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");
        
        $query = "SELECT * FROM player p, club c where p.ClubID='$ClubID'and p.ClubID = c.ClubID";
        $result = $mysqli->query($query);
        $listPlayer = array();
        if ($result) 
        {            
            foreach ($result as $row) {
                $player = new PlayerModel();
                $player->PlayerID = $row["PlayerID"];
                $player->FullName = $row["FullName"]; 
                $player->Position = $row["Position"];
                $player->Number = $row["Number"]; 
                $player->Nationality = $row["Nationality"]; 
                $player->ClubName=$row["ClubName"];  
                $listPlayer[] = $player; //add an item into array 
            }
        }
        $mysqli->close();
        return $listPlayer;
    }

    public static function delete($PlayerID)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");

        $query1 = "DELETE FROM match_players  WHERE PlayerID = $PlayerID";
        $mysqli->query($query1);

        $query = " DELETE FROM player WHERE PlayerID=$PlayerID";
        $r = 0;
        if ($mysqli->query($query))       
            $r = 1;       
        
        $mysqli->close();
        return $r;
        
    }

    public static function updatePlayer($PlayerID, $FullName, $Position, $Number, $Nationality, $ClubID, $DOB)
    {
        $mysqli = connect();
        $mysqli->query("SET NAMES utf8");

        $query = "UPDATE player 
        SET FullName = '$FullName', 
        Position = '$Position',  
            Number = '$Number', 
            Nationality='$Nationality', 
            ClubID='$ClubID', 
            DOB='$DOB'
            where PlayerID= $PlayerID";

        $result = $mysqli->query($query);

        $mysqli->close();
        return $result;
        
    }
}
?>
