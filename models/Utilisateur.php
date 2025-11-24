<?php
require_once "models/Database.php";

class User extends Database
{
    // Vérifier si un utilisateur existe et retourner ses infos
    public function exists($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // Code pour ajouter un utilisateur
    public function create($email, $password, $firstname, $lastname)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (email, password, firstname, lastname)
            VALUES (?, ?, ?, ?)");
        return $stmt->execute([$email, $hash, $firstname, $lastname]);
    }

    // Récupérer un utilisateur par son id
    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Mettre à jour un utilisateur
    public function update($id, $data)
    {
        $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['firstname'],
            $data['lastname'],
            $data['email'],
            $id
        ]);
    }
}