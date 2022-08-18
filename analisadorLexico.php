<?php
error_reporting(0);
$sCadeia = 'x = 10 while (x > 0){ pint(x) X = x - 1; } if (x == 0) print(0) for';
$iEstado = 0;

// $aAlfabeto = [7 => 'a',7 => 'b',7 => 'c',7 =>'d',7 =>'e',8 => 'f',7 => 'g',7 => 'h',9 => 'i',7 => 'j',7 =>'k',7 =>'l',7=>'m',7=>'n',7=>'o',10=>'p',7=>'q',7=>'r',7=>'s',7=>'t','u','v','w','x','y','z'];
// $aNumeros = [4 => 0, 4=> 1, 4 => 2, 3, 4 => 4, 4 => 5, 4 => 6, 4 => 7, 4 => 8, 4 => 9];
// $aSimbolos = [2 => '(', 2 => ')', '{', '}'];
// $aOperadores = [3 => '*', 3 => '+', 3 => '-', 3 => '/'];
// $aOperadoresLogicos = [6 => '=', 5 => '<', 5 => '>'];
// $aEspaco = [1 => ' '];

$aEntradas = str_split(strtolower($sCadeia));
$aEstados = [];
$aElementos = [];
$aTokens = [];
$aLexema = [];
$sJson = file_get_contents('matrizTransicao.json');
$aMatrizTransicao = json_decode($sJson, true);
$aEstadosFinais = [
      'ESPACO' => 1
    , 'SIMBOLO' => 2
    , 'OPERADOR' => 3
    , 'NUMERO' => 4
    , 'OPERADORLOGICO'  => 5
    , 'OPERADORLOGICO' => 6
    , 'VARIAVEL' => 7
    , 'VARIAVEL' => 8
    , 'VARIAVEL' => 9
    , 'VARIAVEL' => 10
    , 'VARIAVEL' => 11
    , 'VARIAVEL' => 12
    , 'VARIAVEL' => 13
    , 'IF' => 14
    , 'VARIAVEL' => 15
    , 'VARIAVEL' => 16
    , 'FOR' => 17
    , 'VARIAVEL' => 18
    , 'VARIAVEL' => 19
    , 'VARIAVEL' => 20
    , 'VARIAVEL' => 21
    , 'PRINT' => 22
    , 'WHILE' => 23
];

