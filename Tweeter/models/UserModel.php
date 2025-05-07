<?php

    class UserModel {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function createNewUser($username, $password) {
            $insert = "INSERT INTO users (username, password) 
                        VALUES (:username, :password)";

            $stmt = $this->db->prepare($insert);
            $stmt->bindValue(':username', $username);
            $stmt->bindValue(':password', $password);

            return $stmt->execute();
        }

        public function getUserByUsername($username) {
            $select = "SELECT * FROM users 
                        WHERE username = :username";

            $stmt = $this->db->prepare($select);
            $stmt->bindValue(':username', $username);
            $stmt->execute();

            return $stmt->fetch();
        }
    }
?>

