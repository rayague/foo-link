<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Foo-Link - Partagez vos recettes</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
<?php
$parts = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
$first = $parts[0] ?? '';
if (strpos($first, '.php') !== false || $first === '') { $root = ''; } else { $root = '/'.$first; }
?>
<link rel="stylesheet" href="<?= $root ?>/assets/css/dashboard_style.css">
<script>window.SITE_ROOT = '<?= $root ?>'; var SITE_ROOT = window.SITE_ROOT;</script>
