<?php

class TootModel {
    private $db;

    public function __construct() {
        require 'database/db.php';
        $this->db = $db;
    }

    // CREATE
    public function createNewToot($userId, $content) {
        $insert = "INSERT INTO toots (user_id, content) 
                    VALUES (:userId, :content)";

        $stmt = $this->db->prepare($insert);
        $stmt->bindValue(':userId', $userId);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    // READ
    public function getToot($id) {
        $select = "SELECT * FROM toots 
                    WHERE id = :id";

        $stmt = $this->db->prepare($select);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllToots() {
        $select = "SELECT * FROM toots 
                    JOIN users ON toots.user_id = users.user_id 
                    ORDER BY toots.id DESC";

        $stmt = $this->db->query($select);

        return $stmt->fetchAll();
    }

    // UPDATE
    public function updateToot($id, $newContent) {
        $update = "UPDATE toots 
                    SET content = :content 
                    WHERE id = :id";

        $stmt = $this->db->prepare($update);
        $stmt->bindValue(':content', $newContent);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    // DELETE
    public function deleteToot($id) {
        $delete = "DELETE FROM toots 
                    WHERE id = :id";

        $stmt = $this->db->prepare($delete);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
?>
