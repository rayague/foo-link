<?php
// Contrôleur pour les statistiques et graphiques du dashboard
require_once __DIR__ . '/../services/StatService.php';

class StatController {
    public function index() {
        $service = new StatService();
        $stats = $service->getDashboardStats();
        include __DIR__ . '/../views/dashboard/partials/stats.php';
    }
    // Pour AJAX ou autres endpoints, ajouter ici
}
