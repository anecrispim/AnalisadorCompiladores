<div class="ui segment">
    <h4 class="ui dividing header">Analisador Léxico</h4>
<?php

$sTr = '<tr>%s%s%s%s</tr>';
$aTrs = [];
foreach ($aTokens as $i => $sVal) {
    $sTdToken = sprintf('<td>%s</td>', $aTokens[$i]);
    $sTdLexema = sprintf('<td>%s</td>', $aLexema[$i]);
    $sTdEstados = sprintf('<td>%s</td>', $aEstados[$i]);
    $sTdPosicao = sprintf('<td>%s</td>', $aPosicao[$i]);
    $aTrs[] = sprintf($sTr, $sTdToken, $sTdLexema, $sTdEstados, $sTdPosicao);
}
?>
    <table class="ui celled table">
        <thead>
            <th>Token</th>
            <th>Lexema</th>
            <th>Estado(s)</th>
            <th>Posição</th>
        </thead>
        <tbody>
            <?=implode('', $aTrs)?>
        </tbody>
    </table>
</div>