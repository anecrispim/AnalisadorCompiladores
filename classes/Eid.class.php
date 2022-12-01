<?php
class Eid extends AbstractAssembly {
    private $sId;
    private $sPv;
    private $sConst;
    private $sLexConst;

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

    /**
     * Get the value of sConst
     */
    public function getSConst() {
        return $this->sConst;
    }

    /**
     * Set the value of sConst
     */
    public function setSConst($sConst) {
        $this->sConst = $sConst;
    }

    /**
     * Get the value of sLexConst
     */
    public function getSLexConst() {
        return $this->sLexConst;
    }

    /**
     * Set the value of sLexConst
     */
    public function setSLexConst($sLexConst) {
        $this->sLexConst = $sLexConst;
    }

    public function toAssembly() {
        if (!empty($this->getSId())) {
            $sCodigo = sprintf(
                '$%s <br>'
                , $this->getSEndereco()
            );
        } else {
            $sCodigo = sprintf(
                '%s <br>'
                , $this->getSLexConst()
            );
        }
        $this->setSCodigoAssembly($sCodigo);
    }
}