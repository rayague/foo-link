<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    require_once __DIR__ . '/../helpers/csrf.php';


    if(isset($_SESSION['flash']))
    {
        foreach($_SESSION['flash'] as $type => $message)
        {
            echo $message;
        }
        unset($_SESSION['flash']);
    }

    if(isset($_SESSION['user']))
    {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include __DIR__ . '/partials/head.php'; ?>
</head>

<body class="site-dark page-inscription">
    <?php include __DIR__ . '/partials/navbar.php'; ?>

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

    <section class="max-w-2xl mx-auto px-4 py-12">
        <?php if (!empty($error)): ?>
        <p class="text-red-400 text-center mb-4"><?= $error ?></p>
        <?php endif; ?>

        <div class="bg-surface p-8 rounded-2xl shadow-lg border border-border">
            <h1 class="text-3xl sm:text-4xl text-center font-bold mb-4">Créer un compte</h1>
            <p class="text-sm text-muted text-center mb-6">Rejoignez la communauté — partagez vos recettes préférées.</p>

            <form class="max-w-md mx-auto space-y-4" method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/inscriptionController.php">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(generate_csrf_token()); ?>">

                <div>
                    <label for="floating_email" class="block text-sm font-medium text-foreground mb-1">Email</label>
                    <input type="email" name="email" id="floating_email" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-foreground mb-1">Mot de passe</label>
                        <input type="password" name="password" id="password" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                    </div>
                    <div>
                        <label for="password2" class="block text-sm font-medium text-foreground mb-1">Confirmer le mot de passe</label>
                        <input type="password" name="password2" id="password2" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="floating_first_name" class="block text-sm font-medium text-foreground mb-1">Prénom</label>
                        <input type="text" name="firstname" id="floating_first_name" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                    </div>
                    <div>
                        <label for="floating_last_name" class="block text-sm font-medium text-foreground mb-1">Nom</label>
                        <input type="text" name="lastname" id="floating_last_name" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="floating_phone" class="block text-sm font-medium text-foreground mb-1">Téléphone</label>
                        <input type="tel" name="phone" id="floating_phone" class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-foreground mb-1">Catégorie préférée</label>
                        <select id="category" name="category" class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                            <option value="">Sélectionner une catégorie...</option>
                            <option value="entrees">Entrées</option>
                            <option value="plats">Plats</option>
                            <option value="desserts">Desserts</option>
                            <option value="boissons">Boissons</option>
                            <option value="vegan">Vegan</option>
                            <option value="sans-gluten">Sans gluten</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-primary w-full py-3">S'inscrire</button>
                <div class="text-center mt-2"><a href="<?= isset($root) ? $root : '' ?>/connexion.php" class="text-muted underline">J'ai déjà un compte — me connecter</a></div>
            </form>


    </section>
    </section>





    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>