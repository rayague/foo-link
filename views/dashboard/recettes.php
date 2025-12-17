<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    <title>Recettes — Dashboard</title>
    <style>
    /* local small animations kept here (single definition) */
    @keyframes fadein { from { opacity: 0; transform: translateY(12px);} to { opacity:1; transform:none;} }
    @keyframes pop { 0%{transform:scale(.96);opacity:0} 80%{transform:scale(1.03);opacity:1} 100%{transform:scale(1);opacity:1} }
    .animate-fadein{animation:fadein .5s ease both}
    .animate-pop{animation:pop .36s ease both}
    </style>
</head>

<body class="site-dark">
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-6">

            <!-- Sidebar (desktop only) -->
            <aside class="w-72 hidden lg:block">
                <?php include __DIR__ . '/../partials/dashboard_sidebar.php'; ?>
            </aside>

            <!-- Main content -->
            <main class="flex-1">
                <header class="mb-6">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Recettes</h1>
                    <div class="flex items-center justify-between gap-4">
                        <p class="text-muted mt-1">Liste des dernières recettes publiées. Utilisez la recherche pour filtrer.</p>
                        <div class="ml-auto">
                            <button id="openAddRecipe" class="btn-primary px-4 py-2 rounded">Ajouter une recette</button>
                        </div>
                    </div>
                </header>

                <!-- Stat graphs moved below the list for better UX -->

                <!-- Search -->
                <form method="get" action="<?= isset($root) ? $root : '' ?>/views/dashboard/recettes.php" class="mb-6 flex w-full max-w-xl">
                    <input type="text" name="search" value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>" placeholder="Rechercher une recette..." class="search-input flex-1 px-4 py-2 rounded-l-md">
                    <button type="submit" class="btn-primary px-6 py-2 rounded-r-md">Rechercher</button>
                </form>

                <?php
                require_once __DIR__ . '/../../models/Like.php';
                require_once __DIR__ . '/../../models/Recette.php';
                require_once __DIR__ . '/../../models/Commentaire.php';
                if (session_status() === PHP_SESSION_NONE) session_start();
                $likeModel = new Like();
                $recetteModel = new Recette();
                $commentaireModel = new Commentaire();
                $user_id = $_SESSION['user_id'] ?? null;
                ?>

                <!-- Cards grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (!empty($recettes) && is_array($recettes)): ?>
                        <?php foreach ($recettes as $recette):
                            $recette_id = $recette['id'];
                            $isLiked = $user_id ? $likeModel->isLiked($user_id, $recette_id) : false;
                            $nbLikes = $likeModel->countByRecette($recette_id);
                            $nbCommentaires = $recetteModel->countCommentaires($recette_id);
                            $nbVues = $recetteModel->getViews($recette_id);
                            $usersLiked = $likeModel->usersByRecette($recette_id);
                            $usersCommented = $commentaireModel->usersByRecette($recette_id);
                        ?>
                        <article class="card-surface rounded-2xl overflow-hidden shadow-sm p-4 flex flex-col justify-between animate-fadein">
                            <div>
                                <h2 class="text-lg font-semibold mb-2 text-white"><?php echo htmlspecialchars($recette['titre']); ?></h2>
                                <p class="text-muted text-sm mb-3 min-h-[48px]"><?php echo htmlspecialchars($recette['description']); ?></p>
                            </div>

                            <div class="mt-4 flex flex-col gap-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex gap-2 items-center">
                                        <span class="recipe-chip">👍 <strong class="ml-1"><?php echo $nbLikes; ?></strong></span>
                                        <span class="recipe-chip">💬 <strong class="ml-1"><?php echo $nbCommentaires; ?></strong></span>
                                        <span class="recipe-chip">👁️ <strong class="ml-1"><?php echo $nbVues; ?></strong></span>
                                    </div>
                                    <div class="flex gap-2">
                                        <?php if ($user_id): ?>
                                            <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/LikeController.php" class="inline">
                                                <input type="hidden" name="recette_id" value="<?php echo $recette_id; ?>">
                                                <?php if ($isLiked): ?>
                                                    <button name="action" value="unlike" class="btn-ghost">💔 Je n'aime plus</button>
                                                <?php else: ?>
                                                    <button name="action" value="like" class="btn-primary">❤️ J'aime</button>
                                                <?php endif; ?>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex gap-2 items-center">
                                        <?php if (!empty($usersLiked)): ?>
                                            <div class="flex -space-x-2">
                                                <?php foreach ($usersLiked as $u): ?>
                                                    <span class="inline-flex items-center justify-center w-7 h-7 rounded-full bg-blue-200 text-blue-700 font-bold text-xs" title="<?php echo htmlspecialchars($u['firstname'].' '.$u['lastname']); ?>"><?php echo strtoupper(substr($u['firstname'],0,1) . substr($u['lastname'],0,1)); ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="flex gap-2">
                                        <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/RecetteController.php">
                                            <input type="hidden" name="id" value="<?php echo $recette['id']; ?>">
                                            <button name="action" value="edit" class="btn-ghost">✏️ Modifier</button>
                                        </form>
                                        <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/RecetteController.php">
                                            <input type="hidden" name="id" value="<?php echo $recette['id']; ?>">
                                            <button name="action" value="delete" class="btn-ghost" onclick="return confirm('Supprimer cette recette ?');">🗑️ Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-span-full text-center text-muted py-12">Aucune recette trouvée.</div>
                    <?php endif; ?>
                </div>

                <!-- Pagination -->
                <?php if (!empty($totalPages) && $totalPages > 1): ?>
                <div class="flex justify-center mt-8">
                    <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <?php if ($page > 1): ?>
                            <a href="?page=<?php echo $page - 1; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" class="btn-ghost px-3 py-2 rounded-l-md">&laquo; Précédent</a>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="?page=<?php echo $i; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" class="px-3 py-2 border <?php echo $i == $page ? 'btn-primary text-white' : 'btn-ghost text-muted'; ?>"> <?php echo $i; ?> </a>
                        <?php endfor; ?>
                        <?php if ($page < $totalPages): ?>
                            <a href="?page=<?php echo $page + 1; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" class="btn-ghost px-3 py-2 rounded-r-md">Suivant &raquo;</a>
                        <?php endif; ?>
                    </nav>
                </div>
                <?php endif; ?>

                <?php
                require_once __DIR__ . '/../../controllers/StatController.php';
                $statCtrl = new StatController();
                $statCtrl->index();
                ?>

                <!-- Add recipe modal (hidden until opened) -->
                <div id="addRecipeModal" class="fixed inset-0 z-50 hidden items-center justify-center">
                    <div id="addRecipeBackdrop" class="absolute inset-0 bg-black/60"></div>
                    <div class="relative w-full max-w-2xl mx-4">
                        <div class="card-surface p-6 rounded-lg">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold">Ajouter une recette</h3>
                                <button id="closeAddRecipe" class="btn-ghost px-3 py-1 rounded">✕</button>
                            </div>
                            <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/RecetteController.php" class="space-y-3">
                                <input type="hidden" name="action" value="add">
                                <div>
                                    <label class="text-sm text-muted">Titre</label>
                                    <input type="text" name="titre" placeholder="Titre" class="w-full p-2 border rounded" required>
                                </div>
                                <div>
                                    <label class="text-sm text-muted">Description</label>
                                    <textarea name="description" placeholder="Description" class="w-full p-2 border rounded" required></textarea>
                                </div>
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label class="text-sm text-muted">ID Catégorie</label>
                                        <input type="number" name="categorie_id" placeholder="ID Catégorie" class="p-2 border rounded" required>
                                    </div>
                                    <div>
                                        <label class="text-sm text-muted">ID Utilisateur</label>
                                        <input type="number" name="user_id" placeholder="ID Utilisateur" class="p-2 border rounded" required>
                                    </div>
                                </div>
                                <div class="flex gap-2 justify-end">
                                    <button type="button" id="cancelAddRecipe" class="btn-ghost px-4 py-2 rounded">Annuler</button>
                                    <button type="submit" class="btn-primary px-4 py-2 rounded">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script>
    // Modal open/close logic for Add Recipe — toggle `.show` and log debug info
    (function(){
        const openBtn = document.getElementById('openAddRecipe');
        const modal = document.getElementById('addRecipeModal');
        const backdrop = document.getElementById('addRecipeBackdrop');
        const closeBtn = document.getElementById('closeAddRecipe');
        const cancelBtn = document.getElementById('cancelAddRecipe');
        function open(){ if(!modal){ console.warn('addRecipeModal not found'); return; } modal.classList.add('show'); document.body.style.overflow = 'hidden'; console.log('AddRecipe modal opened'); }
        function close(){ if(!modal){ console.warn('addRecipeModal not found'); return; } modal.classList.remove('show'); document.body.style.overflow = ''; console.log('AddRecipe modal closed'); }
        document.addEventListener('DOMContentLoaded', ()=>{
            if(!modal) console.warn('addRecipeModal missing in DOM');
            if(!openBtn) console.warn('openAddRecipe button missing in DOM');
        });
        if(openBtn) openBtn.addEventListener('click', (e)=>{ e.preventDefault(); open(); });
        if(closeBtn) closeBtn.addEventListener('click', (e)=>{ e.preventDefault(); close(); });
        if(cancelBtn) cancelBtn.addEventListener('click', (e)=>{ e.preventDefault(); close(); });
        if(backdrop) backdrop.addEventListener('click', close);
        document.addEventListener('keydown', (e)=>{ if(e.key === 'Escape') close(); });
    })();
    </script>

</body>

</html>