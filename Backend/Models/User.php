<?php
require_once 'models/Model.php';

class User extends Model {
    public function registerUser($username,$pass_hash,$name,$phone,$address,$email,$filename){
        $sql_insert = "insert into users(username,password,name,phone,address,email,avatar) values (:username,:password,:name,:phone,:address,:email,:filename)";
        $obj_insert = $this->connection->prepare($sql_insert);
        $inserts = [
            ':username' => $username,
            ':password' => $pass_hash,
            ':name'=>$name,
            ':phone'=>$phone,
            ':address'=>$address,
            ':email'=>$email,
            ':filename'=>$filename
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