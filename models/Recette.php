<?php
require_once __DIR__ . '/Database.php';

class Recette extends Database {
    public function incrementViews($id) {
        $sql = "UPDATE recettes SET vues = vues + 1 WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getViews($id) {
        $sql = "SELECT vues FROM recettes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? $row['vues'] : 0;
    }

    public function countCommentaires($recette_id) {
		$sql = "SELECT COUNT(*) as total FROM commentaires WHERE recette_id = ?";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute([$recette_id]);
		$row = $stmt->fetch();
		return $row ? $row['total'] : 0;
        }
    public function getPopularRecettes($limit = 5) {
        $sql = "SELECT * FROM recettes ORDER BY vues DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTopRecettes($limit = 5) {
        $sql = "SELECT r.id, r.titre, COUNT(l.id) as nb_likes FROM recettes r LEFT JOIN likes l ON r.id = l.recette_id GROUP BY r.id, r.titre ORDER BY nb_likes DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM recettes";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetch();
        return $row ? $row['total'] : 0;
    }

    public function getAll() {
        $sql = "SELECT * FROM recettes";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT * FROM recettes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($titre, $description, $categorie_id, $user_id) {
        $sql = "INSERT INTO recettes (titre, description, categorie_id, user_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $description, $categorie_id, $user_id]);
    }

    public function update($id, $titre, $description, $categorie_id) {
        $sql = "UPDATE recettes SET titre = ?, description = ?, categorie_id = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $description, $categorie_id, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM recettes WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function getPaginated($offset, $limit) {
        $sql = "SELECT * FROM recettes ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getPaginatedBySearch($offset, $limit, $search = '') {
        $sql = "SELECT * FROM recettes WHERE titre LIKE :search OR description LIKE :search ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countBySearch($search = '') {
        $sql = "SELECT COUNT(*) as total FROM recettes WHERE titre LIKE :search OR description LIKE :search";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row ? $row['total'] : 0;
    }
}
