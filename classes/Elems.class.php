<?php
class Elems extends AbstractAssembly {
    private $sAtrib;
    private $oPamdec;
    private $sAp;
    private $oParam;
    private $sFp;
    private $sPv;
    

    /**
     * Get the value of sAtrib
     */
    public function getSAtrib() {
        return $this->sAtrib;
    }

    /**
     * Set the value of sAtrib
     */
    public function setSAtrib($sAtrib) {
        $this->sAtrib = $sAtrib;
    }

    /**
     * Get the value of oPamdec
     */
    public function getOPamdec() {
        return $this->oPamdec;
    }

    /**
     * Set the value of oPamdec
     */
    public function setOPamdec($oPamdec) {
        $this->oPamdec = $oPamdec;
    }

    /**
     * Get the value of sAp
     */
    public function getSAp() {
        return $this->sAp;
    }

    /**
     * Set the value of sAp
     */
    public function setSAp($sAp) {
        $this->sAp = $sAp;
    }

    /**
     * Get the value of oParam
     */
    public function getOParam() {
        return $this->oParam;
    }

    /**
     * Set the value of oParam
     */
    public function setOParam($oParam) {
        $this->oParam = $oParam;
    }

    /**
     * Get the value of sFp
     */
    public function getSFp() {
        return $this->sFp;
    }

    /**
     * Set the value of sFp
     */
    public function setSFp($sFp) {
        $this->sFp = $sFp;
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
        $oPamdec = $this->getOPamdec();
        if (!empty($this->getSAtrib())) {
            $sCodigo = sprintf('= %s', $oPamdec->getSCodigoAssembly());
            $this->setSCodigoAssembly($sCodigo);
        }
    }
}