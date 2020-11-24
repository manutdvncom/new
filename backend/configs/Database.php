<?php
//Tên class sẽ trùng với tên file
class Database {
    public function connection(){
        try {
           $conn = new PDO('mysql:host=localhost;dbname=php0720e_project;port=3306;charset=utf8',
               'root','');
           return $conn;
        } catch (PDOException $e){
            die('Lỗi: '.$e->getMessage());
        }
    }
}