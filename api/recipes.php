<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../models/Recette.php';
// If you need user info in the future, require the user model. Currently not used.
// require_once __DIR__ . '/../models/User.php';

$recetteModel = new Recette();

$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$perPage = isset($_GET['per_page']) ? max(1, min(50, (int)$_GET['per_page'])) : 9;
$offset = ($page - 1) * $perPage;
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $items = $recetteModel->getPaginatedBySearch($offset, $perPage, $search);
    $total = $recetteModel->countBySearch($search);
} else {
    $items = $recetteModel->getPaginated($offset, $perPage);
    $total = $recetteModel->countAll();
}

// return minimal data and next page info
$response = [
    'page' => $page,
    'per_page' => $perPage,
    'total' => (int)$total,
    'total_pages' => (int)ceil($total / $perPage),
    'data' => []
];

foreach ($items as $r) {
    $response['data'][] = [
        'id' => (int)$r['id'],
        'titre' => $r['titre'],
        'description' => $r['description'],
        'vues' => isset($r['vues']) ? (int)$r['vues'] : 0,
        'created_at' => $r['created_at'] ?? null,
        'categorie_id' => $r['categorie_id'] ?? null,
        'user_id' => $r['user_id'] ?? null
    ];
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
