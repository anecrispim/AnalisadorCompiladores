<div class="ui segment">
    <h4 class="ui dividing header">Analisador Sintático Descendente Preditivo</h4>
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

$iContFuncao = 0;

print_r($oCompilador->analisadorSintaticoDescendentePreditivo());
?>
</div>