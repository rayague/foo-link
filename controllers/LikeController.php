<?php
require_once __DIR__ . '/../models/Like.php';
if (session_status() === PHP_SESSION_NONE) session_start();

$likeModel = new Like();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/connexion.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$recette_id = $_POST['recette_id'] ?? null;
$action = $_POST['action'] ?? null;

if ($recette_id && $action) {
    if ($action === 'like') {
        $likeModel->add($user_id, $recette_id);
    } elseif ($action === 'unlike') {
        $likeModel->remove($user_id, $recette_id);
    }
}
header('Location: ../views/dashboard/recettes.php');
exit;
