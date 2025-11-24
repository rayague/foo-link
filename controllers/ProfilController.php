<?php
require_once '../models/Utilisateur.php';

class ProfilController {
    private $userModel;
    public function __construct() {
        $this->userModel = new User();
    }
    public function show($id) {
        $user = $this->userModel->getById($id);
        include '../views/dashboard/profil.php';
    }
    public function update($id, $data) {
        $this->userModel->update($id, $data);
        header('Location: profil.php');
    }
}
