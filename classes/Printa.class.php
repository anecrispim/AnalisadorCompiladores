<?php
class Printa extends AbstractAssembly {
    private $sPrint;
    private $sAp;
    private $sId;
    private $sFp;
    private $sPv;

    /**
     * Get the value of sPrint
     */
    public function getSPrint() {
        return $this->sPrint;
    }

    /**
     * Set the value of sPrint
     */
    public function setSPrint($sPrint) {
        $this->sPrint = $sPrint;
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
        $sCodigo = sprintf('<br>lb%s: <br> move $a0, $v0 <br> syscall', $this->getSEndereco());
        $this->setSCodigoAssembly($sCodigo);
    }
}