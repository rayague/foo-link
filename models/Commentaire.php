
<?php
require_once __DIR__ . '/Database.php';

class Commentaire extends Database {
    // Nombre total de commentaires
    public function countAll() {
        $sql = "SELECT COUNT(*) as total FROM commentaires";
        $stmt = $this->pdo->query($sql);
        $row = $stmt->fetch();
        return $row ? $row['total'] : 0;
    }

    // Récupère la liste des utilisateurs ayant commenté une recette
    public function usersByRecette($recette_id) {
        $sql = "SELECT DISTINCT u.id, u.firstname, u.lastname FROM commentaires c JOIN users u ON c.user_id = u.id WHERE c.recette_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$recette_id]);
        return $stmt->fetchAll();
    }
    public function getAllByRecette($recette_id) {
        $sql = "SELECT * FROM commentaires WHERE recette_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$recette_id]);
        return $stmt->fetchAll();
    }

    // Récupère les derniers commentaires avec infos utilisateur et recette
    public function getLastCommentaires($limit = 5) {
        $sql = "SELECT c.*, u.firstname as user_firstname, u.lastname as user_lastname, r.titre as recette_titre FROM commentaires c JOIN users u ON c.user_id = u.id JOIN recettes r ON c.recette_id = r.id ORDER BY c.created_at DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function create($contenu, $recette_id, $user_id) {
        $sql = "INSERT INTO commentaires (contenu, recette_id, user_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$contenu, $recette_id, $user_id]);
    }
    public function delete($id) {
        $sql = "DELETE FROM commentaires WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id]);
    }
}
