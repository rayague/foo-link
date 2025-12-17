<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$currentFile = basename($_SERVER['SCRIPT_NAME']);
?>
<aside class="block w-full md:w-64 bg-gray-800 text-white min-h-screen p-4">
    <div class="p-4">
        <div class="p-4">
            <h1 class="text-2xl font-bold text-center">Foo-Link</h1>
        </div>
        <hr class="mt-4 mb-6 border-gray-700">
        <nav class="space-y-2">
            <?php
            $r = isset($root) ? $root : '';
            $links = [
                'index.php' => 'Dashboard',
                'recettes.php' => 'Mes recettes',
                'commentaires.php' => 'Commentaires',
                'categories.php' => 'Catégories',
                'profil.php' => 'Profil',
            ];
            foreach ($links as $file => $label) {
                $isActive = ($currentFile === $file);
                $classes = 'block py-3 px-4 rounded-lg ' . ($isActive ? 'bg-blue-500' : 'bg-gray-700 hover:bg-blue-500');
                $aria = $isActive ? ' aria-current="page"' : '';
                echo "<a href=\"{$r}/views/dashboard/{$file}\" class=\"{$classes}\"{$aria}>{$label}</a>";
            }
            ?>
        </nav>

        <div class="mt-8">
            <form method="POST" action="<?= isset($root) ? $root : '' ?>/logout.php">
                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 rounded">Déconnexion</button>
            </form>
        </div>
    </div>
</aside>
