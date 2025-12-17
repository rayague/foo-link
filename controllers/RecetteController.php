<?php
require_once __DIR__ . '/../models/Recette.php';
require_once __DIR__ . '/../models/Like.php';
require_once __DIR__ . '/../models/Commentaire.php';
if (session_status() === PHP_SESSION_NONE) session_start();

class RecetteController {
    private $recetteModel;

    public function __construct() {
        $this->recetteModel = new Recette();
    }
    public function index() {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $perPage = 6;
        $offset = ($page - 1) * $perPage;
        $search = isset($_GET['search']) ? trim($_GET['search']) : '';
        if ($search !== '') {
            $recettes = $this->recetteModel->getPaginatedBySearch($offset, $perPage, $search);
            $total = $this->recetteModel->countBySearch($search);
        } else {
            $recettes = $this->recetteModel->getPaginated($offset, $perPage);
            $total = $this->recetteModel->countAll();
        }
        $totalPages = ceil($total / $perPage);
        include __DIR__ . '/../views/dashboard/recettes.php';
    }
    public function show($id) {
        $this->recetteModel->incrementViews($id);
        $recette = $this->recetteModel->getById($id);
        $likeModel = new Like();
        $commentaireModel = new Commentaire();
        $nbLikes = $likeModel->countByRecette($id);
        $nbCommentaires = $this->recetteModel->countCommentaires($id);
        $nbVues = $this->recetteModel->getViews($id);
        $usersLiked = $likeModel->usersByRecette($id);
        $commentaires = $commentaireModel->getAllByRecette($id);
        include __DIR__ . '/../views/recette.php';
    }
    public function create($data) {
        $this->recetteModel->create($data['titre'], $data['description'], $data['categorie_id'], $data['user_id']);
        header('Location: ../views/dashboard/recettes.php');
        exit;
    }
    public function update($id, $data) {
        $this->recetteModel->update($id, $data['titre'], $data['description'], $data['categorie_id']);
        header('Location: ../views/dashboard/recettes.php');
        exit;
    }
    public function delete($id) {
        $this->recetteModel->delete($id);
        header('Location: ../views/dashboard/recettes.php');
        exit;
    }
}

$controller = new RecetteController();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'add') {
        $controller->create($_POST);
    } elseif ($action === 'edit') {
        $controller->update($_POST['id'], $_POST);
    } elseif ($action === 'delete') {
        $controller->delete($_POST['id']);
    }
} elseif (isset($_GET['id'])) {
    $controller->show($_GET['id']);
} else {
    $controller->index();
}
