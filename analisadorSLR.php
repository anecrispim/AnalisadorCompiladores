<?php
print('<h3>Analisador Ascendente SLR</h3>');

$aAction = [
    0 => ['FUNCTION' => 'S2']
    , 1 => ['$' => 'ACC']
    , 2 => ['ID' => 'S3']
    , 3 => ['AP' => 'S4']
    , 4 => ['INT' => 'S5']
    , 5 => ['ID' => 'S6']
    , 6 => ['VIRG' => 'S7', 'FP' => 'R2']
    , 7 => ['INT' => 'S5']
    , 8 => ['FP' => 'R1']
    , 9 => ['FP' => 'S10']
    , 10 => ['AC' => 'S11']
    , 11 => ['IF' => 'S12', 'PRINT' => 'S25', 'WHILE' => 'S18', 'ID' => 'S31']
    , 12 => ['AP' => 'S13']
    , 13 => ['ID' => 'S14']
    , 14 => ['OPELOG' => 'S15']
    , 15 => ['CONST' => 'S16']
    , 16 => ['FP' => 'S17']
    , 17 => ['AC' => 'S11']
    , 18 => ['AP' => 'S19']
    , 19 => ['ID' => 'S20']
    , 20 => ['OPELOG' => 'S21']
    , 21 => ['CONST' => 'S22']
    , 22 => ['FP' => 'R1']
    , 23 => ['FP' => 'S24']
    , 24 => ['AC' => 'S11']
    , 25 => ['AP' => 'S26']
    , 26 => ['ID' => 'S27']
    , 27 => ['FP' => 'S28']
    , 28 => ['PV' => 'S29']
    , 29 => ['FC' => 'R1']
    , 30 => ['FC' => 'S48']
    , 31 => ['AP' => 'S32', 'ATRIB' => 'S50']
    , 32 => ['INT' => 'S33']
    , 33 => ['ID' => 'S34']
    , 34 => ['VIRG' => 'S35', 'FP' => 'R2']
    , 35 => ['INT' => 'S33']
    , 36 => ['FP' => 'R1']
    , 37 => ['FP' => 'S38']
    , 38 => ['PV' => 'S39']
    , 39 => ['IF' => 'R1', 'FC' => 'R3']
    , 40 => ['IF' => 'S42', 'FC' => 'R2']
    , 41 => ['FC' => 'R1']
    , 42 => ['AP' => 'S43']
    , 43 => ['ID' => 'S44']
    , 44 => ['OPELOG' => 'S45']
    , 45 => ['CONST' => 'S46']
    , 46 => ['FP' => 'S47']
    , 47 => ['AC' => 'S59']
    , 48 => ['$' => 'R2']
    , 49 => ['$' => 'R1']
    , 50 => ['ID' => 'S51']
    , 51 => ['OPE' => 'S52']
    , 52 => ['ID' => 'S53', 'CONST' => 'S56']
    , 53 => ['PV' => 'S54']
    , 54 => ['IF' => 'R3', 'FC' => 'R5']
    , 55 => ['IF' => 'R2', 'FC' => 'R3']
    , 56 => ['PV' => 'S57']
    , 57 => ['IF' => 'R4', 'FC' => 'R6']
    , 58 => ['IF' => 'R2', 'FC' => 'R3']
    , 59 => ['PRINT' => 'S60']
    , 60 => ['AP' => 'S61']
    , 61 => ['ID' => 'S62']
    , 62 => ['FP' => 'S63']
    , 63 => ['PV' => 'S64']
    , 64 => ['FC' => 'R1']
    , 65 => ['FC' => 'S66']
    , 66 => ['FC' => 'R1']
];

$aGoTo = [
    6 => 8
    , 8 => 9
    , 22 => 23
    , 29 => 30
    , 34 => 36
    , 36 => 37
    , 39 => 40
    , 40 => 41
    , 41 => 30
    , 48 => 49
    , 49 => 1
    , 54 => 55
    , 55 => 58
    , 57 => 55
    , 58 => 40
    , 64 => 66
    , 66 => 1
];

$aTks = [];
foreach ($aTokens as $sToken) { 
    $aTks[] = $sToken;
}

$aNaoTerminal = ['FUNC', 'PARAM', 'VIRGULA', 'BLOCO', 'SE', 'WHI', 'PAMW', 'PRIN', 'CHAM', 'ELEMS', 'PAMDEC', 'EID', 'ECONST', 'ELEMENTOS', 'SEG'];
$aPilha[] = '$';
$x = $aTks[0];
addElmPilha($aTabelaM['FUNC']['FUNCTION']);

//var_dump($aAction);
$aPilhaEstados[] = 0;
$a = $aTks[0];

while (true) {
    $s = end($aPilhaEstados);
    printf('<br>%s<br>', $a);
    printf('Pilha estados: %s', implode(',', $aPilhaEstados));
    if (strpos($aAction[$s][$a], 'S') !== false) {
        $t = intval(str_replace('S', '', $aAction[$s][$a]));
        array_push($aPilhaEstados, $t);
        $a = nextToken();
    } else if (strpos($aAction[$s][$a], 'R') !== false){
        $r = intval(str_replace('R', '', $aAction[$s][$a]));
        array_splice($aPilhaEstados, $r);
        $g = $aGoTo[$s];
        array_push($aPilhaEstados, $g);
    } else if ($aAction[$s][$a] == 'ACC') {
        exit;
    } else {
        $sErro = 'Erro ao analisar a linguagem';
        exit;
    }
}

if (empty($sErro)) {
    print('Aceito');
} else {
    print($sErro);
}
?>