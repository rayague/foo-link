<?php
require_once __DIR__ . '/Database.php';

class Like extends Database {
        // Nombre de likes par jour sur les X derniers jours
        public function countByDay($days = 7) {
            $sql = "SELECT DATE(created_at) as jour, COUNT(*) as total FROM likes WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL ? DAY) GROUP BY jour ORDER BY jour ASC";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(1, (int)$days, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            $data = [];
            // Génère un tableau avec tous les jours même si 0 like
            for ($i = $days - 1; $i >= 0; $i--) {
                $date = date('Y-m-d', strtotime("-$i days"));
                $data[$date] = 0;
            }
            foreach ($result as $row) {
                $data[$row['jour']] = (int)$row['total'];
            }
            return $data;
        }
    // Vérifie si un utilisateur a liké une recette
    public function isLiked($user_id, $recette_id) {
        $sql = "SELECT * FROM likes WHERE user_id = ? AND recette_id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$user_id, $recette_id]);
        return $stmt->fetch() ? true : false;
    }
    // Ajoute un like
    public function add($user_id, $recette_id) {
        $sql = "INSERT INTO likes (user_id, recette_id) VALUES (?, ?)";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$user_id, $recette_id]);
    }
    // Retire un like
    public function remove($user_id, $recette_id) {
        $sql = "DELETE FROM likes WHERE user_id = ? AND recette_id = ?";
        $stmt = $this->prepare($sql);
        return $stmt->execute([$user_id, $recette_id]);
    }
    // Compte le nombre de likes d'une recette
    public function countByRecette($recette_id) {
        $sql = "SELECT COUNT(*) as total FROM likes WHERE recette_id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$recette_id]);
        $row = $stmt->fetch();
        return $row ? $row['total'] : 0;
    }
    // Liste les utilisateurs ayant liké une recette
    public function usersByRecette($recette_id) {
        $sql = "SELECT u.id, u.firstname, u.lastname FROM likes l JOIN users u ON l.user_id = u.id WHERE l.recette_id = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute([$recette_id]);
        return $stmt->fetchAll();
    }
}
