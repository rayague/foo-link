<?php
require_once __DIR__ . '/models/Recette.php';
require_once __DIR__ . '/models/Like.php';
$require_once __DIR__ . '/models/Commentaire.php';
require_once __DIR__ . '/models/User.php';
$dsn = 'mysql:host=localhost;dbname=foo_link;charset=utf8';
$user = 'root';
$password = '';
try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}

$recetteModel = new Recette();
$likeModel = new Like();
$commentaireModel = new Commentaire();
$userModel = new User();
$popularRecettes = $recetteModel->getPopularRecettes(8);
$topRecettes = $recetteModel->getTopRecettes(8);
$lastComments = $commentaireModel->getLastCommentaires(5);
$topUsers = $userModel->getTopContributeurs(5);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/views/partials/head.php'; ?>
</head>

<body class="site-dark bg-gradient-to-br from-gray-900 via-blue-950 to-gray-900 min-h-screen text-white antialiased">
    <?php include __DIR__ . '/views/partials/navbar.php'; ?>
    <!-- HERO -->
    <section class="relative bg-black/20">
        <div class="bg-cover bg-center h-[56vh] sm:h-[68vh] flex items-center" style="background-image:url('<?= $root ?>/assets/images/fried-flour-7622536_1280.jpg')">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl bg-gradient-to-br from-black/40 to-black/20 p-6 sm:p-10 rounded-2xl shadow-2xl backdrop-blur text-center sm:text-left">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white mb-3 sm:mb-4">
                        <span class="font-cursive text-blue-400">Foo-Link</span>
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-4 sm:mb-6">La communauté des gourmets créatifs — découvrez, partagez et commentez des recettes du monde entier.</p>
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-3 sm:gap-4 justify-center sm:justify-start">
                        <a href="<?= $root ?>/recettes.php" class="btn-primary">Découvrir les recettes</a>
                        <a href="<?= $root ?>/inscription.php" class="btn-ghost">Rejoindre la communauté</a>
                    </div>
                    <form action="<?= $root ?>/recettes.php" method="get" class="mt-4 sm:mt-6">
                        <div class="flex items-center gap-2 bg-white/5 rounded-full p-2 max-w-xl mx-auto sm:mx-0">
                            <input name="search" type="text" placeholder="Rechercher une recette, un ingrédient..." class="flex-1 bg-transparent placeholder-gray-300 text-white px-4 py-2 rounded-full focus:outline-none" />
                            <button type="submit" class="btn-primary">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- CARROUSEL RECETTES POPULAIRES -->
    <section class="py-16 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">Recettes les plus vues</h2>
                <a href="<?= $root ?>/recettes.php"
                    class="text-blue-400 hover:text-blue-600 font-semibold">Voir toutes →</a>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php foreach ($popularRecettes as $recette): ?>
                <article class="bg-white/5 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition">
                    <div class="h-44 bg-cover bg-center" style="background-image:url('<?= $root ?>/assets/images/pie-8396728_1280.jpg')"></div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-300 mb-1"><?php echo htmlspecialchars($recette['titre']); ?></h3>
                        <p class="text-gray-300 text-sm mb-3 line-clamp-3"><?php echo htmlspecialchars($recette['description']); ?></p>
                        <div class="flex items-center justify-between text-xs text-gray-400">
                            <span>👁️ <?php echo $recette['vues']; ?> vues</span>
                            <a href="<?= $root ?>/recette.php?id=<?php echo $recette['id']; ?>" class="text-blue-400 hover:underline">Voir</a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- SECTION TOP CONTRIBUTEURS -->
    <section class="py-16 bg-gradient-to-br from-blue-900 to-blue-700 text-white">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Top contributeurs</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($topUsers as $user): ?>
                <div class="bg-white/10 rounded-xl p-6 flex flex-col items-center shadow-lg">
                    <div class="w-20 h-20 rounded-full bg-blue-200 flex items-center justify-center text-3xl font-bold text-blue-700 mb-4">
                        <?php echo strtoupper(substr($user['firstname'],0,1)) . strtoupper(substr($user['lastname'],0,1)); ?>
                    </div>
                    <div class="text-lg font-semibold mb-1"><?php echo htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?></div>
                    <div class="text-blue-200 text-sm">Recettes : <?php echo $user['nb_recettes']; ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- SECTION RECHERCHE & CATEGORIES -->
    <section class="bg-gray-900 py-16">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white">Recherchez vos <span class="text-blue-500">recettes</span>
                catégories
            </h2>
            <p class="text-lg md:text-xl text-blue-200 mb-8">Explorez des milliers de recettes et trouvez l'inspiration selon vos envies
                !
            </p>
            <div class="max-w-2xl mx-auto mb-8">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-blue-400 w-5 h-5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Rechercher une recette, un ingrédient..."
                        class="w-full pl-12 pr-4 py-4 rounded-full border-2 border-blue-500 bg-gray-800 text-white focus:border-blue-400 focus:outline-none">
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <button class="px-4 py-2 bg-blue-900 border border-blue-500 text-blue-200 hover:bg-blue-500 hover:text-white transition rounded-full text-sm">Entrées
                </button>
                <button class="px-4 py-2 bg-blue-900 border border-blue-500 text-blue-200 hover:bg-blue-500 hover:text-white transition rounded-full text-sm">Plats
                </button>
                <button class="px-4 py-2 bg-blue-900 border border-blue-500 text-blue-200 hover:bg-blue-500 hover:text-white transition rounded-full text-sm">Desserts
                </button>
                <button class="px-4 py-2 bg-blue-900 border border-blue-500 text-blue-200 hover:bg-blue-500 hover:text-white transition rounded-full text-sm">Boissons
                </button>
            </div>
        </div>
    </section>
    <!-- SECTION AVIS RECENTS -->
    <section class="py-16 bg-gray-950 text-white">
        <div class="max-w-5xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8">Avis récents</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($lastComments as $comment): ?>
                <div class="bg-white/10 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 rounded-full bg-blue-200 flex items-center justify-center text-lg font-bold text-blue-700">
                            <?php echo strtoupper(substr($comment['user_firstname'],0,1)) . strtoupper(substr($comment['user_lastname'],0,1)); ?>
                        </div>
                        <div class="font-semibold"><?php echo htmlspecialchars($comment['user_firstname'] . ' ' . $comment['user_lastname']); ?></div>
                        <span class="text-xs text-blue-200 ml-auto"><?php echo date('d/m/Y', strtotime($comment['created_at'])); ?></span>
                    </div>
                    <div class="text-blue-100 italic mb-2">« <?php echo htmlspecialchars($comment['contenu']); ?> »</div>
                    <div class="text-xs text-blue-300">Sur la recette : <span class="font-semibold text-blue-400"><?php echo htmlspecialchars($comment['recette_titre']); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include __DIR__ . '/views/partials/footer.php'; ?>
</body>

</html>