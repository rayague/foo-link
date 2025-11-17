<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toutes les recettes - Foo-Link</title>
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
          <a href="recettes.html" class="text-primary font-medium">Recettes</a>
          <a href="apropos.html" class="text-foreground hover:text-primary transition-colors font-medium">À propos</a>
          <a href="contact.html" class="text-foreground hover:text-primary transition-colors font-medium">Contact</a>
          <a href="ajout.html" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-hover transition-colors">Ajouter une recette</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <section class="bg-surface-secondary py-8 px-4">
    <div class="max-w-7xl mx-auto">
      <h1 class="text-4xl font-bold mb-4 text-foreground">Toutes les recettes</h1>
      <p class="text-muted">Découvrez notre collection complète de recettes</p>
    </div>
  </section>

  <!-- Filters and Search -->
  <section class="bg-surface border-b border-border py-6 px-4">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col lg:flex-row gap-4 items-start lg:items-center justify-between">
        <div class="w-full lg:w-96">
          <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8"></circle>
              <path d="m21 21-4.35-4.35"></path>
            </svg>
            <input type="text" placeholder="Rechercher..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-border bg-background focus:border-primary focus:outline-none text-foreground">
          </div>
        </div>
        <div class="flex flex-wrap gap-2">
          <button class="px-4 py-2 rounded-lg text-sm font-medium bg-primary text-white">Toutes</button>
          <button class="px-4 py-2 rounded-lg text-sm font-medium bg-surface border border-border text-foreground hover:bg-surface-secondary">Entrées</button>
          <button class="px-4 py-2 rounded-lg text-sm font-medium bg-surface border border-border text-foreground hover:bg-surface-secondary">Plats</button>
          <button class="px-4 py-2 rounded-lg text-sm font-medium bg-surface border border-border text-foreground hover:bg-surface-secondary">Desserts</button>
          <button class="px-4 py-2 rounded-lg text-sm font-medium bg-surface border border-border text-foreground hover:bg-surface-secondary">Boissons</button>
        </div>
      </div>
      <div class="flex gap-2 mt-4">
        <span class="text-sm text-muted py-2">Difficulté:</span>
        <button class="px-3 py-1 rounded-full text-sm border border-border hover:bg-surface-secondary text-foreground">Toutes</button>
        <button class="px-3 py-1 rounded-full text-sm border border-border hover:bg-surface-secondary text-foreground">Facile</button>
        <button class="px-3 py-1 rounded-full text-sm border border-border hover:bg-surface-secondary text-foreground">Moyen</button>
        <button class="px-3 py-1 rounded-full text-sm border border-border hover:bg-surface-secondary text-foreground">Difficile</button>
      </div>
    </div>
  </section>

  <!-- Recipes Grid -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="flex justify-between items-center mb-6">
      <p class="text-muted">12 recettes trouvées</p>
      <select class="px-3 py-2 bg-surface border border-border rounded-lg text-sm text-foreground focus:outline-none focus:border-primary">
        <option>Plus populaires</option>
        <option>Plus récentes</option>
        <option>Mieux notées</option>
        <option>Temps de préparation</option>
      </select>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <!-- Recipe cards repeated with different content -->
      <a href="recette.html" class="bg-surface rounded-xl overflow-hidden border border-border hover:shadow-lg transition-shadow">
        <div class="relative h-48 bg-surface-secondary">
          <img src="/placeholder.svg?height=200&width=400" alt="Tarte" class="w-full h-full object-cover">
          <div class="absolute top-3 right-3 bg-white/90 px-2 py-1 rounded-full text-xs font-semibold">Desserts</div>
        </div>
        <div class="p-5">
          <h3 class="text-xl font-bold mb-2">Tarte aux pommes caramélisées</h3>
          <div class="flex flex-wrap gap-1 mb-3">
            <span class="px-2 py-0.5 bg-secondary/10 text-secondary text-xs rounded-full">Sans gluten possible</span>
            <span class="px-2 py-0.5 bg-secondary/10 text-secondary text-xs rounded-full">Végétarien</span>
          </div>
          <div class="flex items-center gap-2 mb-3">
            <div class="flex">
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 text-border" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <span class="text-sm font-semibold">4.8</span>
            <span class="text-sm text-muted">(124)</span>
          </div>
          <div class="flex items-center gap-4 text-sm text-muted mb-3">
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span>45 min</span>
            </div>
            <div class="flex items-center gap-1">
              <span>📊</span>
              <span>Moyen</span>
            </div>
          </div>
          <div class="flex items-center justify-between text-sm text-muted">
            <span>Par Marie Dupont</span>
            <span>456 likes</span>
          </div>
        </div>
      </a>

      <!-- More recipe cards with different data -->
      <a href="recette.html" class="bg-surface rounded-xl overflow-hidden border border-border hover:shadow-lg transition-shadow">
        <div class="relative h-48 bg-surface-secondary">
          <img src="/placeholder.svg?height=200&width=400" alt="Risotto" class="w-full h-full object-cover">
          <div class="absolute top-3 right-3 bg-white/90 px-2 py-1 rounded-full text-xs font-semibold">Plats</div>
        </div>
        <div class="p-5">
          <h3 class="text-xl font-bold mb-2">Risotto aux champignons</h3>
          <div class="flex flex-wrap gap-1 mb-3">
            <span class="px-2 py-0.5 bg-secondary/10 text-secondary text-xs rounded-full">Végétarien</span>
            <span class="px-2 py-0.5 bg-secondary/10 text-secondary text-xs rounded-full">Sans gluten</span>
          </div>
          <div class="flex items-center gap-2 mb-3">
            <div class="flex">
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <span class="text-sm font-semibold">4.9</span>
            <span class="text-sm text-muted">(98)</span>
          </div>
          <div class="flex items-center gap-4 text-sm text-muted mb-3">
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span>35 min</span>
            </div>
            <div class="flex items-center gap-1">
              <span>📊</span>
              <span>Facile</span>
            </div>
          </div>
          <div class="flex items-center justify-between text-sm text-muted">
            <span>Par Jean Martin</span>
            <span>523 likes</span>
          </div>
        </div>
      </a>

      <a href="recette.html" class="bg-surface rounded-xl overflow-hidden border border-border hover:shadow-lg transition-shadow">
        <div class="relative h-48 bg-surface-secondary">
          <img src="/placeholder.svg?height=200&width=400" alt="Salade César" class="w-full h-full object-cover">
          <div class="absolute top-3 right-3 bg-white/90 px-2 py-1 rounded-full text-xs font-semibold">Entrées</div>
        </div>
        <div class="p-5">
          <h3 class="text-xl font-bold mb-2">Salade César classique</h3>
          <div class="flex items-center gap-2 mb-3">
            <div class="flex">
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 fill-accent text-accent" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg class="w-4 h-4 text-border" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </div>
            <span class="text-sm font-semibold">4.7</span>
            <span class="text-sm text-muted">(156)</span>
          </div>
          <div class="flex items-center gap-4 text-sm text-muted mb-3">
            <div class="flex items-center gap-1">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span>20 min</span>
            </div>
            <div class="flex items-center gap-1">
              <span>📊</span>
              <span>Facile</span>
            </div>
          </div>
          <div class="flex items-center justify-between text-sm text-muted">
            <span>Par Sophie Laurent</span>
            <span>387 likes</span>
          </div>
        </div>
      </a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-surface border-t border-border py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold text-primary mb-4">Foo-Link</h3>
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
        <div>
          <h4 class="font-bold text-foreground mb-4">Suivez-nous</h4>
          <div class="flex gap-4">
            <a href="#" class="text-muted hover:text-primary">Facebook</a>
            <a href="#" class="text-muted hover:text-primary">Instagram</a>
            <a href="#" class="text-muted hover:text-primary">Twitter</a>
          </div>
        </div>
      </div>
      <div class="mt-8 pt-8 border-t border-border text-center text-sm text-muted">
        <p>&copy; 2025 Foo-Link. Tous droits réservés.</p>
      </div>
    </div>
  </footer>
</body>
</html>
