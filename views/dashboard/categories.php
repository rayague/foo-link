<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    <title>Catégories — Dashboard</title>
    <style>
    @keyframes fadein { from { opacity: 0; transform: translateY(8px);} to { opacity:1; transform:none;} }
    .animate-fadein{animation:fadein .45s ease both}
    </style>
</head>

<body class="site-dark">
    

    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-6">

            <!-- Sidebar -->
            <aside class="w-72 hidden lg:block">
                <?php include __DIR__ . '/../partials/dashboard_sidebar.php'; ?>
            </aside>

            <!-- Main -->
            <main class="flex-1">
                <header class="mb-4">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Catégories</h1>
                    <p class="text-muted mt-1">Gérez les catégories affichées sur le site.</p>
                </header>

                <?php
                require_once __DIR__ . '/../../models/Categorie.php';
                if (session_status() === PHP_SESSION_NONE) session_start();
                $catModel = new Categorie();
                if (!isset($categories) || !is_array($categories)) {
                    $categories = $catModel->getAll();
                }
                ?>

                <!-- Grid of categories -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $categorie): ?>
                            <article class="card-surface p-4 rounded-lg animate-fadein">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="text-lg font-semibold text-white"><?php echo htmlspecialchars($categorie['nom']); ?></h3>
                                    </div>
                                    <div class="flex gap-2">
                                        <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/CategorieController.php">
                                            <input type="hidden" name="id" value="<?php echo $categorie['id']; ?>">
                                            <button name="action" value="edit" class="btn-ghost">✏️</button>
                                        </form>
                                        <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/CategorieController.php" onsubmit="return confirm('Supprimer cette catégorie ?');">
                                            <input type="hidden" name="id" value="<?php echo $categorie['id']; ?>">
                                            <button name="action" value="delete" class="btn-ghost">🗑️</button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center text-muted py-8">Aucune catégorie trouvée.</div>
                    <?php endif; ?>
                </div>

                <!-- Add category form -->
                <section class="mt-8 max-w-md">
                    <div class="card-surface p-4 rounded-lg">
                        <h4 class="text-lg font-semibold mb-3">Ajouter une catégorie</h4>
                        <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/CategorieController.php" class="flex gap-2">
                            <input type="text" name="nom" placeholder="Nom de la catégorie" class="flex-1 p-2 border rounded" required>
                            <button name="action" value="add" class="btn-primary px-4 py-2 rounded">Ajouter</button>
                        </form>
                    </div>
                </section>
                <?php
                // Show stats after the list so the category list is visible first
                require_once __DIR__ . '/../../controllers/StatController.php';
                $statCtrl = new StatController();
                $statCtrl->index();
                ?>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

</body>

</html>