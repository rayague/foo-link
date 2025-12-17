<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$currentUser = null;
if (!empty($_SESSION['user_id'])) {
    $userModelPath = __DIR__ . '/../../models/User.php';
    if (file_exists($userModelPath)) require_once $userModelPath;
    if (class_exists('User')) {
        $um = new User();
        $currentUser = $um->getById($_SESSION['user_id']);
    }
}
if (!isset($root)) {
    $parts = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
    $first = $parts[0] ?? '';
    if (strpos($first, '.php') !== false || $first === '') { $root = ''; } else { $root = '/'.$first; }
}
$currentFile = basename($_SERVER['SCRIPT_NAME']);
?>

<nav id="glassNav" role="navigation" aria-label="Main navigation" class="glass-nav-bg backdrop-blur-md fixed w-full z-50 shadow-2xl shadow-blue-900/50 text-white border-zb border-blue-400/30" style="background:linear-gradient(90deg, rgba(8,16,32,0.85), rgba(6,10,30,0.85)); color: #ffffff;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center" 

            <div class="flex items-center gap-3">
                <a href="<?= $root ?>/index.php" class="flex items-center gap-3">
                    <?php
                    $logoFile = __DIR__ . '/../../assets/images/logo-48.png';
                    if (file_exists($logoFile)) {
                        $logoSrc = $root . '/assets/images/logo-48.png';
                    } else {
                        $logoSrc = $root . '/assets/images/avatar-fallback.svg';
                    }
                    ?>
                    <img src="<?= $logoSrc ?>"
                        class="w-10 h-10 rounded-md object-cover ring-2 ring-blue-300/50"
                        onerror="this.src='<?= $root ?>/assets/images/avatar-fallback.svg'">
                    <span class="site-logo font-extrabold text-lg">Foo-Link</span>
                </a>
            </div>

                <div class="hidden md:flex gap-6">
                <a href="<?= $root ?>/index.php" class="nav-glass-link <?= $currentFile === 'index.php' ? 'nav-active' : '' ?>">Accueil</a>
                <a href="<?= $root ?>/recettes.php" class="nav-glass-link <?= $currentFile === 'recettes.php' ? 'nav-active' : '' ?>">Recettes</a>
                <a href="<?= $root ?>/apropos.php" class="nav-glass-link <?= $currentFile === 'apropos.php' ? 'nav-active' : '' ?>">À propos</a>
                <a href="<?= $root ?>/contact.php" class="nav-glass-link <?= $currentFile === 'contact.php' ? 'nav-active' : '' ?>">Contact</a>
            </div>

            <div class="flex items-center gap-4">

                <div class="hidden sm:block w-72 relative">
                    <form action="<?= $root ?>/recettes.php" method="get" class="relative">
                        <input name="search"
                            id="navSearchInput"
                            type="search"
                            placeholder="Rechercher une recette..."
                            autocomplete="off"
                            class="search-input w-full rounded-full px-4 py-2 text-sm" />
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 btn-ghost">🔍</button>

                        <div id="navSuggestions" class="absolute top-12 w-full hidden flex-col rounded-xl overflow-hidden shadow-lg search-suggestions">
                        </div>
                    </form>
                </div>

                <div class="hidden md:flex items-center gap-3">
                    <?php if ($currentUser): ?>
                        <button id="notifBtn" class="icon-btn" aria-label="Notifications">🔔</button>
                        <div class="relative">
                            <button id="accountBtn" class="flex items-center gap-2 px-2 py-1 rounded-full text-sm btn-ghost ring-1 ring-blue-300/30">
                                <span class="text-sm">Bonjour, <?= htmlspecialchars($currentUser['firstname'] ?? $currentUser['email']) ?></span>
                                <?php $defaultAvatar = $root . '/assets/images/avatar-fallback.svg'; ?>
                                <img src="<?= htmlspecialchars(($currentUser['avatar'] ?? $defaultAvatar)) ?>" width="32" height="32" loading="lazy" decoding="async" class="w-8 h-8 rounded-full object-cover ring-2 ring-blue-300/50" onerror="this.src='<?= $defaultAvatar ?>'" alt="Avatar">
                            </button>

                            <div id="accountMenu" class="dropdown-menu hidden right-0 mt-2 w-48 rounded-lg shadow-xl py-1">
                                <a href="<?= $root ?>/profil.php" class="dropdown-item">Profil</a>
                                <a href="<?= $root ?>/views/dashboard/index.php" class="dropdown-item">Tableau de bord</a>
                                <form method="POST" action="<?= $root ?>/logout.php" style="margin:0">
                                    <button type="submit" class="dropdown-item text-red-600">Se déconnecter</button>
                                </form>
                            </div>
                        </div>

                    <?php else: ?>
                        <a href="<?= $root ?>/inscription.php" class="btn-ghost">Inscription</a>
                        <a href="<?= $root ?>/connexion.php" class="btn-primary">Connexion</a>
                    <?php endif; ?>
                </div>

                <button id="navToggle" class="md:hidden icon-btn" aria-label="Toggle menu">
                    <svg id="iconOpen" class="w-6 h-6" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor">
                        <path stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <div id="mobileMenu" role="menu" aria-hidden="true" class="hidden md:hidden flex flex-col gap-2 px-4 py-4 glass-nav-bg backdrop-blur-md border-t border-blue-400/30">
        <a href="<?= $root ?>/index.php" class="mobile-link <?= $currentFile === 'index.php' ? 'nav-active' : '' ?> p-2 rounded-lg transition"><svg class="nav-icon w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M3 9.5L12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-6H9v6H4a1 1 0 0 1-1-1V9.5z"></path></svg>Accueil</a>
        <a href="<?= $root ?>/recettes.php" class="mobile-link <?= $currentFile === 'recettes.php' ? 'nav-active' : '' ?> p-2 rounded-lg transition"><svg class="nav-icon w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M3 6h18v2H3zM5 10h14v8H5zM7 12v4h10v-4z"></path></svg>Recettes</a>
        <a href="<?= $root ?>/apropos.php" class="mobile-link <?= $currentFile === 'apropos.php' ? 'nav-active' : '' ?> p-2 rounded-lg transition"><svg class="nav-icon w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 .001 20.001A10 10 0 0 0 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>À propos</a>
        <a href="<?= $root ?>/contact.php" class="mobile-link <?= $currentFile === 'contact.php' ? 'nav-active' : '' ?> p-2 rounded-lg transition"><svg class="nav-icon w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M21 8V7l-3 2-2-1-6 4-5-3v8h16V8zM5 6h14V4H5v2z"></path></svg>Contact</a>
        <a href="<?= $root ?>/inscription.php" class="mobile-link <?= $currentFile === 'inscription.php' ? 'nav-active' : '' ?> p-2 rounded-lg transition"><svg class="nav-icon w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12a5 5 0 1 0-.001-10.001A5 5 0 0 0 12 12zm0 2c-4 0-8 2-8 6v2h16v-2c0-4-4-6-8-6z"></path></svg>Inscription</a>
        <a href="<?= $root ?>/connexion.php" class="mobile-link btn-primary p-2 rounded-lg transition duration-200 shadow-lg">Connexion</a>
    </div>
