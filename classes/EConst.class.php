<?php
class EConst extends AbstractAssembly {
    private $sOpe;
    private $sLexOpe;
    private $sId;
    private $sPv;

    /**
     * Get the value of sOpe
     */
    public function getSOpe() {
        return $this->sOpe;
    }

    /**
     * Set the value of sOpe
     */
    public function setSOpe($sOpe) {
        $this->sOpe = $sOpe;
    }

    /**
     * Get the value of sLexOpe
     */
    public function getSLexOpe() {
        return $this->sLexOpe;
    }

    /**
     * Set the value of sLexOpe
     */
    public function setSLexOpe($sLexOpe) {
        $this->sLexOpe = $sLexOpe;
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
     * Get the value of sPv
     */
    public function getSPv() {
        return $this->sPv;
    }

    /**
     * Set the value of sPv
     */
    public function setSPv($sPv) {
        $this->sPv = $sPv;
    }

    public function toAssembly() {
        if (!empty($this->getSId())) {
            $sCodigo = sprintf('%s $%s <br>', $this->getSLexOpe(), $this->getSEndereco());
        } else {
            $sCodigo = sprintf('<br>');
        }
        $this->setSCodigoAssembly($sCodigo);
    }
}