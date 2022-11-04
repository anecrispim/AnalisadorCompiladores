<?php
    $sCadeia = empty($_POST['cadeia']) ? 'function x (int a, int b) { x = a + b; if (x > 10){ print(x); } }' : $_POST['cadeia'];
    $sTipo = empty($_GET['tipo']) ? 'lexico' : $_GET['tipo'];
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compilador</title>
        <link href="semanticui/semantic.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="semanticui/semantic.min.js"></script>
    </head>
<body>
    <div class="ui secondary pointing menu">
        <a class="item" href="gramatica.php">Definições da gramática</a>
        <a class="item <?=$sTipo == 'lexico' ? 'active' : ''?>" href="index.php?tipo=lexico">Analisador Léxico</a>
        <a class="item <?=$sTipo == 'sintDesc' ? 'active' : ''?>" href="index.php?tipo=sintDesc">Analisador Sintático Descendente</a>
        <a class="item <?=$sTipo == 'sintDescPred' ? 'active' : ''?>" href="index.php?tipo=sintDescPred">Analisador Sintático Descendente Preditivo</a>
        <a class="item <?=$sTipo == 'sintSLR' ? 'active' : ''?>" href="index.php?tipo=sintSLR">Analisador Sintático Ascendente SLR</a>
        <a class="item <?=$sTipo == 'semantico' ? 'active' : ''?>" href="index.php?tipo=sintSLR">Analisador Semântico</a>
    </div>
    <div class="ui segment">
        <form class="ui form" method="POST">
            <h4 class="ui dividing header">Código de análise</h4>
            <div class="field">
                <textarea rows="2" name="cadeia"><?=$sCadeia?></textarea>
            </div>
            <button class="ui primary button">Enviar</button>
        </form>
    </div>
</body>
</html>

<?php
error_reporting(2);
include 'inicializaDados.php';

$oCompilador->analisadorLexico();

$aTokens = $oCompilador->getATokens();
$aLexema = $oCompilador->getALexemas();
$aEstados = $oCompilador->getAEstados();
$aPosicao = $oCompilador->getAPosicoes();


switch ($sTipo) {
    case 'lexico':
        include 'analisadorLexico.php';
        break;
    case 'sintDesc':
        include 'analisadorSintaticoDesc.php';
        break;
    case 'sintDescPred':
        include 'analisadorSintaticoDescPreditivo.php';
        break;
    case 'sintSLR':
        include 'analisadorSLR.php';
        break;
}
?>