<?php
session_start();

// Atualiza ranking
$rankingFile = 'ranking.json';
$ranking = file_exists($rankingFile) ? json_decode(file_get_contents($rankingFile), true) : [];

$ranking[] = [
    'nome' => $_SESSION['nome'],
    'pontos' => $_SESSION['pontos'],
    'status' => 'completo'
];
file_put_contents($rankingFile, json_encode($ranking, JSON_PRETTY_PRINT));
?>

<h2>🎯 Resultado Final</h2>
<p>Nome: <?= $_SESSION['nome'] ?></p>
<p>Pontuação: <?= $_SESSION['pontos'] ?></p>

<h3>Municípios certos:</h3>
<ul>
    <?php foreach ($_SESSION['acertos'] as $acerto): ?>
        <li><?= $acerto ?></li>
    <?php endforeach; ?>
</ul>

<h3>Municípios errados:</h3>
<ul>
    <?php foreach ($_SESSION['erros'] as $erro): ?>
        <li><?= $erro ?></li>
    <?php endforeach; ?>
</ul>

<a href="index.php">Voltar para o início</a>
<?php session_destroy(); ?>
