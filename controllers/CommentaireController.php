<?php
require_once __DIR__ . '/../models/Commentaire.php';

class CommentaireController {
    private $commentaireModel;
    public function __construct() {
        $this->commentaireModel = new Commentaire();
    }
    public function index($recette_id) {
        $commentaires = $this->commentaireModel->getAllByRecette($recette_id);
        include __DIR__ . '/../views/dashboard/commentaires.php';
    }
    public function create($data) {
        $this->commentaireModel->create($data['contenu'], $data['recette_id'], $data['user_id']);
        header('Location: commentaires.php?recette_id=' . $data['recette_id']);
    }
    public function delete($id, $recette_id) {
        $this->commentaireModel->delete($id);
        header('Location: commentaires.php?recette_id=' . $recette_id);
    }
}
