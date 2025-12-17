<?php
require_once __DIR__ . '/Database.php';

class Categorie extends Database {
        // Nombre total de catégories
        public function countAll() {
            $sql = "SELECT COUNT(*) as total FROM categories";
            $stmt = $this->pdo->query($sql);
            $row = $stmt->fetch();
            return $row ? $row['total'] : 0;
        }
    public function getAll() {
        $sql = "SELECT * FROM categories";
        return $this->query($sql)->fetchAll();
    }
    public function getById($id) {
        $sql = "SELECT * FROM categories WHERE id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($nom) {
        $sql = "INSERT INTO categories (nom) VALUES (?)";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$nom]);
    }
    public function update($id, $nom) {
        $sql = "UPDATE categories SET nom = ? WHERE id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$nom, $id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM categories WHERE id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$id]);
    }
}
