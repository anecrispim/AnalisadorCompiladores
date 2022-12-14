<?php
class Chamada extends AbstractAssembly {
    private $sId;
    private $oElems;

    /**
     * Get the value of sId
     */
    public function getSId() {
        return $this->sId;
    }

    /**
     * Set the value of sId
     */
    public function setSId($sId) {
        $this->sId = $sId;
    }

    /**
     * Get the value of oElems
     */
    public function getOElems() {
        return $this->oElems;
    }

    /**
     * Set the value of oElems
     */
    public function setOElems($oElems) {
        $this->oElems = $oElems;
    }

    public function toAssembly() {
        $oElems = $this->getOElems();
        $oElems->toAssembly();
        $oPamdec = $oElems->getOPamdec();
        switch ($oPamdec->getSLexOpe()) {
            case '+':
                $sOperador = 'add';
                break;
            case '-':
                $sOperador = 'sub';
                break;
            case '*':
                $sOperador = 'mul';
                break;
            case '/':
                $sOperador = 'div';
                break;
        }
        $sCodigo = sprintf('%s $v%s %s', $sOperador, $this->getSEndereco(), $oElems->getSCodigoAssembly());
        $this->setSCodigoAssembly($sCodigo);
    }
}