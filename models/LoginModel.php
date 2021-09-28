<?php
require_once('db.php');
class LoginModel extends DBConnection
{
    public function __construct()
    {
        parent::connect();
    }
    public function login($email, $pass)
    {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
        $result = $this->conn->query($sql);
        return $result->fetchAll();
        // $arr = [];
        // while ($row = $result->fetch()) {
        //     $arr[] = $row;
        // }
        // return $arr;
    }
    public function register($name, $email, $phone, $address, $password)
    {
        $sql = "INSERT INTO users (name, email, phone, address, password) values (?, ?, ?, ?, ?)";
        $result = $this->conn->prepare($sql);
        $result->bindParam(1, $name);
        $result->bindParam(2, $email);
        $result->bindParam(3, $phone);
        $result->bindParam(4, $address);
        $result->bindParam(5, $password);
        $result->execute();
        return $result;
    }
}
