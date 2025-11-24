<?php

// Enable error reporting for development (disable in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $email      = trim($_POST["email"] ?? '');
        $password   = trim($_POST["password"] ?? '');
        $password2  = trim($_POST["password2"] ?? '');
        $firstname  = trim($_POST["firstname"] ?? '');
        $lastname   = trim($_POST["lastname"] ?? '');

            if ($password !== $password2) {
            $error = "Les mots de passe ne correspondent pas.";
            require "views/inscription.php";
            return;
        }


    $errors = [];


    // Validate email
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors[] = "Adresse email invalide.";
    // }

    if (strlen($password) < 6) {
        $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
    }

    if (empty($errors)) {
        // Hasher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Example: Save to database (PDO recommended)
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  


            $stmt = $pdo->prepare("CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, user_id INT NOT NULL, password) VALUES (?, ?, ?)");
            $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword]);

            echo "Inscription réussie !";
        } catch (PDOException $e) {
            echo "Erreur : " . htmlspecialchars($e->getMessage());
        }
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<p style='color:red'>" . htmlspecialchars($error) . "</p>";
        }
    }
} else {
    echo "Méthode non autorisée.";
}