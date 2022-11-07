<?php
class Bloco {
    private $sAc;
    private $sFc;
    private $oElementos;

    /**
     * Get the value of sAc
     */
    public function getSAc() {
        return $this->sAc;
    }

    /**
     * Set the value of sAc
     */
    public function setSAc($sAc) {
        $this->sAc = $sAc;
    }

    /**
     * Get the value of sFc
     */
    public function getSFc() {
        return $this->sFc;
    }

    /**
     * Set the value of sFc
     */
    public function setSFc($sFc) {
        $this->sFc = $sFc;
    }

    /**
     * Get the value of oElementos
     */
    public function getOElementos() {
        return $this->oElementos;
    }

    /**
     * Set the value of oElementos
     */
    public function setOElementos($oElementos) {
        $this->oElementos = $oElementos;
    }
}