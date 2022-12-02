<?php
class Pamdec extends AbstractAssembly {
    private $sId;
    private $sOpe;
    private $sLexOpe;
    private $oId;
    private $sConst;
    private $oEconst;
    private $oEid;
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
     * Get the value of oId
     */
    public function getOId() {
        return $this->oId;
    }

    /**
     * Set the value of oId
     */
    public function setOId($oId) {
        $this->oId = $oId;
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
     * Get the value of oEconst
     */
    public function getOEconst() {
        return $this->oEconst;
    }

    /**
     * Set the value of oEconst
     */
    public function setOEconst($oEconst) {
        $this->oEconst = $oEconst;
    }

    /**
     * Get the value of oEid
     */
    public function getOEid() {
        return $this->oEid;
    }

    /**
     * Set the value of oEid
     */
    public function setOEid($oEid) {
        $this->oEid = $oEid;
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

    public function toAssembly() {
        if (!empty($this->getSId())) {
            $oEid = $this->getOEid();
            $oEid->toAssembly();
            $sLW = sprintf('lw $t%s, a <br>', $this->getSEndereco());
            $this->setSLw($sLW);
            $sCodigo = sprintf(
                '$t%s, %s'
                , $this->getSEndereco()
                , $oEid->getSCodigoAssembly()
            );
        } else {
            $sCodigo = sprintf(
                '%s %s'
                , $this->getSLexConst()
                , $this->getOEconst()->getSCodigoAssembly()
            );
        }
        $this->setSCodigoAssembly($sCodigo);
    }
}