</nav>

<div class="h-16"></div>


    <script>
    (function(){
        const btn = document.getElementById('navToggle');
        const menu = document.getElementById('mobileMenu');
        const openI = document.getElementById('iconOpen');
        const closeI = document.getElementById('iconClose');
        if(!btn) return;
        btn.addEventListener('click', ()=>{
            // toggle hidden class and update icons/ARIA
            menu.classList.toggle('hidden');
            const nowHidden = menu.classList.contains('hidden');
            if(nowHidden){
                openI.classList.remove('hidden');
                closeI.classList.add('hidden');
                btn.setAttribute('aria-label','Ouvrir le menu');
                menu.setAttribute('aria-hidden','true');
            } else {
                openI.classList.add('hidden');
                closeI.classList.remove('hidden');
                btn.setAttribute('aria-label','Fermer le menu');
                menu.setAttribute('aria-hidden','false');
            }
        });
    })();
    </script>

<script>
    (function(){
        // account dropdown
        const accBtn = document.getElementById('accountBtn');
        const accMenu = document.getElementById('accountMenu');
        if(accBtn){
            accBtn.addEventListener('click', (e)=>{
                e.preventDefault();
                const open = !accMenu.classList.contains('hidden');
                if(open){ accMenu.classList.add('hidden'); accBtn.setAttribute('aria-expanded','false'); }
                else { accMenu.classList.remove('hidden'); accBtn.setAttribute('aria-expanded','true'); }
            });
            // close dropdown on outside click
            document.addEventListener('click', (ev)=>{
                if(!accBtn.contains(ev.target) && !accMenu.contains(ev.target)){
                    accMenu.classList.add('hidden'); accBtn.setAttribute('aria-expanded','false');
                }
            });
        }

        // search suggestions (debounced)
        const input = document.getElementById('navSearchInput');
        const suggestions = document.getElementById('navSuggestions');
        let timer = null;
        if(input){
            input.addEventListener('input', ()=>{
                clearTimeout(timer);
                const q = input.value.trim();
                if(q.length < 2){ suggestions.classList.add('hidden'); suggestions.innerHTML = ''; return; }
                timer = setTimeout(async ()=>{
                    try{
                        const res = await fetch((window.SITE_ROOT || '') + '/api/recipes.php?page=1&per_page=5&search='+encodeURIComponent(q));
                        if(!res.ok) return;
                        const j = await res.json();
                        suggestions.innerHTML = '';
                        if(j.data && j.data.length){
                            j.data.forEach(item=>{
                                const btn = document.createElement('button');
                                btn.type = 'button';
                                btn.textContent = item.titre;
                                btn.addEventListener('click', ()=>{
                                    // go to recipe page
                                    window.location.href = (window.SITE_ROOT || '') + '/recette.php?id='+encodeURIComponent(item.id);
                                });
                                suggestions.appendChild(btn);
                            });
                            suggestions.classList.remove('hidden');
                        } else {
                            suggestions.classList.add('hidden');
                        }
                    }catch(e){
                        console.error(e);
                    }
                }, 250);
            });
            // hide on blur
            input.addEventListener('blur', ()=>{ setTimeout(()=>{ suggestions.classList.add('hidden'); }, 150); });
        }
    })();
</script>
