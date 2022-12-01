<?php
class Bloco {
    private $sAc;
    private $sFc;
    private $oElementos;
    private $iEndereco;

    function __construct($i) {
        $this->setIEndereco($i+1);
    }

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

    /**
     * Get the value of iEndereco
     */
    public function getIEndereco() {
        return $this->iEndereco;
    }

    /**
     * Set the value of iEndereco
     */
    public function setIEndereco($iEndereco) {
        $this->iEndereco += $iEndereco;
    }
}