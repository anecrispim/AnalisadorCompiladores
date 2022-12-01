<?php
class Chamada extends AbstractAssembly {
    private $sId;
    private $oElems;
    private static $iCont = 3;

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
        $sCodigo = sprintf('$%s %s', $this->iCont, $oElems->getSCodigoAssembly());
        $this->setSCodigoAssembly($sCodigo);
        $this->iCont++;
    }
}