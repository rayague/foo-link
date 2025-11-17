<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Foo-Link</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-900">
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
                    <a href="../index.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">Accueil</a>
                    <a href="apropos.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">A
                        propos</a>
                    <a href="/views/contact.php"
                        class="text-white py-1 px-2 hover:bg-blue-500 transition ease-in duration-300 hover:text-white rounded-lg hover:text-blue-500">Contact</a>
                    <a href="dashboard/index.php" class="text-white py-1 px-2 rounded-lg shadow bg-blue-500">Ajouter</a>
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

    <!-- Hero -->
    <section class="bg-surface-secondary pt-44  pb-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl text-white font-bold mb-6 text-foreground">Inscrivez-vous</h1>
            <p class="text-lg text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit beatae
                dolorum
                harum animi dolore. Nesciunt dignissimos illum dolor ipsum labore ab aperiam quia dolorem voluptas hic
                deserunt, fuga magni provident.</p>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="max-w-2xl mx-auto text-white px-4 py-12">

        <div class="bg-gray-800 border border-blue-500 rounded-xl p-8 shadow-lg shadow-gray-700">
            <h1 class="text-4xl md:text-5xl text-center font-bold mb-6 text-foreground">Inscription</h1>


            <form class="max-w-md mx-auto">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="floating_email" id="floating_email"
                        class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="floating_password" id="floating_password"
                        class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                        placeholder=" " required />
                    <label for="floating_password"
                        class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Mot
                        de passe</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="repeat_password" id="floating_repeat_password"
                        class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                        placeholder=" " required />
                    <label for="floating_repeat_password"
                        class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Confirmer
                        mot de passe</label>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="floating_first_name" id="floating_first_name"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="floating_first_name"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Prénom
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="floating_last_name" id="floating_last_name"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="floating_last_name"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nom
                        </label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="floating_phone" id="floating_phone"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="floating_phone"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Téléphone
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="floating_company" id="floating_company"
                            class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                            placeholder=" " required />
                        <label for="floating_company"
                            class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Catégorie
                        </label>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-3 mb-4 rounded-lg mt-8 hover:bg-blue-700 transition ease-in font-semibold">
                    Inscription
                </button>
                <a href="connexion.php" class="text-blue-300  underline underline-offset-4">J'ai déjà
                    un
                    compte?
                    Me
                    connecter</a>
            </form>

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