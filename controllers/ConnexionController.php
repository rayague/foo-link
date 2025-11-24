<?php
require_once '../models/Utilisateur.php';

class ConnexionController {
    private $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function login($email, $password) {
        $user = $this->userModel->exists($email);
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard/index.php');
        } else {
            $error = 'Identifiants invalides';
            include '../views/connexion.php';
        }
    }
    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }
}
