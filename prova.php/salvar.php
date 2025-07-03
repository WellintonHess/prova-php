<?php
session_start();

$respostas = $_POST['respostas'];
$cidades = $_POST['cidades'];
$corretas = $_POST['corretas'];
$pontos = 0;

foreach ($respostas as $i => $regiaoInformada) {
    $regiaoCerta = $corretas[$i];
    $cidade = $cidades[$i];

    if ($regiaoInformada === $regiaoCerta) {
        $_SESSION['acertos'][] = "$cidade ({$regiaoCerta})";
        $pontos += 10;
    } else {
        $_SESSION['erros'][] = "$cidade ({$regiaoInformada}) → correto: $regiaoCerta";
    }
}

$_SESSION['pontos'] += $pontos;
$_SESSION['rodada']++;

if ($_SESSION['rodada'] > 10) {
    header('Location: resultado.php');
} else {
    header('Location: jogo.php');
}
exit; 
