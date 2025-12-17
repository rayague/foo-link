<?php
    if (session_status() === PHP_SESSION_NONE) session_start();
    require_once __DIR__ . '/../helpers/csrf.php';

    // include('template.php');

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

<body class="site-dark page-connexion">
    <?php include __DIR__ . '/partials/navbar.php'; ?>

    <!-- Hero -->
    <section class="bg-surface-secondary pt-44  pb-16 px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl text-white font-bold mb-6 text-foreground">Connectez-vous</h1>
            <p class="text-lg text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit beatae
                dolorum
                harum animi dolore. Nesciunt dignissimos illum dolor ipsum labore ab aperiam quia dolorem voluptas hic
                deserunt, fuga magni provident.</p>
        </div>
    </section>

    <!-- Contact Form -->
    <section class="max-w-2xl mx-auto px-4 py-12">

        <div class="bg-surface p-8 rounded-2xl shadow-lg border border-border">
            <h1 class="text-3xl sm:text-4xl text-center font-bold mb-4">Connexion</h1>
            <p class="text-sm text-muted text-center mb-6">Connectez-vous pour accéder à votre tableau de bord et publier des recettes.</p>

            <form class="max-w-md mx-auto space-y-4" method="POST" action="<?= isset($root) ? $root : '' ?>/controllers/ConnexionController.php">
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(generate_csrf_token()); ?>">

                <div>
                    <label for="floating_email" class="block text-sm font-medium text-foreground mb-1">Email</label>
                    <input type="email" name="email" id="floating_email" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label for="floating_password" class="block text-sm font-medium text-foreground mb-1">Mot de passe</label>
                    <input type="password" name="password" id="floating_password" required class="w-full rounded-lg px-3 py-2 bg-transparent border border-border focus:border-primary focus:outline-none">
                </div>

                <button type="submit" name="action" value="login" class="btn-primary w-full py-3">Se connecter</button>
                <div class="text-center mt-2"><a href="<?= isset($root) ? $root : '' ?>/inscription.php" class="text-muted underline">Je n'ai pas de compte — m'inscrire</a></div>
            </form>

    </section>

    <?php include __DIR__ . '/partials/footer.php'; ?>
</body>

</html>