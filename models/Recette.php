<?php
require_once 'Database.php';

class Recette extends Database {
    public function getAll() {
        $sql = "SELECT * FROM recettes";
        return $this->query($sql)->fetchAll();
    }
    public function getById($id) {
        $sql = "SELECT * FROM recettes WHERE id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($titre, $description, $categorie_id, $user_id) {
        $sql = "INSERT INTO recettes (titre, description, categorie_id, user_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$titre, $description, $categorie_id, $user_id]);
    }
    public function update($id, $titre, $description, $categorie_id) {
        $sql = "UPDATE recettes SET titre = ?, description = ?, categorie_id = ? WHERE id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$titre, $description, $categorie_id, $id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM recettes WHERE id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$id]);
    }
}
