<?php

error_reporting(0);
include('analisadorLexico.php');
include('analisadorSintaticoDesc.php');

if (FUNC()) {
    print('<br>Aceito!');
} else {
    print('<br>Não aceito!');
}

include('analisadorSintaticoDescPreditivo.php');
include('analisadorSLR.php');

$aTks = [];
foreach ($aTokens as $sToken) { 
    $aTks[] = $sToken;
}

?>