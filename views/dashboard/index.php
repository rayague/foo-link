<?php
// Toujours démarrer la session en haut du script
if (session_status() === PHP_SESSION_NONE) session_start();

// Vérification de la connexion
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("Location: ../connexion.php");
    exit();
}

// Protection admin optionnelle
if (isset($requireAdmin) && $requireAdmin === true) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: ../index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    <title>Dashboard — Foo-Link</title>
</head>
<body class="bg-gray-100">
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <div class="flex flex-col md:flex-row">
        <?php include __DIR__ . '/../partials/dashboard_sidebar.php'; ?>

        <main class="flex-1 p-6">
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
                <p class="text-sm text-gray-600">Bienvenue sur votre tableau de bord — résumé rapide</p>
            </header>

            <?php
            // Optimize: fetch aggregated counts in a single query to reduce DB roundtrips
            require_once __DIR__ . '/../../models/Database.php';
            require_once __DIR__ . '/../../models/Recette.php';
            require_once __DIR__ . '/../../models/Commentaire.php';
            require_once __DIR__ . '/../../models/Categorie.php';

            $db = new Database();
            $sql = "SELECT 
                (SELECT COUNT(*) FROM recettes) as total_recettes,
                (SELECT COUNT(*) FROM commentaires) as total_commentaires,
                (SELECT COUNT(*) FROM categories) as total_categories
                ";
            $row = $db->query($sql)->fetch();
            $totRecettes = $row['total_recettes'] ?? 0;
            $totCommentaires = $row['total_commentaires'] ?? 0;
            $totCategories = $row['total_categories'] ?? 0;

            // Recent recipes (use model pagination to limit results)
            $recModel = new Recette();
            $recent = $recModel->getPaginated(0, 6);
            ?>

            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Recettes</h3>
                    <p class="mt-2 text-gray-600"><?= htmlspecialchars($totRecettes); ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Commentaires</h3>
                    <p class="mt-2 text-gray-600"><?= htmlspecialchars($totCommentaires); ?></p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold">Total Catégories</h3>
                    <p class="mt-2 text-gray-600"><?= htmlspecialchars($totCategories); ?></p>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold mb-3">Récentes publications</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($recent)): ?>
                        <?php foreach ($recent as $r): ?>
                        <article class="bg-white rounded-lg p-4 shadow">
                            <h3 class="font-bold"><?= htmlspecialchars($r['titre']); ?></h3>
                            <p class="text-sm text-gray-600 mt-2"><?= htmlspecialchars(substr($r['description'] ?? '', 0, 140)); ?><?php if (strlen($r['description'] ?? '') > 140) echo '...'; ?></p>
                            <div class="mt-3 text-xs text-muted">Publié le <?= htmlspecialchars(substr($r['created_at'] ?? '',0,10)); ?></div>
                        </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-muted">Aucune recette récente.</div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>

</body>
</html>