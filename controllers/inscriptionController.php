<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../helpers/csrf.php';
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !check_csrf_token($_POST['csrf_token'])) {
        die('Erreur de sécurité CSRF.');
    }

    $email      = trim($_POST["floating_email"] ?? '');
    $password   = trim($_POST["password"] ?? '');
    $password2  = trim($_POST["password2"] ?? '');
    $firstname  = trim($_POST["floating_first_name"] ?? '');
    $lastname   = trim($_POST["floating_last_name"] ?? '');

    $errors = [];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Adresse email invalide.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    if ($password !== $password2) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $userModel = new User();

            $userModel->query(
                "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    email VARCHAR(255) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    firstname VARCHAR(100) DEFAULT NULL,
                    lastname VARCHAR(100) DEFAULT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4"
            );

            if ($userModel->exists($email)) {
                echo "<p style='color:red'>Un compte avec cet email existe déjà.</p>";
            } else {
                $created = $userModel->create($email, $password, $firstname, $lastname);
                if ($created) {
                    header('Location: ../connexion.php');
                    exit;
                } else {
                    echo "<p style='color:red'>Impossible de créer le compte, réessayez plus tard.</p>";
                }
            }
        } catch (PDOException $e) {
            echo "Erreur : " . htmlspecialchars($e->getMessage());
        }
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red'>" . htmlspecialchars($error) . "</p>";
        }
    }
} else {
    echo "Méthode non autorisée.";
}