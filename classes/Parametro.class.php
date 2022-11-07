<?php
class Parametro {
    private $sInt;
    private $sId;
    private $oVirg;

    /**
     * Retorna o token INT
     */
    public function getSInt() {
        return $this->sInt;
    }

    /**
     * Seta o token INT
     */
    public function setSInt($sInt) {
        $this->sInt = $sInt;
    }

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
     * Get the value of oVirg
     */
    public function getOVirg() {
        return $this->oVirg;
    }

    /**
     * Set the value of oVirg
     */
    public function setOVirg($oVirg) {
        $this->oVirg = $oVirg;
    }
}