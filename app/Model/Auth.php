<?php

namespace app\model;

use core\Database\database;
use PDO;
use PDOException;
class Auth {

    private $db;
    public function __construct() {
        $this->db = new database();
    }
    public function findEmail($email) {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute([':email' => $email]);
    
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function loginUser() {

    }
    public function registerUser($fname, $lname, $email, $pass, $role_id) {
        $sql = 'INSERT INTO `users`(`fname`, `lname`, `email`, `pass`, `role_id`) VALUES (:fname, :lname, :email, :pass, :role_id);';
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
}