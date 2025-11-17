<?php

$dsn = 'mysql:host=localhost;dbname=foo_link;charset=utf8';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foo-Link - Découvrez et partagez des recettes délicieuses</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">


    <script>
    // tailwind.config.js
    module.exports = {
        theme: {
            extend: {
                fontFamily: {
                    cursive: ['"Dancing Script"', 'cursive'], // Add your cursive font
                },
            },
        },
        plugins: [],
    };
    </script>
</head>

<body class="bg-gray-900 ">

    <div class="fixed z-50 top-0 left-0 w-full bg-white/10 text-white backdrop-blur-md shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="text-xl font-bold text-blue-500 font-cursive flex gap-2">

                    <svg class="h-6 w-6" fill="none" viewBox="0 -4.83 52 52" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group_49" data-name="Group 49" transform="translate(-788.946 -1785.428)">
                            <path id="Path_131" data-name="Path 131"
                                d="M814.946,1793.095a24,24,0,0,0-24,24h48A24,24,0,0,0,814.946,1793.095Z"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                            <line id="Line_51" data-name="Line 51" x2="48" transform="translate(790.946 1825.761)"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                            <line id="Line_52" data-name="Line 52" y2="5.667" transform="translate(814.946 1787.428)"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
                        </g>
                    </svg>
                    Foo-Link


                </div>
                <!-- Navigation Links -->
                <nav class="hidden md:flex space-x-6">
                    <a href="index.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">Accueil</a>
                    <a href="views/apropos.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">A
                        propos</a>
                    <a href="views/contact.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">Contact</a>
                    <a href="views/dashboard/index.php"
                        class="text-white py-1 px-2 rounded-lg shadow bg-blue-500">Ajouter</a>
                </nav>
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <section class="bg-gray-900 text-white">
        <div class=" relative grid min-h-screen px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    <span class="text-blue-500 font-cursive">Foo-Link</span>, le repère pour toutes vos recettes
                </h1>
                <p class="max-w-2xl mb-6 font-light  lg:mb-8 md:text-lg lg:text-xl text-gray-300">From
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi iste eligendi praesentium temporibus,
                    enim omnis. Veniam nulla, reiciendis optio expedita, quas dolore corrupti natus inventore labore
                    distinctio similique eveniet consectetur..</p>
                <div
                    class="border-2 inline rounded-full p-3 border-b-2 border-blue-500 hover:bg-blue-500 transition ease-in duration-30">

                    <a href="#"
                        class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                        En Savoir plus
                        <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>


            </div>
            <div class="absolute inset-s0 right-24 top-32">
                <img src="assets/images/fried-flour-7622536_1280.jpg" class="rounded-3xl shadow-lg shadow-gray-700 "
                    style="height: 400px; width: 500px;" alt="mockup">
            </div>
        </div>
    </section>

    <!-- <div class="flex items-center justify-center h-screen bg-gray-900">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-white">Bienvenue sur <span class="text-blue-500">Foo-Link</span></h1>
            <p class="mt-4 text-lg text-gray-400">Découvrez et partagez des recettes délicieuses.</p>
            <div class="mt-6">
                <div
                    class=" border-2 inline rounded-full p-3 border-b-2 border-blue-500 hover:bg-blue-500 transition ease-in duration-300">
                    <a href="" class=" px-6 py-3 text-white  text-gray-800">
                        En savoir plus
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <section class="relative flex items-center justify-center">
        <!-- hero content goes here (z-auto / z-0) -->
        <div class="text-center -z-10 h-80 py-64n zs-0 lg:mx-64 md:mx-32 sm:mx-16">
            <h1 class="text-7xl mx-10 font-bold text-white">Trouvez les <span class="text-blue-500"> recettes
                    cuisines</span> qui vont faire fondre votre coeur
            </h1>

        </div>
        <img class="absolute inset-0 -z-20 h-full w-full object-cover" src="assets/images/fried-flour-7622536_1280.jpg"
            alt="Background image" />
    </section>
    <!-- Hero Section -->
    <section class="bg-gray-900 text-white  to-surface py-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-foreground">
                Recherchez vos <span class="text-blue-500">recettes</span> et vos catégories
            </h1>
            <p class="text-lg md:text-xl text-muted mb-8">
                Rejoignez notre communauté de passionnés de cuisine et explorez des milliers de recettes
            </p>
            <div class="max-w-2xl mx-auto">
                <div class="relative">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5 text-blue-500" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    <input type="text" placeholder="Rechercher une recette, un ingrédient..."
                        class="w-full pl-12 pr-4 py-4 rounded-full border-2 border-border bg-surface focus:border-primary focus:outline-none text-black bg-transparent border border-blue-500">
                </div>
            </div>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <button
                    class="px-4 py-2 bg-surface border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white transition ease-in duration-300 rounded-full text-sm hover:bg-surface-secondary transition-colors text-foreground">
                    Entrées</button>
                <button
                    class="px-4 py-2 bg-surface border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white transition ease-in duration-300 rounded-full text-sm hover:bg-surface-secondary transition-colors text-foreground">
                    Plats</button>
                <button
                    class="px-4 py-2 bg-surface border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white transition ease-in duration-300 rounded-full text-sm hover:bg-surface-secondary transition-colors text-foreground">
                    Desserts</button>
                <button
                    class="px-4 py-2 bg-surface border border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white transition ease-in duration-300 rounded-full text-sm hover:bg-surface-secondary transition-colors text-foreground">
                    Boissons</button>
            </div>
        </div>
    </section>

    <section class="bg-gray-800 w-full overflow-x-auto text-white mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-foreground">Recettes populaires</h2>
            <a href="recettes.html" class="text-primary hover:text-primary-hover font-semibold">Voir toutes →</a>
        </div>
        <div class="grids flex scroll-smooth overflow-x-auto w-full 3 gap-6">


            <a href="recette.html"
                class="bg-surface rounded-xl overflow-hidden border border-blue-500 shadow hover:shadow-lg transition duration-300 ease-in">
                <div class="relative h-48 bg-surface-secondary">
                    <img src="assets/images/pie-8396728_1280.jpg" alt="Tarte aux pommes"
                        class="w-full h-full object-cover">
                    <div
                        class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs font-semibold ">
                        Desserts</div>
                </div>
                <div class="p-5 bg-gray-900">
                    <h3 class="text-xl font-bold mb-2 text-blue-500">Tarte aux pommes caramélisées</h3>
                    <div class="flex items-center gap-4 text-sm text-muted">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>45 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span></span>
                            <span>Moyen</span>
                        </div>
                    </div>
                </div>
            </a>


            <a href="recette.html"
                class="bg-surface rounded-xl overflow-hidden border border-blue-500 shadow hover:shadow-lg transition duration-300 ease-in">
                <div class="relative h-48 bg-surface-secondary">
                    <img src="assets/images/tart-6011609_1280.jpg" alt="Tarte aux pommes"
                        class="w-full h-full object-cover">
                    <div
                        class="absolute top-3 right-3 bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs font-semibold ">
                        Entrée</div>
                </div>
                <div class="p-5 bg-gray-900">
                    <h3 class="text-xl font-bold mb-2 text-blue-500">Pomme à la viande hachée</h3>
                    <div class="flex items-center gap-4 text-sm text-muted">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>45 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span></span>
                            <span>Moyen</span>
                        </div>
                    </div>
                </div>
            </a>


            <a href="recette.html"
                class="bg-surface rounded-xl overflow-hidden border border-blue-500 shadow hover:shadow-lg transition duration-300 ease-in">
                <div class="relative h-48 bg-surface-secondary">
                    <img src="assets/images/burgers-8743798_1280.jpg" alt="Tarte aux pommes"
                        class="w-full h-full object-cover">
                    <div
                        class="absolute z-30 top-3 right-3 bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs font-semibold ">
                        Plat</div>
                </div>
                <div class="p-5 bg-gray-900">
                    <h3 class="text-xl font-bold mb-2 text-blue-500">Escalope de poulet</h3>
                    <div class="flex items-center gap-4 text-sm text-muted">
                        <div class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            <span>45 min</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span></span>
                            <span>Moyen</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Featured Categories Section -->
    <section class="w-full mx-auto bg-gray-900 text-white px-4 sm:px-6 lg:px-8 py-12">
        <h2 class="text-3xl font-bold mb-8 text-foreground">Catégories populaires</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

            <a href="recettes.html"
                class="bg-surface border border-blue-500 hover:bg-blue-500 transition ease-in duration-300 rounded-xl p-6 text-center hover:shadow-lg ">
                <div class="text-4xl mb-3"></div>
                <h3 class="font-bold text-foreground">Entrées</h3>
                <p class="text-sm text-muted mt-1">450 recettes</p>
            </a>
            <a href="recettes.html"
                class="border border-blue-500 hover:bg-blue-500 transition ease-in duration-300 rounded-xl p-6 text-center">
                <div class="text-4xl mb-3"></div>
                <h3 class="font-bold text-foreground">Plats</h3>
                <p class="text-sm text-muted mt-1">2,100 recettes</p>
            </a>


            <a href="recettes.html"
                class="bg-surface border border-blue-500 hover:bg-blue-500 transition ease-in duration-300 rounded-xl p-6 text-center hover:shadow-lg ">
                <div class="text-4xl mb-3"></div>
                <h3 class="font-bold text-foreground">Desserts</h3>
                <p class="text-sm text-muted mt-1">1,800 recettes</p>
            </a>

            <a href="recettes.html"
                class="bg-surface border border-blue-500 hover:bg-blue-500 transition ease-in duration-300 rounded-xl p-6 text-center hover:shadow-lg ">
                <div class="text-4xl mb-3"></div>
                <h3 class="font-bold text-foreground">Boissons</h3>
                <p class="text-sm text-muted mt-1">650 recettes</p>
            </a>
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

    <script>
    function toggleMenu() {
        // Add mobile menu toggle logic here
        alert('Menu mobile - À implémenter');
    }
    </script>
</body>

</html>