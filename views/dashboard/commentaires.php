<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    <title>Commentaires — Dashboard</title>
    <style>
    /* small local animations */
    @keyframes fadein { from { opacity: 0; transform: translateY(8px);} to { opacity:1; transform:none;} }
    .animate-fadein{animation:fadein .45s ease both}
    </style>
</head>

<body class="site-dark">
    

    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-6">

            <!-- Sidebar (fixed width) -->
            <aside class="w-72 hidden lg:block">
                <?php include __DIR__ . '/../partials/dashboard_sidebar.php'; ?>
            </aside>

            <!-- Content: full remaining width -->
            <main class="flex-1">
                <header class="mb-4">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Commentaires</h1>
                    <p class="text-muted mt-1">Modérez les commentaires, répondez ou supprimez si nécessaire.</p>
                </header>

                <?php
                require_once __DIR__ . '/../../models/Commentaire.php';
                require_once __DIR__ . '/../../models/Recette.php';
                require_once __DIR__ . '/../../models/User.php';
                if (session_status() === PHP_SESSION_NONE) session_start();
                $commentModel = new Commentaire();
                $recetteModel = new Recette();
                $userModel = new User();
                $user_id = $_SESSION['user_id'] ?? null;
                ?>

                <!-- Search / filter -->
                <form method="get" class="mb-6 flex w-full max-w-xl">
                    <input type="text" name="q" value="<?php echo isset($q) ? htmlspecialchars($q) : ''; ?>" placeholder="Rechercher par utilisateur, texte ou recette..." class="search-input flex-1 px-4 py-2 rounded-l-md">
                    <button type="submit" class="btn-primary px-6 py-2 rounded-r-md">Filtrer</button>
                </form>

                <!-- Comments list -->
                <div class="space-y-4">
                    <?php if (!empty($commentaires) && is_array($commentaires)): ?>
                        <?php foreach ($commentaires as $c):
                            $comment_id = $c['id'];
                            $author = $userModel->getById($c['user_id'] ?? 0);
                            $rec = $recetteModel->getById($c['recette_id'] ?? 0);
                            $authorName = $author ? ($author['firstname'].' '.$author['lastname']) : 'Anonyme';
                            $recetteTitle = $rec ? $rec['titre'] : 'Recette supprimée';
                        ?>
                        <article class="card-surface p-4 rounded-lg flex flex-col sm:flex-row gap-4 items-start animate-fadein">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-full bg-surface-secondary flex items-center justify-center text-sm font-bold text-foreground">
                                    <?php echo strtoupper(substr($author['firstname'] ?? 'A',0,1) . substr($author['lastname'] ?? '',0,1)); ?>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="text-sm text-muted">Par <strong class="text-foreground"><?php echo htmlspecialchars($authorName); ?></strong> — sur <em class="text-muted"><?php echo htmlspecialchars($recetteTitle); ?></em></div>
                                        <p class="mt-2 text-white"><?php echo nl2br(htmlspecialchars($c['contenu'] ?? '')); ?></p>
                                    </div>
                                    <div class="ml-4 flex-shrink-0 text-right">
                                        <div class="text-xs text-muted"><?php echo htmlspecialchars($c['created_at'] ?? ''); ?></div>
                                        <div class="mt-3 flex flex-col gap-2">
                                            <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/CommentaireController.php">
                                                <input type="hidden" name="id" value="<?php echo $comment_id; ?>">
                                                <button name="action" value="approve" class="btn-primary w-full">Approuver</button>
                                            </form>
                                            <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/CommentaireController.php" onsubmit="return confirm('Supprimer ce commentaire ?');">
                                                <input type="hidden" name="id" value="<?php echo $comment_id; ?>">
                                                <button name="action" value="delete" class="btn-ghost w-full">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="py-12 text-center text-muted">Aucun commentaire à modérer.</div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if (!empty($totalPages) && $totalPages > 1): ?>
                <div class="flex justify-center mt-8">
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1; ?><?php echo isset($q) && $q ? '&q=' . urlencode($q) : ''; ?>" class="btn-ghost px-3 py-2 rounded-l-md">&laquo; Précédent</a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=<?php echo $i; ?><?php echo isset($q) && $q ? '&q=' . urlencode($q) : ''; ?>" class="px-3 py-2 border <?php echo $i == $page ? 'btn-primary text-white' : 'btn-ghost text-muted'; ?>"> <?php echo $i; ?> </a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?php echo $page + 1; ?><?php echo isset($q) && $q ? '&q=' . urlencode($q) : ''; ?>" class="btn-ghost px-3 py-2 rounded-r-md">Suivant &raquo;</a>
                        <?php endif; ?>
                    </nav>
                </div>
                <?php endif; ?>

            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

</body>

</html>