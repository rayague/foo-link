<?php
// Service pour l'agrégation des statistiques du dashboard
require_once __DIR__ . '/../models/Recette.php';
require_once __DIR__ . '/../models/Commentaire.php';
require_once __DIR__ . '/../models/Categorie.php';
require_once __DIR__ . '/../models/Like.php';

class StatService {
    public function getDashboardStats() {
        $recetteModel = new Recette();
        $commentaireModel = new Commentaire();
        $categorieModel = new Categorie();
        $likeModel = new Like();
        return [
            'totalRecettes' => $recetteModel->countAll(),
            'totalCommentaires' => $commentaireModel->countAll(),
            'totalCategories' => $categorieModel->countAll(),
            'topRecettes' => $recetteModel->getTopRecettes(5),
            'likesParJour' => $likeModel->countByDay(7),
            // Ajouter d'autres stats ici
        ];
    }
}
