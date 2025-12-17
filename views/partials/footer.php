<footer class="bg-gray-950 text-white w-[90%] my-10 rounded-lg mx-auto py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <div class="text-xl font-bold text-blue-500 font-cursive flex gap-2">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" d="M3 3h18M3 12h18M3 21h18"></path>
                    </svg>
                    Foo-Link
                </div>
                <p class="text-gray-400 mt-2">Votre plateforme de partage de recettes.</p>
            </div>
            <div class="md:col-span-2">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Liens utiles</h3>
                        <ul class="text-gray-300 text-sm space-y-2">
                                    <li><a href="<?= isset($root) ? $root : '' ?>/index.php" class="hover:text-blue-400 transition">Accueil</a></li>
                                    <li><a href="<?= isset($root) ? $root : '' ?>/recettes.php" class="hover:text-blue-400 transition">Recettes</a></li>
                                    <li><a href="<?= isset($root) ? $root : '' ?>/inscription.php" class="hover:text-blue-400 transition">Inscription</a></li>
                                    <li><a href="<?= isset($root) ? $root : '' ?>/connexion.php" class="hover:text-blue-400 transition">Connexion</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Nous suivre</h3>
                        <ul class="text-gray-300 text-sm space-y-2">
                            <li><a href="#" class="hover:text-blue-400 transition">Facebook</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition">Twitter</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition">Instagram</a></li>
                            <li><a href="#" class="hover:text-blue-400 transition">YouTube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-400 text-sm">
            &copy; 2023 Foo-Link. Tous droits réservés.
        </div>
    </div>
</footer>
