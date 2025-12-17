<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../helpers/csrf.php';

class ConnexionController {
    private $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function login($email, $password, $csrf_token) {
        if (!check_csrf_token($csrf_token)) {
            die('Erreur de sécurité CSRF.');
        }
        $user = $this->userModel->exists($email);
        if ($user && password_verify($password, $user['password'])) {
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $root = dirname(dirname($_SERVER['SCRIPT_NAME']));
            header('Location: ' . $root . '/views/dashboard/index.php');
            exit;
        } else {
            $error = 'Identifiants invalides';
            include __DIR__ . '/../views/connexion.php';
        }
    }
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) session_start();
        session_destroy();
        $root = dirname(dirname($_SERVER['SCRIPT_NAME']));
        header('Location: ' . $root . '/index.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $csrf_token = $_POST['csrf_token'] ?? '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    $controller = new ConnexionController();
    if ($action === 'login') {
        $controller->login($email, $password, $csrf_token);
    } elseif ($action === 'logout') {
        $controller->logout();
    } else {
        $root = dirname(dirname($_SERVER['SCRIPT_NAME']));
        header('Location: ' . $root . '/connexion.php');
        exit;
    }
} else {
    $root = dirname(dirname($_SERVER['SCRIPT_NAME']));
    header('Location: ' . $root . '/connexion.php');
    exit;
}
