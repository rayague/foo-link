<!DOCTYPE html>
<html lang="fr">
<head>
  <?php include __DIR__ . '/partials/head.php'; ?>
</head>
<body class="site-dark page-recipes">
  <?php include __DIR__ . '/partials/navbar.php'; ?>

  <main class="pt-6">
    <section class="py-8 hero-panel">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold">Toutes les recettes</h1>
        <p class="text-sm text-muted mt-1">Découvrez les recettes publiées par la communauté.</p>
      </div>
    </section>

    <!-- Filters / search -->
    <section class="pt-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form id="searchForm" class="flex gap-3 items-center">
          <div class="flex-1">
            <input id="searchInput" name="search" type="text" placeholder="Rechercher une recette, un ingrédient..." class="search-input w-full rounded-lg px-3 py-2" />
          </div>
          <div>
            <button type="submit" class="btn-primary px-4 py-2 rounded-lg">Rechercher</button>
          </div>
        </form>
      </div>
    </section>

    <!-- Grid -->
    <section class="py-8">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="recipesGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- cards loaded by JS -->
        </div>
        <div id="loading" class="text-center py-6 text-muted hidden">Chargement...</div>
        <div id="sentinel"></div>
      </div>
    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
  </main>

  <script>
    (function(){
      const grid = document.getElementById('recipesGrid');
      const loadingEl = document.getElementById('loading');
      const sentinel = document.getElementById('sentinel');
      const base = (typeof SITE_ROOT !== 'undefined' ? SITE_ROOT.replace(/\/$/, '') : '');

      let page = 1;
      let isLoading = false;
      let totalPages = null;
      let currentSearch = '';

      function esc(s){
        if(s === undefined || s === null) return '';
        return String(s).replace(/[&<>"'`]/g, (m) => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":"&#39;","`":"&#96;"})[m]);
      }

      function renderCard(recipe){
        const img = esc(recipe.image || 'placeholder.svg');
        const title = esc(recipe.title || 'Sans titre');
        const category = esc(recipe.category || 'Autre');
        const author = esc(recipe.author_name || 'Anonyme');
        const duration = esc(recipe.duration || '—');
        const difficulty = esc(recipe.difficulty || '—');
        const rating = esc(recipe.rating || '0.0');
        const reviews = esc(recipe.reviews || 0);
        const likes = esc(recipe.likes || 0);
        const tags = recipe.tags || [];

        return `
          <a href="${base}/recette.php?id=${encodeURIComponent(recipe.id)}" class="recipe-card card-surface overflow-hidden hover:shadow-lg transition-shadow">
              <div class="relative h-48">
              <img src="${base}/assets/images/${img}" alt="${title}" class="w-full h-full object-cover" loading="lazy" decoding="async" width="400" height="240">
              <div class="absolute top-3 right-3 recipe-chip">${category}</div>
            </div>
            <div class="p-5">
              <h3 class="text-xl font-bold mb-2">${title}</h3>
              <div class="flex flex-wrap gap-1 mb-3">
                ${tags.map(t => `<span class="recipe-tag">${esc(t)}</span>`).join('')}
              </div>
              <div class="flex items-center gap-2 mb-3">
                <div class="flex">
                  ${Array(5).fill(0).map((_,i) => `<svg class="w-4 h-4 ${i < Math.round(Number(recipe.rating || 0)) ? 'fill-accent text-accent' : 'text-border'}" viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>`).join('')}
                </div>
                <span class="text-sm font-semibold">${rating}</span>
                <span class="text-sm text-muted">(${reviews})</span>
              </div>
              <div class="flex items-center gap-4 text-sm text-muted mb-3">
                <div class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  <span>${duration}</span>
                </div>
                <div class="flex items-center gap-1">
                  <span>📊</span>
                  <span>${difficulty}</span>
                </div>
              </div>
              <div class="flex items-center justify-between text-sm text-muted">
                <span>Par ${author}</span>
                <span>${likes} likes</span>
              </div>
            </div>
          </a>
        `;
      }

      async function fetchPage(){
        if(isLoading) return;
        if(totalPages && page > totalPages) return;
        isLoading = true;
        loadingEl.classList.remove('hidden');
        try{
          const resp = await fetch(`${base}/api/recipes.php?page=${page}&search=${encodeURIComponent(currentSearch)}`);
          if(!resp.ok) throw new Error('Network response not ok');
          const data = await resp.json();
          const recipes = data.data || [];
          totalPages = data.total_pages || null;

          if(recipes.length === 0 && page === 1){
            grid.innerHTML = '<div class="p-8 text-center text-muted">Aucune recette trouvée.</div>';
          } else {
            grid.insertAdjacentHTML('beforeend', recipes.map(renderCard).join(''));
          }

          page++;
        }catch(e){
          console.error(e);
          if(page === 1){
            grid.innerHTML = '<div class="p-8 text-center text-muted">Erreur lors du chargement des recettes.</div>';
          }
        } finally {
          isLoading = false;
          loadingEl.classList.add('hidden');
        }
      }

      // IntersectionObserver for infinite scroll (guard sentinel exists)
      if(sentinel){
        const io = new IntersectionObserver((entries)=>{
          entries.forEach(entry=>{
            if(entry.isIntersecting){
              fetchPage();
            }
          });
        });
        io.observe(sentinel);
      }

      // Search handler
      const searchForm = document.getElementById('searchForm');
      if(searchForm){
        searchForm.addEventListener('submit', (e)=>{
          e.preventDefault();
          currentSearch = document.getElementById('searchInput').value.trim();
          grid.innerHTML = '';
          page = 1;
          totalPages = null;
          fetchPage();
        });
      }

      // initial load
      fetchPage();
    })();
  </script>

</body>
</html>
