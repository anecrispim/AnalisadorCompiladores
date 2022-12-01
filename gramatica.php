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
    <a class="item active" href="gramatica.php">Definições da gramática</a>
    <a class="item" href="index.php?tipo=lexico">Analisador Léxico</a>
    <a class="item" href="index.php?tipo=sintDesc">Analisador Sintático Descendente</a>
    <a class="item" href="index.php?tipo=sintDescPred">Analisador Sintático Descendente Preditivo</a>
    <a class="item" href="index.php?tipo=sintSLR">Analisador Sintático Ascendente SLR</a>
    <a class="item" href="index.php?tipo=semantico">Analisador Semântico</a>
    <a class="item" href="index.php?tipo=gc">Geração código</a>
</div>
<div class="ui three column grid">
    <div class="column">
        <h4 class="ui header">Gramática</h4>
        <p>
        <pre>
        &lt;FUNC&gt; ::= FUNCTION ID AP &lt;PARAM&gt; FP &lt;BLOCO&gt;;
        &lt;PARAM&gt; ::= INT ID &lt;VIRGULA&gt;;
        &lt;VIRGULA&gt; ::= VIRG &lt;PARAM&gt; | i;
        &lt;BLOCO&gt; ::= AC &lt;ELEMENTOS&gt; FC;
        &lt;SE&gt; ::= IF AP ID OPELOG CONST FP &lt;BLOCO&gt;;
        &lt;WHI&gt; ::= WHILE AP ID &lt;PAMW&gt; FP &lt;BLOCO&gt;;
        &lt;PAMW&gt; ::= OPELOG CONST;
        &lt;PRIN&gt; ::= PRINT AP ID FP PV;
        &lt;CHAM&gt; ::= ID &lt;ELEMS&gt;;
        &lt;ELEMS&gt; ::= ATRIB &lt;PAMDEC&gt; | AP &lt;PARAM&gt; FP PV;
        &lt;PAMDEC&gt; ::= ID OPE &lt;EID&gt; | CONST &lt;ECONST&gt;;
        &lt;EID&gt; ::=  ID PV | CONST PV;
        &lt;ECONST&gt; ::=  OPE ID | PV;
        &lt;ELEMENTOS&gt; ::= &lt;SE&gt;|&lt;WHI&gt;|&lt;PRIN&gt;|&lt;CHAM&gt;&lt;SEG&gt;;
        &lt;SEG&gt; ::= &lt;SE&gt; | î
        </pre>
        </p>
    </div>
    <div class="column">
        <h4 class="ui header">Conjunto de Firsts</h4>
        <p>
        <pre>
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
        </pre>
        </p>
    </div>
    <div class="column">
        <h4 class="ui header">Conjunto de Follows</h4>
        <p>
        <pre>
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
        FOLLOW(SEG) = {$} PRINT, ID}
        </pre>
        </p>
    </div>
</div>
</body>
</html>