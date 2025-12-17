<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/partials/head.php'; ?>
</head>

<body class="site-dark page-apropos">
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Hero -->
    <section class="bg-surface-secondary text-white pt-44 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-foreground">À propos de <span
                    class="text-blue-500">Foo-Link</span></h1>
            <p class="text-lg text-gray-400">Votre communauté de passionnés de cuisine</p>
        </div>
    </section>

    <!-- Content -->
    <section class="max-w-4xl mx-auto px-4 py-12">
        <div class="prose prose-lg max-w-none">
            <h2 class="text-3xl font-bold mb-4 text-white">Notre mission</h2>
            <p class="text-gray-400 mb-6">Foo-Link est né de la passion pour la cuisine et le partage. Notre mission est
                de
                créer une plateforme où chacun peut découvrir, partager et célébrer l'art culinaire.</p>

            <h2 class="text-3xl font-bold mb-4 text-white mt-12">Notre histoire</h2>
            <p class="text-gray-400 mb-6">Fondée en 2024, Foo-Link rassemble aujourd'hui plus de 12,000 membres actifs
                qui
                partagent leur amour de la cuisine. De la recette traditionnelle aux créations modernes, notre
                communauté célèbre toutes les formes de gastronomie.</p>

            <h2 class="text-3xl font-bold mb-4 text-white mt-12">Nos valeurs</h2>
            <div class="grid md:grid-cols-2 gap-6 mt-6">
                <div
                    class="bg-surface border text-gray-400 border-blue-500 hover:bg-blue-500 duration-300 ease-in hover:text-white rounded-xl p-6">
                    <div class="text-3xl mb-3">🤝</div>
                    <h3 class="text-xl font-bold mb-2 text-white">Partage</h3>
                    <p>Nous croyons au pouvoir du partage des connaissances culinaires.</p>
                </div>
                <div
                    class="bg-surface border text-gray-400 border-blue-500 hover:bg-blue-500 duration-300 ease-in hover:text-white rounded-xl p-6">
                    <div class="text-3xl mb-3">🌟</div>
                    <h3 class="text-xl font-bold mb-2 text-white">Qualité</h3>
                    <p>Chaque recette est vérifiée pour garantir une expérience optimale.</p>
                </div>
                <div
                    class="bg-surface border text-gray-400 border-blue-500 hover:bg-blue-500 duration-300 ease-in hover:text-white rounded-xl p-6">
                    <div class="text-3xl mb-3">🌍</div>
                    <h3 class="text-xl font-bold mb-2 text-white">Diversité</h3>
                    <p>Nous célébrons toutes les cuisines du monde.</p>
                </div>
                <div
                    class="bg-surface border text-gray-400 border-blue-500 hover:bg-blue-500 duration-300 ease-in hover:text-white rounded-xl p-6">
                    <div class="text-3xl mb-3">💚</div>
                    <h3 class="text-xl font-bold mb-2 text-white">Communauté</h3>
                    <p>Notre force réside dans notre communauté bienveillante.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-950 text-white w-[90%] my-10 rounded-lg mx-auto py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <div class="text-xl font-bold text-blue-500 font-cursive flex gap-2">

                        <svg class="h-6 w-6" fill="none" viewBox="0 -4.83 52 52" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group_49" data-name="Group 49" transform="translate(-788.946 -1785.428)">
                                <path id="Path_131" data-name="Path 131"
                                    d="M814.946,1793.095a24,24,0,0,0-24,24h48A24,24,0,0,0,814.946,1793.095Z"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" />
                                <line id="Line_51" data-name="Line 51" x2="48" transform="translate(790.946 1825.761)"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" />
                                <line id="Line_52" data-name="Line 52" y2="5.667"
                                    transform="translate(814.946 1787.428)" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="4" />
                            </g>
                        </svg>
                        Foo-Link


                    </div>
                    <p class="text-muted text-sm">Votre plateforme de partage de recettes</p>
                </div>
                <div>
                    <h4 class="font-bold text-foreground mb-4">Navigation</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="index.html" class="text-muted hover:text-primary">Accueil</a></li>
                        <li><a href="recettes.html" class="text-muted hover:text-primary">Recettes</a></li>
                        <li><a href="apropos.html" class="text-muted hover:text-primary">À propos</a></li>
                        <li><a href="contact.html" class="text-muted hover:text-primary">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-foreground mb-4">Catégories</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="recettes.html" class="text-muted hover:text-primary">Entrées</a></li>
                        <li><a href="recettes.html" class="text-muted hover:text-primary">Plats</a></li>
                        <li><a href="recettes.html" class="text-muted hover:text-primary">Desserts</a></li>
                        <li><a href="recettes.html" class="text-muted hover:text-primary">Boissons</a></li>
                    </ul>
                </div>

            </div>
            <div class="mt-8 pt-8 border-t border-border text-center text-sm text-muted">
                <p>&copy; 2025 Foo-Link. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>

</html>