<?php
require_once __DIR__ . '/models/Recette.php';
require_once __DIR__ . '/models/Like.php';
require_once __DIR__ . '/models/Commentaire.php';
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
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-scaleIn { animation: scaleIn 0.6s ease-out forwards; }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-950 via-purple-950 to-slate-900 min-h-screen text-white antialiased overflow-x-hidden">
    <?php include __DIR__ . '/views/partials/navbar.php'; ?>
    
    <!-- HERO MODERNE -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-purple-500/20 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 4s;"></div>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <!-- Logo/Title -->
                <div class="animate-fadeInUp mb-8">
                    <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black mb-6">
                        <span class="gradient-text">Foo-Link</span>
                    </h1>
                    <p class="text-xl sm:text-2xl lg:text-3xl text-gray-300 font-light mb-4">
                        La communauté des <span class="text-purple-400 font-semibold">gourmets créatifs</span>
                    </p>
                    <p class="text-base sm:text-lg text-gray-400 max-w-2xl mx-auto">
                        Découvrez, partagez et commentez des milliers de recettes du monde entier
                    </p>
                </div>

                <!-- CTA Buttons -->
                <div class="animate-fadeInUp flex flex-col sm:flex-row gap-4 justify-center items-center mb-12" style="animation-delay: 0.2s;">
                    <a href="<?= $root ?>/recettes.php" 
                       class="group px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 rounded-full font-semibold text-lg shadow-2xl hover:shadow-purple-500/50 transition-all duration-300 hover:scale-105">
                        <span class="flex items-center gap-2">
                            🍳 Découvrir les recettes
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </a>
                    <a href="<?= $root ?>/inscription.php" 
                       class="px-8 py-4 glass-card rounded-full font-semibold text-lg hover:bg-white/10 transition-all duration-300">
                        Rejoindre la communauté
                    </a>
                </div>

                <!-- Search Bar -->
                <div class="animate-fadeInUp max-w-2xl mx-auto" style="animation-delay: 0.4s;">
                    <form action="<?= $root ?>/recettes.php" method="get">
                        <div class="glass-card rounded-2xl p-2 shadow-2xl">
                            <div class="flex items-center gap-3">
                                <svg class="w-6 h-6 text-purple-400 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input name="search" type="text" 
                                       placeholder="Recherchez une recette, un ingrédient, une inspiration..." 
                                       class="flex-1 bg-transparent text-white placeholder-gray-400 py-3 focus:outline-none text-lg">
                                <button type="submit" 
                                        class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 rounded-xl font-semibold hover:scale-105 transition-transform">
                                    Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Stats -->
                <div class="animate-fadeInUp grid grid-cols-3 gap-6 max-w-3xl mx-auto mt-16" style="animation-delay: 0.6s;">
                    <div class="glass-card rounded-xl p-6">
                        <div class="text-4xl font-bold gradient-text mb-2">5K+</div>
                        <div class="text-sm text-gray-400">Recettes</div>
                    </div>
                    <div class="glass-card rounded-xl p-6">
                        <div class="text-4xl font-bold gradient-text mb-2">12K+</div>
                        <div class="text-sm text-gray-400">Membres</div>
                    </div>
                    <div class="glass-card rounded-xl p-6">
                        <div class="text-4xl font-bold gradient-text mb-2">50K+</div>
                        <div class="text-sm text-gray-400">Commentaires</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- RECETTES POPULAIRES -->
    <section class="py-24 bg-gradient-to-b from-slate-950 to-slate-900 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-4">
                    <span class="gradient-text">Recettes Populaires</span>
                </h2>
                <p class="text-gray-400 text-lg">Les recettes les plus appréciées par la communauté</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($popularRecettes as $recette): ?>
                <article class="group card-hover glass-card rounded-3xl overflow-hidden">
                    <div class="relative h-56 overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
                        <img src="<?= $root ?>/assets/images/pie-8396728_1280.jpg" 
                             alt="<?php echo htmlspecialchars($recette['titre']); ?>" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 z-20">
                            <span class="glass-card px-3 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                                👁️ <?php echo $recette['vues']; ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2 group-hover:text-purple-400 transition-colors">
                            <?php echo htmlspecialchars($recette['titre']); ?>
                        </h3>
                        <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                            <?php echo htmlspecialchars($recette['description']); ?>
                        </p>
                        <a href="<?= $root ?>/recette.php?id=<?php echo $recette['id']; ?>" 
                           class="inline-flex items-center gap-2 text-purple-400 font-semibold hover:gap-3 transition-all">
                            Voir la recette
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            
            <div class="text-center mt-12">
                <a href="<?= $root ?>/recettes.php" 
                   class="inline-flex items-center gap-2 px-8 py-4 glass-card rounded-full font-semibold hover:bg-white/10 transition-all">
                    Voir toutes les recettes
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- TOP CONTRIBUTEURS -->
    <section class="py-24 bg-gradient-to-br from-purple-950 via-slate-900 to-blue-950 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDE2YzAgMi4yMS0xLjc5IDQtNCA0cy00LTEuNzktNC00IDEuNzktNCA0LTQgNCAxLjc5IDQgNHoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-20"></div>
        
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-4">
                    <span class="gradient-text">Top Contributeurs</span>
                </h2>
                <p class="text-gray-400 text-lg">Les chefs qui inspirent notre communauté</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php foreach ($topUsers as $index => $user): ?>
                <div class="card-hover glass-card rounded-3xl p-8 text-center group">
                    <div class="relative inline-block mb-6">
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full blur-xl opacity-50 group-hover:opacity-75 transition-opacity"></div>
                        <div class="relative w-24 h-24 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-4xl font-bold text-white shadow-2xl">
                            <?php echo strtoupper(substr($user['firstname'],0,1)) . strtoupper(substr($user['lastname'],0,1)); ?>
                        </div>
                        <?php if ($index === 0): ?>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg">
                            <span class="text-lg">👑</span>
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-2">
                        <?php echo htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?>
                    </h3>
                    
                    <div class="glass-card rounded-full px-4 py-2 inline-block">
                        <span class="text-purple-400 font-semibold"><?php echo $user['nb_recettes']; ?></span>
                        <span class="text-gray-400 text-sm ml-1">recettes</span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- CATEGORIES -->
    <section class="py-24 bg-slate-950">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-4">
                    Explorez par <span class="gradient-text">Catégorie</span>
                </h2>
                <p class="text-gray-400 text-lg">Trouvez l'inspiration selon vos envies du moment</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <a href="<?= $root ?>/recettes.php?categorie=entrees" 
                   class="card-hover glass-card rounded-3xl p-8 text-center group">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🥗</div>
                    <h3 class="text-xl font-bold text-white mb-2">Entrées</h3>
                    <p class="text-gray-400 text-sm">Démarrez en beauté</p>
                </a>
                
                <a href="<?= $root ?>/recettes.php?categorie=plats" 
                   class="card-hover glass-card rounded-3xl p-8 text-center group">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🍝</div>
                    <h3 class="text-xl font-bold text-white mb-2">Plats</h3>
                    <p class="text-gray-400 text-sm">Le cœur du repas</p>
                </a>
                
                <a href="<?= $root ?>/recettes.php?categorie=desserts" 
                   class="card-hover glass-card rounded-3xl p-8 text-center group">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🍰</div>
                    <h3 class="text-xl font-bold text-white mb-2">Desserts</h3>
                    <p class="text-gray-400 text-sm">La touche sucrée</p>
                </a>
                
                <a href="<?= $root ?>/recettes.php?categorie=boissons" 
                   class="card-hover glass-card rounded-3xl p-8 text-center group">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">🍹</div>
                    <h3 class="text-xl font-bold text-white mb-2">Boissons</h3>
                    <p class="text-gray-400 text-sm">Rafraîchissant</p>
                </a>
            </div>
        </div>
    </section>

    <!-- AVIS RECENTS -->
    <section class="py-24 bg-gradient-to-b from-slate-900 to-slate-950">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold mb-4">
                    <span class="gradient-text">Avis Récents</span>
                </h2>
                <p class="text-gray-400 text-lg">Ce que notre communauté partage</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($lastComments as $comment): ?>
                <div class="card-hover glass-card rounded-3xl p-8 group">
                    <div class="flex items-start gap-4 mb-4">
                        <div class="relative">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center text-lg font-bold text-white shadow-lg">
                                <?php echo strtoupper(substr($comment['user_firstname'],0,1)) . strtoupper(substr($comment['user_lastname'],0,1)); ?>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 rounded-full border-2 border-slate-900"></div>
                        </div>
                        <div class="flex-1">
                            <h4 class="font-semibold text-white">
                                <?php echo htmlspecialchars($comment['user_firstname'] . ' ' . $comment['user_lastname']); ?>
                            </h4>
                            <span class="text-xs text-gray-500"><?php echo date('d/m/Y', strtotime($comment['created_at'])); ?></span>
                        </div>
                        <div class="text-2xl opacity-50">💬</div>
                    </div>
                    
                    <p class="text-gray-300 italic mb-4 leading-relaxed">
                        « <?php echo htmlspecialchars($comment['contenu']); ?> »
                    </p>
                    
                    <div class="flex items-center gap-2 text-sm">
                        <span class="text-gray-500">Sur</span>
                        <span class="font-semibold text-purple-400">
                            <?php echo htmlspecialchars($comment['recette_titre']); ?>
                        </span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/views/partials/footer.php'; ?>
</body>

</html>
