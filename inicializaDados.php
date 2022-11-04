<?php
$sCadeia = str_replace(' ', '', $sCadeia);
$aEntradas = str_split(strtolower($sCadeia));
// $aEstadosFinais = [
//       1 => 'ESPACO'
//     , 2 => 'SIMBOLO' 
//     , 3 => 'OPERADOR'
//     , 4 => 'NUMERO'
//     , 5 => 'OPERADORLOGICO'
//     , 6 => 'OPERADORLOGICO'
//     , 7 => 'VARIAVEL'
//     , 8 => 'VARIAVEL'
//     , 9 => 'VARIAVEL'
//     , 10 => 'VARIAVEL'
//     , 11 => 'VARIAVEL'
//     , 12 => 'VARIAVEL'
//     , 13 => 'VARIAVEL'
//     , 14 => 'IF'
//     , 15 => 'VARIAVEL'
//     , 16 => 'VARIAVEL'
//     , 17 => 'FOR'
//     , 18 => 'VARIAVEL'
//     , 19 => 'VARIAVEL'
//     , 20 => 'VARIAVEL'
//     , 21 => 'VARIAVEL'
//     , 22 => 'PRINT'
//     , 23 => 'WHILE'
// ];
$aEstadosFinais = [
    1 => 'AP'
  , 2 => 'FP' 
  , 3 => 'OPE'
  , 4 => 'VIRG'
  , 5 => 'OPE'
  , 6 => 'CONST'
  , 7 => 'PV'
  , 8 => 'OPELOG'
  , 9 => 'ATRIB'
  , 10 => 'ID'
  , 11 => 'ID'
  , 12 => 'ID'
  , 13 => 'ID'
  , 14 => 'ID'
  , 15 => 'ID'
  , 16 => 'AC'
  , 17 => 'FC'
  , 18 => 'ID'
  , 19 => 'IF'
  , 20 => 'ID'
  , 21 => 'ID'
  , 22 => 'ID'
  , 23 => 'ID'
  , 24 => 'INT'
  , 25 => 'ID'
  , 26 => 'ID'
  , 27 => 'ID'
  , 28 => 'ID'
  , 29 => 'ID'
  , 30 => 'ID'
  , 31 => 'PRINT'
  , 32 => 'WHILE'
  , 33 => 'ID'
  , 34 => 'ID'
  , 35 => 'FUNCTION'
];

// $aEstadosEspeciais = [
//       14 => 'IF'
//     , 17 => 'FOR'
//     , 22 => 'PRINT'
//     , 23 => 'WHILE'
// ];

$aEstadosEspeciais = [
    19 => 'IF'
  , 24 => 'INT'
  , 31 => 'PRINT'
  , 32 => 'WHILE'
  , 35 => 'FUNCTION'
];

// $aNaoConcatena = [
//     2 => 'SIMBOLO'
//   , 3 => 'OPERADOR'
// ];
$aNaoConcatena = [
    3 => 'OPE'
  , 5 => 'OPE'
  ,17 => 'FC'
];

$aNaoTerminal = ['FUNC', 'PARAM', 'VIRGULA', 'BLOCO', 'SE', 'WHI', 'PAMW', 'PRIN', 'CHAM', 'ELEMS', 'PAMDEC', 'EID', 'ECONST', 'ELEMENTOS', 'SEG'];

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

require 'classes/Compilador.class.php';
//error_reporting(0);
// include('analisadorLexico.php');
// include('analisadorSintaticoDesc.php');

// include('analisadorSintaticoDescPreditivo.php');
// include('analisadorSLR.php');

// $aTks = [];
// foreach ($aTokens as $sToken) { 
//     $aTks[] = $sToken;
// }

$oCompilador = new Compilador(
  $sCadeia
  , 'matrizTransicao2.json'
  , $aEstadosFinais
  , $aEstadosEspeciais
  , $aNaoConcatena
  , $aNaoTerminal
  , 'tabelaM.json'
  , $aAction
  , $aGoTo
);

$iCont = 0;
function term($sTermo) {
    global $iCont, $aTks;
    if ($aTks[$iCont] == $sTermo) {
        $iCont++;
        return true;
    }
    return false;
}

?>