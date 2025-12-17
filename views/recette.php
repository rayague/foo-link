<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/partials/head.php'; ?>
</head>

<body class="site-dark page-recipe">
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Recipe Detail -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <!-- Recipe Header -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold mb-4 text-foreground">Tarte aux pommes caramélisées</h1>
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center gap-2">
                    <div class="flex">
                        <svg class="w-5 h-5 fill-accent text-accent" viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        <svg class="w-5 h-5 fill-accent text-accent" viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        <svg class="w-5 h-5 fill-accent text-accent" viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        <svg class="w-5 h-5 fill-accent text-accent" viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        <svg class="w-5 h-5 text-border" viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                    </div>
                    <span class="font-semibold">4.8</span>
                    <span class="text-muted">(124 avis)</span>
                </div>
                <span class="text-muted">•</span>
                <span class="text-muted">Par Marie Dupont</span>
            </div>

            <img src="/placeholder.svg?height=400&width=800" alt="Tarte aux pommes"
                class="w-full h-96 object-cover rounded-xl mb-6" loading="lazy" decoding="async" width="800" height="400">

            <div class="flex gap-4 mb-6">
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-hover">
                    <span>❤️</span>
                    <span>Ajouter aux favoris</span>
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2 bg-surface border border-border rounded-lg hover:bg-surface-secondary">
                    <span>📤</span>
                    <span>Partager</span>
                </button>
            </div>
        </div>

        <!-- Recipe Info Grid -->
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="bg-surface border border-border rounded-lg p-4 text-center">
                <div class="text-2xl mb-2">⏱️</div>
                <div class="text-sm text-muted">Préparation</div>
                <div class="font-bold">45 min</div>
            </div>
            <div class="bg-surface border border-border rounded-lg p-4 text-center">
                <div class="text-2xl mb-2">📊</div>
                <div class="text-sm text-muted">Difficulté</div>
                <div class="font-bold">Moyen</div>
            </div>
            <div class="bg-surface border border-border rounded-lg p-4 text-center">
                <div class="text-2xl mb-2">👥</div>
                <div class="text-sm text-muted">Portions</div>
                <div class="font-bold">6 personnes</div>
            </div>
        </div>

        <!-- Ingredients -->
        <div class="bg-surface border border-border rounded-xl p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
            <ul class="space-y-3">
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>1 pâte feuilletée</span>
                </li>
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>5 pommes Golden</span>
                </li>
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>100g de sucre</span>
                </li>
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>50g de beurre</span>
                </li>
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>1 sachet de sucre vanillé</span>
                </li>
                <li class="flex items-start gap-3">
                    <input type="checkbox" class="mt-1">
                    <span>1 cuillère à soupe de cannelle</span>
                </li>
            </ul>
        </div>

        <!-- Instructions -->
        <div class="bg-surface border border-border rounded-xl p-6 mb-8">
            <h2 class="text-2xl font-bold mb-4">Préparation</h2>
            <ol class="space-y-4">
                <li class="flex gap-4">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                        1</div>
                    <div>
                        <p class="font-semibold mb-1">Préparer les pommes</p>
                        <p class="text-muted">Épluchez et coupez les pommes en quartiers. Réservez.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                        2</div>
                    <div>
                        <p class="font-semibold mb-1">Caraméliser</p>
                        <p class="text-muted">Dans une poêle, faites fondre le beurre avec le sucre. Ajoutez les pommes
                            et laissez caraméliser 10 minutes.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                        3</div>
                    <div>
                        <p class="font-semibold mb-1">Assaisonner</p>
                        <p class="text-muted">Ajoutez la cannelle et le sucre vanillé. Mélangez délicatement.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                        4</div>
                    <div>
                        <p class="font-semibold mb-1">Assembler la tarte</p>
                        <p class="text-muted">Étalez la pâte dans un moule. Disposez les pommes caramélisées
                            harmonieusement.</p>
                    </div>
                </li>
                <li class="flex gap-4">
                    <div
                        class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                        5</div>
                    <div>
                        <p class="font-semibold mb-1">Cuire</p>
                        <p class="text-muted">Enfournez à 180°C pendant 25-30 minutes jusqu'à ce que la pâte soit dorée.
                        </p>
                    </div>
                </li>
            </ol>
        </div>

        <!-- Comments Section -->
        <div class="bg-surface border border-border rounded-xl p-6">
            <h2 class="text-2xl font-bold mb-6">Commentaires (124)</h2>

            <!-- Comment Form -->
            <div class="mb-8">
                <textarea
                    class="w-full p-4 border border-border rounded-lg focus:border-primary focus:outline-none mb-3"
                    rows="3" placeholder="Laissez un commentaire..."></textarea>
                <div class="flex justify-between items-center">
                    <div class="flex gap-1">
                        <button class="text-2xl hover:scale-110 transition-transform">⭐</button>
                        <button class="text-2xl hover:scale-110 transition-transform">⭐</button>
                        <button class="text-2xl hover:scale-110 transition-transform">⭐</button>
                        <button class="text-2xl hover:scale-110 transition-transform">⭐</button>
                        <button class="text-2xl hover:scale-110 transition-transform">⭐</button>
                    </div>
                    <button class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-hover">Publier</button>
                </div>
            </div>

            <!-- Sample Comments -->
            <div class="space-y-6">
                <div class="border-b border-border pb-6">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center font-bold text-primary">
                            J</div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="font-semibold">Julie Martin</span>
                                <div class="flex">
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <span class="text-sm text-muted">• Il y a 2 jours</span>
                            </div>
                            <p class="text-muted">Délicieuse recette ! Les pommes caramélisées sont parfaites. Toute la
                                famille a adoré.</p>
                        </div>
                    </div>
                </div>

                <div class="border-b border-border pb-6">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center font-bold text-primary">
                            P</div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="font-semibold">Paul Durand</span>
                                <div class="flex">
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 fill-accent text-accent" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    <svg class="w-3 h-3 text-border" viewBox="0 0 24 24">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                </div>
                                <span class="text-sm text-muted">• Il y a 5 jours</span>
                            </div>
                            <p class="text-muted">Très bonne recette, facile à suivre. J'ai ajouté un peu de citron pour
                                plus de pep's.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>