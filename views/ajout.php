<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include __DIR__ . '/partials/head.php'; ?>
</head>
<body class="site-dark page-ajout">
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <!-- Hero -->
  <section class="bg-surface-secondary py-12 px-4">
    <div class="max-w-4xl mx-auto text-center">
      <h1 class="text-4xl font-bold mb-4 text-foreground">Ajouter une recette</h1>
      <p class="text-muted">Partagez votre recette avec la communauté</p>
    </div>
  </section>

  <!-- Form -->
  <section class="max-w-4xl mx-auto px-4 py-12">
    <div class="bg-surface border border-border rounded-xl p-8">
      <form class="space-y-8">
        <!-- Basic Info -->
        <div>
          <h2 class="text-2xl font-bold mb-6 text-foreground">Informations de base</h2>
          <div class="space-y-4">
            <div>
              <label class="block text-sm font-semibold mb-2 text-foreground">Titre de la recette *</label>
              <input type="text" class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Ex: Tarte aux pommes maison">
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-semibold mb-2 text-foreground">Catégorie *</label>
                <select class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none">
                  <option>Sélectionner...</option>
                  <option>Entrées</option>
                  <option>Plats</option>
                  <option>Desserts</option>
                  <option>Boissons</option>
                </select>
              </div>
              <div>
                <label class="block text-sm font-semibold mb-2 text-foreground">Difficulté *</label>
                <select class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none">
                  <option>Sélectionner...</option>
                  <option>Facile</option>
                  <option>Moyen</option>
                  <option>Difficile</option>
                </select>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-semibold mb-2 text-foreground">Temps de préparation *</label>
                <input type="text" class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Ex: 30 min">
              </div>
              <div>
                <label class="block text-sm font-semibold mb-2 text-foreground">Nombre de portions *</label>
                <input type="number" class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Ex: 4">
              </div>
            </div>

            <div>
              <label class="block text-sm font-semibold mb-2 text-foreground">Description</label>
              <textarea rows="3" class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Décrivez votre recette..."></textarea>
            </div>

            <div>
              <label class="block text-sm font-semibold mb-2 text-foreground">Image de la recette</label>
              <input type="file" class="w-full px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none">
            </div>
          </div>
        </div>

        <!-- Ingredients -->
        <div>
          <h2 class="text-2xl font-bold mb-6 text-foreground">Ingrédients</h2>
          <div class="space-y-3">
            <div class="flex gap-2">
              <input type="text" class="flex-1 px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Ex: 500g de farine">
              <button type="button" class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600">🗑️</button>
            </div>
            <div class="flex gap-2">
              <input type="text" class="flex-1 px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Ex: 3 œufs">
              <button type="button" class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600">🗑️</button>
            </div>
          </div>
          <button type="button" class="mt-4 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/90">+ Ajouter un ingrédient</button>
        </div>

        <!-- Instructions -->
        <div>
          <h2 class="text-2xl font-bold mb-6 text-foreground">Étapes de préparation</h2>
          <div class="space-y-3">
            <div class="flex gap-2">
              <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
              <textarea rows="2" class="flex-1 px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Décrivez l'étape 1..."></textarea>
              <button type="button" class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 self-start">🗑️</button>
            </div>
            <div class="flex gap-2">
              <span class="flex-shrink-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
              <textarea rows="2" class="flex-1 px-4 py-3 border border-border rounded-lg focus:border-primary focus:outline-none" placeholder="Décrivez l'étape 2..."></textarea>
              <button type="button" class="px-4 py-3 bg-red-500 text-white rounded-lg hover:bg-red-600 self-start">🗑️</button>
            </div>
          </div>
          <button type="button" class="mt-4 px-4 py-2 bg-secondary text-white rounded-lg hover:bg-secondary/90">+ Ajouter une étape</button>
        </div>

        <!-- Submit -->
        <div class="flex gap-4 pt-6">
          <button type="submit" class="flex-1 bg-primary text-white py-3 rounded-lg hover:bg-primary-hover transition-colors font-semibold">
            Publier la recette
          </button>
          <button type="button" class="px-6 py-3 border border-border rounded-lg hover:bg-surface-secondary transition-colors">
            Annuler
          </button>
        </div>
      </form>
    </div>
  </section>

  <?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
