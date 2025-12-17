<?php
require_once __DIR__ . '/../models/Categorie.php';

class CategorieController {
    private $categorieModel;
    public function __construct() {
        $this->categorieModel = new Categorie();
    }
    public function index() {
        $categories = $this->categorieModel->getAll();
        include __DIR__ . '/../views/dashboard/categories.php';
    }
    public function create($data) {
        $this->categorieModel->create($data['nom']);
        header('Location: ../views/dashboard/categories.php');
        exit;
    }
    public function update($id, $data) {
        $this->categorieModel->update($id, $data['nom']);
        header('Location: ../views/dashboard/categories.php');
        exit;
    }
    public function delete($id) {
        $this->categorieModel->delete($id);
        header('Location: ../views/dashboard/categories.php');
        exit;
    }
}

// Simple routing logic to handle form submissions and listing
$controller = new CategorieController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add') {
        $controller->create($_POST);
    } elseif ($action === 'edit') {
        $controller->update($_POST['id'], $_POST);
    } elseif ($action === 'delete') {
        $controller->delete($_POST['id']);
    }
} else {
    // Default: show the categories dashboard
    $controller->index();
}
