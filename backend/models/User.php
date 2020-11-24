<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 11/10/2020
 * Time: 7:37 PM
 */
require_once 'models/Model.php';
class User extends Model{
    public $username;
    public $password;
    public function getUser($username){
        $sql_select_once = $this->conn->prepare("select * from users where username = :username");
        $sql_select_once->execute([
            ':username' => $username
        ]);
        $user = $sql_select_once->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    public function getRegister(){
        $sql_insert = $this->conn->prepare("insert into users (username,password)
                                                values (:username,:password)");
        $obj_insert = $sql_insert->execute([
            ':username' => $this->username,
            ':password' => $this->password
        ]);
        return $obj_insert;
    }
    public function getLogin(){
        $sql_select = $this->conn->prepare("select * from users where username = :username
                                                    and password = :password");
        $sql_select->execute([
            ':username' => $this->username,
            ':password' => md5($this->password)
        ]);
        $user = $sql_select->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}
?>