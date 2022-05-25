<?php
class UserModel extends DB{
    
    public function getUser($username = '', $password = ''){
        if(!empty($username) && !empty($password)){
            $sql = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password' AND `UType_id`=2";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }else{
            $sql = "SELECT * FROM `user`";
            $rows = mysqli_query($this->conn, $sql);
            $arr = [];
            while($row = mysqli_fetch_array($rows)){
                $arr[] = $row;
            }
            return $arr;
        }
    }

    
}

?>