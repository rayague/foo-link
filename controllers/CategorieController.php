<?php
require_once '../models/Categorie.php';

class CategorieController {
    private $categorieModel;
    public function __construct() {
        $this->categorieModel = new Categorie();
    }
    public function index() {
        $categories = $this->categorieModel->getAll();
        include '../views/dashboard/categories.php';
    }
    public function create($data) {
        $this->categorieModel->create($data['nom']);
        header('Location: categories.php');
    }
    public function update($id, $data) {
        $this->categorieModel->update($id, $data['nom']);
        header('Location: categories.php');
    }
    public function delete($id) {
        $this->categorieModel->delete($id);
        header('Location: categories.php');
    }
}
