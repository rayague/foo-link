<?php
require_once __DIR__ . '/../models/User.php';

class ProfilController {
    private $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function show($id) {
        $user = $this->userModel->getById($id);
        include __DIR__ . '/../views/dashboard/profil.php';
    }
    public function update($id, $data) {
        $this->userModel->update($id, $data);
        header('Location: profil.php');
    }
}

// Simple router to handle POST from the profile form when the controller is called directly
$controller = new ProfilController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'update') {
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: profil.php');
            exit;
        }

        // basic validation: ensure passwords match when provided
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';
        if ($password !== '' && $password !== $password2) {
            // set a simple session flash message and redirect back
            if (session_status() === PHP_SESSION_NONE) session_start();
            $_SESSION['flash_error'] = 'Les mots de passe ne correspondent pas.';
            header('Location: profil.php');
            exit;
        }

        $data = [
            'firstname' => trim($_POST['firstname'] ?? ''),
            'lastname' => trim($_POST['lastname'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
        ];
        if ($password !== '') $data['password'] = $password;

        $controller->update($id, $data);
        exit;
    }
}
