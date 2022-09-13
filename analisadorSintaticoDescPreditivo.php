<?php
/*
----------------------------------------------------
GRAMÁTICA ANALISADOR:
----------------------------------------------------
<FUNC> ::= FUNCTION ID AP <PARAM> FP <BLOCO>;
<PARAM> ::= INT ID <VIRGULA>;
<VIRGULA> ::= VIRG <PARAM> | i;
<BLOCO> ::= AC <ELEMENTOS> FC;
<SE> ::= IF AP ID OPELOG CONST FP <BLOCO>;
<WHI> ::= WHILE AP ID <PAMW> FP <BLOCO>;
<PAMW> ::= OPELOG CONST;
<PRIN> ::= PRINT AP ID FP PV;
<CHAM> ::= ID <ELEMS>;
<ELEMS> ::= ATRIB <PAMDEC> | AP <PARAM> FP PV;
<PAMDEC> ::= ID OPE <EID> | CONST <ECONST>;
<EID> ::=  ID PV | CONST PV;
<ECONST> ::=  OPE ID | PV;
<ELEMENTOS> ::= <SE>|<WHI>|<PRIN>|<CHAM><SEG>;
<SEG> ::= <SE> | î;
----------------------------------------------------
COJUNTO DE FIRTS:
----------------------------------------------------
FIRST(FUNC) = {FUNCTION}
FIRT(PARAM) = {INT}
FIRST(VIRGULA) = {VIRG, VAZIO}
FIRST(BLOCO) = {AC}
FIRST(SE) = {IF}
FIRST(WHI) = {WHILE}
FIRST(PAMW) = {OPELOG}
FIRST(PRIN) = {PRINT}
FIRST(CHAM) = {ID}
FIRST(ELEMS) = {ATRIB, AP}
FIRST(PAMDEC) = {ID, CONST}
FIRST(EID) = {ID, CONST}
FIRST(ECONST) = {OPE, PV}
FIRST(ELEMENTOS) = {IF, WHILE, PRINT, ID}
FIRST(SEG) = {IF, VAZIO}
-----------------------------------------------------
CONJUNTO FOLLOWS
-----------------------------------------------------
FOLLOW(FUNC) = {$}
FOLLOW(PARAM) = {FP}
FOLLOW(VIRGULA) = {FP}
FOLLOW(BLOCO) = {$}
FOLLOW(SE) = {$}
FOLLOW(WHI) = {$}
FOLLOW(PAMW) = {FP}
FOLLOW(PRIN) = {$}
FOLLOW(CHAM) = {$}
FOLLOW(ELEMS) = {$}
FOLLOW(PAMDEC) = {$}
FOLLOW(EID) = {$}
FOLLOW(ECONST) = {$}
FOLLOW(ELEMENTOS) = {FC}
FOLLOW(SEG) = {$}
*/

//topo da pilha será sempre o último valor do array pilha
//o valor inicial do array pilha será '$'
print('<h3>Analisador Sintático Descendente Preditivo</h3>');

$aTks = [];
foreach ($aTokens as $sToken) { 
    $aTks[] = $sToken;
}

$aNaoTerminal = ['FUNC', 'PARAM', 'VIRGULA', 'BLOCO', 'SE', 'WHI', 'PAMW', 'PRIN', 'CHAM', 'ELEMS', 'PAMDEC', 'EID', 'ECONST', 'ELEMENTOS', 'SEG'];
$aPilha[] = '$';
$x = $aTks[0];
$sJson = file_get_contents('tabelaM.json');
$aTabelaM = json_decode($sJson, true);
addElmPilha($aTabelaM['FUNC']['FUNCTION']);

//var_dump($aPilha);


while (count($aPilha) > 1) {
    $sTopo = end($aPilha);
    print_r($aPilha);
    if (!in_array($sTopo, $aNaoTerminal)) {
        printf(" |-----| Token (%s) <br>", $x);
        //print("<br>");
        if ($sTopo == "") {
            array_pop($aPilha);
        } else if ($sTopo == $x) {
            array_pop($aPilha);
            $x = nextToken();
        } else {
            print('Erro!');
            exit();
        }
    } else {
       $sProducao = $aTabelaM[$sTopo][$x];
       //print($sProducao);
       print("<br>");
       array_pop($aPilha);
       addElmPilha($sProducao);
    }
}
print_r($aPilha);

$iContFuncao = 0;
function nextToken() {
    global $iContFuncao, $aTks;
    $iContFuncao++;
    return $aTks[$iContFuncao];
}
function addElmPilha($sElementos) {
    global $aPilha;
    $aInicio = explode(' ', $sElementos);
    for ($i=(count($aInicio)-1); $i >= 0; $i--) { 
        array_push($aPilha, $aInicio[$i]);
    }
}
?>