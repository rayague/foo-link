<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include __DIR__ . '/../partials/head.php'; ?>
    <title>Profil — Dashboard</title>
</head>
<body class="site-dark">
    <?php include __DIR__ . '/../partials/navbar.php'; ?>

    <div class="w-full px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex gap-6">

            <aside class="w-72 hidden lg:block">
                <?php include __DIR__ . '/../partials/dashboard_sidebar.php'; ?>
            </aside>

            <main class="flex-1">
                <header class="mb-4">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white">Mon profil</h1>
                    <p class="text-muted mt-1">Mettez à jour vos informations personnelles.</p>
                </header>

                <?php
                require_once __DIR__ . '/../../models/User.php';
                $userModel = new User();
                $user_id = $_SESSION['user_id'] ?? null;
                $user = null;
                if ($user_id) {
                    $user = $userModel->getById($user_id);
                }
                ?>

                <?php if (!empty($_SESSION['flash_error'])): ?>
                    <div class="mb-4 p-3 rounded bg-red-600 text-white"><?= htmlspecialchars($_SESSION['flash_error']); ?></div>
                    <?php unset($_SESSION['flash_error']); ?>
                <?php endif; ?>
                <?php if (!empty($_SESSION['flash_success'])): ?>
                    <div class="mb-4 p-3 rounded bg-green-600 text-white"><?= htmlspecialchars($_SESSION['flash_success']); ?></div>
                    <?php unset($_SESSION['flash_success']); ?>
                <?php endif; ?>

                <?php if (!$user): ?>
                    <div class="py-12 text-center text-muted">Utilisateur non connecté ou introuvable.</div>
                <?php else: ?>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="card-surface p-4 rounded-lg flex flex-col items-center text-center">
                            <img src="<?= !empty($user['avatar']) ? htmlspecialchars($user['avatar']) : (isset($root) ? $root : '') . '/assets/images/avatar-fallback.svg' ?>" alt="Avatar" class="w-28 h-28 rounded-full object-cover mb-3" loading="lazy" decoding="async">
                            <h2 class="font-semibold text-white"><?= htmlspecialchars(($user['firstname'] ?? '') . ' ' . ($user['lastname'] ?? '')); ?></h2>
                            <p class="text-muted text-sm">Membre depuis <?= htmlspecialchars(substr($user['created_at'] ?? '',0,10)); ?></p>
                        </div>

                        <div class="md:col-span-2">
                            <div class="card-surface p-4 rounded-lg">
                                <form method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/ProfilController.php" class="space-y-3">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <label class="text-sm text-muted">Prénom</label>
                                            <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname'] ?? ''); ?>" class="w-full p-2 border rounded" required>
                                        </div>
                                        <div>
                                            <label class="text-sm text-muted">Nom</label>
                                            <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname'] ?? ''); ?>" class="w-full p-2 border rounded" required>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="text-sm text-muted">Email</label>
                                        <input type="email" name="email" value="<?= htmlspecialchars($user['email'] ?? ''); ?>" class="w-full p-2 border rounded" required>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <label class="text-sm text-muted">Mot de passe (laisser vide pour conserver)</label>
                                            <input type="password" name="password" class="w-full p-2 border rounded">
                                        </div>
                                        <div>
                                            <label class="text-sm text-muted">Confirmer le mot de passe</label>
                                            <input type="password" name="password2" class="w-full p-2 border rounded">
                                        </div>
                                    </div>

                                    <div class="flex gap-2">
                                        <button type="submit" name="action" value="update" class="btn-primary px-4 py-2 rounded">Enregistrer</button>
                                        <a href="<?= isset($root) ? $root : '' ?>/views/recettes.php" class="btn-ghost px-4 py-2 rounded">Mes recettes</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <?php include __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>