// MONTA TABELA SIMULADOR LEXICO
for ($i = 0; $i < count($aEntradas); $i++) {
    for ($j=0; $j < count($aMatrizTransicao); $j++) { 
        if (!is_null($aMatrizTransicao[$j][$aEntradas[$i])) {
            $aEstados[] = $aMatrizTransicao[$j][$aEntradas[$i]];
        }
    }
    // if ($aEntradas[$i] == 'i' && $aEntradas[$i + 1] ==  'f') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'IF'; 
    //     $aLexema[] = 'if'; 
    //     $i+=1;
    //     continue;
    // } else if ($aEntradas[$i] == 'f' && $aEntradas[$i + 1] ==  'o' && $aEntradas[$i + 2] ==  'r') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'FOR'; 
    //     $aLexema[] = 'for'; 
    //     $i+=3;
    //     continue;
    // } else if ($aEntradas[$i] == 'w' 
    // && $aEntradas[$i + 1] ==  'h' 
    // && $aEntradas[$i + 2] ==  'i' 
    // && $aEntradas[$i + 3] ==  'l'
    // && $aEntradas[$i + 4] ==  'e') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'WHILE'; 
    //     $aLexema[] = 'while';
    //     $i+=4;
    //     continue;
    // } else if ($aEntradas[$i] == 'p' 
    // && $aEntradas[$i + 1] ==  'r'
    // && $aEntradas[$i + 2] ==  'i'
    // && $aEntradas[$i + 3] ==  'n'
    // && $aEntradas[$i + 4] ==  't') {
    //     $aEstados[] = $i - 3;
    //     $aTokens[] = 'PRINT'; 
    //     $aLexema[] = 'print'; 
    //     $i+=4;
    //     continue;
    // } else if ($aEntradas[$i] == ' ') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'ESPACO'; 
    //     $aLexema[] = ' '; 
    // } else if ($aEntradas[$i] == '=' || $aEntradas[$i] == '>' || $aEntradas[$i] == '<') {
    //     if ($aEntradas[$i + 1] == '=') {
    //         $aEstados[] = $i;
    //         $aTokens[] = 'OPERADORLOGICO'; 
    //         $aLexema[] = sprintf('%s%s', $aEntradas[$i], $aEntradas[$i + 1]);
    //     } else if ($aEntradas[$i - 1] != '=') {
    //         $aEstados[] = $i;
    //         $aTokens[] = 'OPERADORLOGICO'; 
    //         $aLexema[] = $aEntradas[$i];
    //     }
    // } else if ($aEntradas[$i] == '-' || $aEntradas[$i] == '+' || $aEntradas[$i] == '*' || $aEntradas[$i] == '/') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'OPERADOR'; 
    //     $aLexema[] = $aEntradas[$i];
    // } else if ($aEntradas[$i] == '(' || $aEntradas[$i] == ')' || $aEntradas[$i] == '{' || $aEntradas[$i] == '}') {
    //     $aEstados[] = $i;
    //     $aTokens[] = 'SIMBOLO'; 
    //     $aLexema[] = $aEntradas[$i];
    // } else if (is_numeric($aEntradas[$i])) {
    //     if (!is_numeric($aEntradas[$i + 1])) {
    //         $aTokens[] = 'NUMERO'; 
    //         $aEstados[] = $i;
    //         $aLexema[] = $aEntradas[$i];
    //     } else {
    //         $j = $i;
    //         while (is_numeric($aEntradas[$i])) {
    //             $aTokens[$j] = 'NUMERO'; 
    //             $aEstados[$j] = $j;
    //             $aLexema[$j] = sprintf('%s%s', !empty($aLexema[$j]) ? $aLexema[$j] : '', $aEntradas[$i]);
    //             $i++;
    //         }
    //         $i--;
    //     }
    // } else if (array_search($aEntradas[$i], $aAlfabeto)) {
    //     if (!array_search($aEntradas[$i + 1], $aAlfabeto)) {
    //         $aTokens[] = 'VARIAVEL'; 
    //         $aEstados[] = $i;
    //         $aLexema[] = $aEntradas[$i];
    //     } else {
    //         $j = $i;
    //         while (array_search($aEntradas[$i], $aAlfabeto)) {
    //             $aTokens[$j] = 'VARIAVEL'; 
    //             $aEstados[$j] = $j;
    //             $aLexema[$j] = sprintf('%s%s', !empty($aLexema[$j]) ? $aLexema[$j] : '', $aEntradas[$i]);
    //             $i++;
    //         }
    //         $i--;
    //     } 
    // } else {
    //     print('Token inválido');
    // }
}
var_dump($aEstados);

$sTr = '<tr>%s%s%s</tr>';
$aTrs = [];
foreach ($aTokens as $i => $sVal) {
    $sTdToken = sprintf('<td>%s</td>', $aTokens[$i]);
    $sTdLexema = sprintf('<td>%s</td>', $aLexema[$i]);
    $sTdEstados = sprintf('<td>%s</td>', $aEstados[$i]);
    $aTrs[] = sprintf($sTr, $sTdToken, $sTdLexema, $sTdEstados);
}
?>
<table>
    <thead>
        <th>Token</th>
        <th>Lexema</th>
        <th>Estado</th>
    </thead>
    <tbody>
        <?=implode('', $aTrs)?>
    </tbody>
</table>
<?php
// FIM TABELA SIMULADOR LEXICO

//INICIO TABELA ANALISE LEXICA

// $aNumeros = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
// $aSimbolos = ['(', ')', '{', '}'];
// $aOperadores = ['*', '+', '-', '/'];
// $aOperadoresLogicos = ['=', '<', '>'];
// $aEspaco = [' '];

// $iQtd = count($aAlfabeto) + count($aNumeros) + count($aSimbolos) + count($aOperadores) + count($aOperadoresLogicos) + count($aEspaco);

// $aElementosTds = [];

// $sElementosTds = '<th>%s</th>';

// $aElementosTds[] = '<th> </th>';

// foreach ($aNumeros as $iNum) {
//     $aElementosTds[] = sprintf($sElementosTds, $iNum);
// }
// foreach ($aSimbolos as $sVal) {
//     $aElementosTds[] = sprintf($sElementosTds, $sVal);
// }
// foreach ($aOperadores as $sVal) {
//     $aElementosTds[] = sprintf($sElementosTds, $sVal);
// }
// foreach ($aOperadoresLogicos as $sVal) {
//     $aElementosTds[] = sprintf($sElementosTds, $sVal);
// }
// foreach ($aAlfabeto as $sVal) {
//     $aElementosTds[] = sprintf($sElementosTds, $sVal);
// }

// $iCount = 0;
// for ($i=$iQtd; $i >= 0; $i--) { 
//     $iCount++;
// }

?>

<!-- <table>
    <thead>
        <tr>
            <th>Estado</th>
            <th>Token Retornado</th>
            <th>
                Entrada
                <tr>
                    <?=implode('', $aElementosTds)?>
                </tr>
            </th>
        </tr>
    <tbody>

    </tbody>
</table> -->