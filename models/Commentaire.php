<?php
require_once 'Database.php';

class Commentaire extends Database {
    public function getAllByRecette($recette_id) {
        $sql = "SELECT * FROM commentaires WHERE recette_id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$recette_id]);
        return $stmt->fetchAll();
    }
    public function create($contenu, $recette_id, $user_id) {
        $sql = "INSERT INTO commentaires (contenu, recette_id, user_id) VALUES (?, ?, ?)";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$contenu, $recette_id, $user_id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM commentaires WHERE id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$id]);
    }
}
