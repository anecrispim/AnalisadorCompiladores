<?php
/*
GRAMÁTICA ANALISADOR:
<FUNC> ::= FUNCTION ID AP <PARAM> <BLOCO>;
<PARAM> ::= INT ID <VIRGULA>;
<VIRGULA> ::= VIRG <PARAM> | FP;
<BLOCO> ::= AC <ELEMENTOS> FC;
<SE> ::= IF AP ID OPELOG CONST FP <BLOCO>;
<WHI> ::= WHILE AP ID <PAMW> <BLOCO>;
<PAMW> ::= OPELOG CONST FP | FP;
<PRIN> ::= PRINT AP ID FP PV;
<CHAM> ::= ID <ELEMS>;
<ELEMS> ::= ATRIB <PAMDEC> | AP <PARAM> PV;
<PAMDEC> ::= ID OPE <EID> | CONST <ECONST>;
<EID> ::=  ID PV | CONST PV;
<ECONST> ::=  OPE ID | PV;
<ELEMENTOS> ::= <SE>|<WHI>|<PRIN>|<CHAM><SEG>;
<SEG> ::= <SE> | î;
*/
$aTks = [];
foreach ($aTokens as $sToken) { 
    $aTks[] = $sToken;
}

$iCont = 0;
function term($sTermo) {
    global $iCont, $aTks;
    if ($aTks[$iCont] == $sTermo) {
        $iCont++;
        return true;
    }
    return false;
}
print('<br>');

function FUNC() {
    print(htmlspecialchars('<FUNC> ::= FUNCTION ID AP <PARAM> <BLOCO>;'));
    print('<br>');
    return term('FUNCTION') && term('ID') && term('AP') && PARAM() && BLOCO();
}
function PARAM() {
    print(htmlspecialchars('<PARAM> ::= INT ID <VIRGULA>;'));
    print('<br>');
    return term('INT') && term('ID') && VIRGULA();
}
function VIRGULA() {
    print(htmlspecialchars('<VIRGULA> ::= VIRG <PARAM> | FP;'));
    print('<br>');
    return (term('VIRG') && PARAM()) || (term('FP'));
}
function BLOCO() {
    print(htmlspecialchars('<BLOCO> ::= AC <ELEMENTOS> FC;'));
    print('<br>');
    return term('AC') && ELEMENTOS() && term('FC');
}
function SE() {
    print(htmlspecialchars('<SE> ::= IF AP ID OPELOG CONST FP <BLOCO>;'));
    print('<br>');
    return term('IF') && term('AP') && term('ID') && term('OPELOG') && term('CONST') && term('FP') && BLOCO();
}
function WHI() {
    print(htmlspecialchars('<WHI> ::= WHILE AP ID <PAMW> <BLOCO>;'));
    print('<br>');
    return term('WHILE') && term('AP') && term('ID') && PAMW() && BLOCO();
}
function PAMW() {
    print(htmlspecialchars('<PAMW> ::= OPELOG CONST FP | FP;'));
    print('<br>');
    return (term('OPELOG') && term('CONST') && term('FP')) || (term('FP'));
}
function PRIN() {
    print(htmlspecialchars('<PRIN> ::= PRINT AP ID FP PV;'));
    print('<br>');
    return term('PRINT') && term('AP') && term('ID') && term('FP') && term('PV');
}
function CHAM() {
    print(htmlspecialchars('<CHAM> ::= ID <ELEMS>;'));
    print('<br>');
    return term('ID') && ELEMS();
}
function ELEMS() {
    print(htmlspecialchars('<ELEMS> ::= ATRIB <PAMDEC> | AP <PARAM> PV;'));
    print('<br>');
    return (term('ATRIB') && PAMDEC()) || (term('AP') && PARAM() && term('PV'));
}
function PAMDEC() {
    print(htmlspecialchars('<PAMDEC> ::= ID OPE <EID> | CONST <ECONST>;'));
    print('<br>');
    return (term('ID') && term('OPE') && EID()) || (term('CONST') && ECONST());
}
function EID() {
    print(htmlspecialchars('<EID> ::=  ID PV | CONST PV;'));
    print('<br>');
    return (term('ID') && term('PV')) || (term('CONST') && term('PV'));
}
function ECONST() {
    print(htmlspecialchars('<ECONST> ::=  OPE ID | PV;'));
    print('<br>');
    return (term('OPE') && term('ID')) || (term('PV'));
}
function ELEMENTOS() {
    print(htmlspecialchars('<ELEMENTOS> ::= <SE>|<WHI>|<PRIN>|<CHAM><SEG>;'));
    print('<br>');
    return SE() || WHI() || PRIN() || (CHAM() && SEG());
}
function SEG() {
    print(htmlspecialchars('<SEG> ::= <SE> | î;'));
    print('<br>');
    if (SE()) {
        return true;
    } else if (term('PV')) {
        $iCont--;
        return true;
    } else {
        return false;
    }
}
?>