<?php
require_once '../models/Recette.php';

class RecetteController {
    private $recetteModel;
    public function __construct() {
        $this->recetteModel = new Recette();
    }
    public function index() {
        $recettes = $this->recetteModel->getAll();
        include '../views/dashboard/recettes.php';
    }
    public function show($id) {
        $recette = $this->recetteModel->getById($id);
        include '../views/recette.php';
    }
    public function create($data) {
        $this->recetteModel->create($data['titre'], $data['description'], $data['categorie_id'], $data['user_id']);
        header('Location: recettes.php');
    }
    public function update($id, $data) {
        $this->recetteModel->update($id, $data['titre'], $data['description'], $data['categorie_id']);
        header('Location: recettes.php');
    }
    public function delete($id) {
        $this->recetteModel->delete($id);
        header('Location: recettes.php');
    }
}
