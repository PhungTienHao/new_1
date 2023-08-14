<?php
require_once 'models/Model.php';

class User extends Model {
    public function registerUser($username,$pass_hash){
        $sql_insert = "insert into users(username,password) values (:username,:password)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':username' => $username,
            ':password' => $pass_hash
        ];
        $is_register = $obj_insert->execute($inserts);
        return $is_register;
    }
    public function getUser($username){
        $sql_select_one ="select * from users where username=:username";
        $obj_select_one = $this->connection->prepare($sql_select_one);
        $selects=[
            ':username'=>$username
        ];
        $obj_select_one->execute($selects);
        $user=$obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}