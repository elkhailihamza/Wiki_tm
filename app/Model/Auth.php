<?php

namespace app\model;

use core\Database\database;
use PDO;
use PDOException;

class Auth
{

    private $db;
    public function __construct()
    {
        $this->db = new database();
    }
    public function findEmail($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email';
        return $this->db->query($sql, [':email' => $email])['fetch'];
    }
    public function loginUser()
    {

    }
    public function registerUser($fname, $lname, $email, $pass, $role_id)
    {
        $sql = 'INSERT INTO `users`(`fname`, `lname`, `email`, `pass`, `role_id`) VALUES (:fname, :lname, :email, :pass, :role_id);';
        return $this->db->query($sql, [':fname' => $fname, ':lname' => $lname, ':email' => $email, ':pass' => $pass, ':role_id' => $role_id]);
    }
}