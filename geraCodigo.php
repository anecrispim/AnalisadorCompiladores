<div class="ui segment">
    <h4 class="ui dividing header">Geração do código para Assembly MIPS</h4>
<?php
    $oFunction = $oPrograma->getOFunction();
    $oBloco = $oFunction->getOBloco();
    $oElementos = $oBloco->getOElementos();
    $oSeg = $oElementos->getOSeg();
    $oCham = $oElementos->getOCham();
    $oSe = $oSeg->getOSe();
    $oBlocoS = $oSe->getOBloco();
    $oElems = $oBlocoS->getOElementos();
    $oPrint = $oElems->getOPrint();

    $oElemsC = $oCham->getOElems();
    $oPamdec = $oElemsC->getOPamdec();
    $oEid = $oPamdec->getOEid();

    $oSe->toAssembly();
    $oCham->toAssembly();
    $oPrint->toAssembly();

    print ("
        .data <br>
        a: .word 5 <br>
        b: .word 1 <br>
        .text <br><br>
    ");

    print($oPamdec->getSLw());
    print($oEid->getSLw());
    print($oCham->getSCodigoAssembly());
    print($oSe->getSCodigoAssembly());
    print($oPrint->getSCodigoAssembly());
?>
</div>