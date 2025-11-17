<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une recette - Foo-Link</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            background: '#FDFBF7',
            foreground: '#2C1810',
            surface: '#FFFFFF',
            'surface-secondary': '#F5F1E8',
            border: '#E8DCC8',
            muted: '#8B7355',
            primary: '#C17F4A',
            'primary-hover': '#A66D3D',
            secondary: '#6B8E4E',
            accent: '#D4913E',
          }
        }
      }
    }
  </script>
</head>
<body class="bg-background text-foreground">
  <!-- Navigation -->
  <nav class="bg-surface border-b border-border sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <a href="index.html" class="text-2xl font-bold text-primary">Foo-Link</a>
        <div class="hidden md:flex items-center gap-6">
          <a href="index.html" class="text-foreground hover:text-primary transition-colors font-medium">Accueil</a>
          <a href="recettes.html" class="text-foreground hover:text-primary transition-colors font-medium">Recettes</a>
          <a href="apropos.html" class="text-foreground hover:text-primary transition-colors font-medium">À propos</a>
          <a href="contact.html" class="text-foreground hover:text-primary transition-colors font-medium">Contact</a>
          <a href="ajout.html" class="bg-primary text-white px-4 py-2 rounded-lg">Ajouter une recette</a>
        </div>
      </div>
    </div>
  </nav>

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

  <!-- Footer -->
  <footer class="bg-surface border-t border-border py-8 mt-12">
    <div class="max-w-7xl mx-auto px-4 text-center text-sm text-muted">
      <p>&copy; 2025 Foo-Link. Tous droits réservés.</p>
    </div>
  </footer>
</body>
</html>
