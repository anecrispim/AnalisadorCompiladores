<div class="ui segment">
    <h4 class="ui dividing header">Geração do código para Assembly MIPS</h4>
<?php
    $oFunction = $oPrograma->getOFunction();
    $oBloco = $oFunction->getOBloco();
    $oElementos = $oBloco->getOElementos();
    $oSeg = $oElementos->getOSeg();
    $oCham = $oElementos->getOCham();
    $oSe = $oSeg->getOSe();

    $oSe->toAssembly();
    $oCham->toAssembly();

    print($oCham->getSCodigoAssembly());
    print($oSe->getSCodigoAssembly());
?>
</div>