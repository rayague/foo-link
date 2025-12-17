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
        // Prefer the currently logged-in user; fall back to provided user_id if set
        $user_id = null;
        if (!empty($data['user_id'])) {
            $user_id = (int)$data['user_id'];
        }
        if (isset($_SESSION['user_id'])) {
            $user_id = (int)$_SESSION['user_id'];
        }

        // Verify user exists to avoid FK constraint errors
        require_once __DIR__ . '/../models/User.php';
        $userModel = new User();
        if ($user_id === null || !$userModel->getById($user_id)) {
            // Redirect back with an error if there's no valid user
            header('Location: ../views/dashboard/recettes.php?error=missing_user');
            exit;
        }

        $this->recetteModel->create($data['titre'], $data['description'], $data['categorie_id'], $user_id);
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
