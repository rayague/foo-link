<?php
?>
<div class="bg-white rounded-xl shadow p-6 mb-6">
    <h2 class="text-2xl font-bold mb-4">Statistiques du site</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg text-center">
            <div class="text-3xl font-bold text-blue-600"><?php echo $stats['totalRecettes']; ?></div>
            <div class="text-gray-700">Recettes</div>
        </div>
        <div class="bg-pink-50 p-4 rounded-lg text-center">
            <div class="text-3xl font-bold text-pink-600"><?php echo $stats['totalCommentaires']; ?></div>
            <div class="text-gray-700">Commentaires</div>
        </div>
        <div class="bg-green-50 p-4 rounded-lg text-center">
            <div class="text-3xl font-bold text-green-600"><?php echo $stats['totalCategories']; ?></div>
            <div class="text-gray-700">Catégories</div>
        </div>
    </div>
    <!-- Zone pour graphiques Chart.js -->
    <div class="my-8">
        <canvas id="chartLikes"></canvas>
    </div>
    <!-- Top recettes -->
    <h3 class="text-xl font-semibold mt-8 mb-2">Top 5 recettes les plus likées</h3>
    <ul class="list-disc ml-6">
        <?php foreach($stats['topRecettes'] as $recette): ?>
            <li><span class="font-bold"><?php echo htmlspecialchars($recette['titre']); ?></span> (<?php echo $recette['nb_likes']; ?> j'aime)</li>
        <?php endforeach; ?>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Exemple de graphique (likes par jour)
const ctx = document.getElementById('chartLikes').getContext('2d');
const chartLikes = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode(array_keys($stats['likesParJour'])); ?>,
        datasets: [{
            label: "Likes par jour",
            data: <?php echo json_encode(array_values($stats['likesParJour'])); ?>,
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.1)',
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } }
    }
});
</script>
