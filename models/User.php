<?php
require_once __DIR__ . '/Database.php';

class User extends Database
{
    public function exists($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function create($email, $password, $firstname, $lastname)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password, firstname, lastname)
            VALUES (?, ?, ?, ?)");
        return $stmt->execute([$email, $hash, $firstname, $lastname]);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $data)
    {
        if (!empty($data['password'])) {
            $hash = password_hash($data['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                $data['firstname'],
                $data['lastname'],
                $data['email'],
                $hash,
                $id
            ]);
        }

        $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['firstname'],
            $data['lastname'],
            $data['email'],
            $id
        ]);
    }
    // Récupère les top contributeurs (utilisateurs ayant posté le plus de recettes)
    public function getTopContributeurs($limit = 5)
    {
        $sql = "SELECT u.id, u.firstname, u.lastname, COUNT(r.id) as nb_recettes FROM users u LEFT JOIN recettes r ON u.id = r.user_id GROUP BY u.id, u.firstname, u.lastname ORDER BY nb_recettes DESC LIMIT ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
