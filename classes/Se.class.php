<?php
class Se extends AbstractAssembly {
    private $sIf;
    private $sAp;
    private $sId;
    private $sOpeLog;
    private $sOpeLogLex;
    private $sConst;
    private $sConstLex;
    private $sFp;
    private $oBloco;

    /**
     * Get the value of sIf
     */
    public function getSIf() {
        return $this->sIf;
    }

    /**
     * Set the value of sIf
     */
    public function setSIf($sIf) {
        $this->sIf = $sIf;
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
     * Get the value of sOpeLog
     */
    public function getSOpeLog() {
        return $this->sOpeLog;
    }

    /**
     * Set the value of sOpeLog
     */
    public function setSOpeLog($sOpeLog) {
        $this->sOpeLog = $sOpeLog;
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
     * Get the value of oBloco
     */
    public function getOBloco() {
        return $this->oBloco;
    }

    /**
     * Set the value of oBloco
     */
    public function setOBloco($oBloco) {
        $this->oBloco = $oBloco;
    }

    /**
     * Get the value of sOpeLogLex
     */
    public function getSOpeLogLex() {
        return $this->sOpeLogLex;
    }

    /**
     * Set the value of sOpeLogLex
     */
    public function setSOpeLogLex($sOpeLogLex) {
        $this->sOpeLogLex = $sOpeLogLex;
    }

    /**
     * Get the value of sConstLex
     */
    public function getSConstLex() {
        return $this->sConstLex;
    }

    /**
     * Set the value of sConstLex
     */
    public function setSConstLex($sConstLex) {
        $this->sConstLex = $sConstLex;
    }
    
    /**
     * Transforma em assembly a condição if
     */
    public function toAssembly() {
        $sImmediate = sprintf('li $v1, %s <br>', $this->getSConstLex());
        if ($this->getSOpeLogLex() == "==") {
            $sCodigo = sprintf('%s beq $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        } else if ($this->getSOpeLogLex() == "!=") {
            $sCodigo = sprintf('%s bne $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        } else if ($this->getSOpeLogLex() == ">") {
            $sCodigo = sprintf('%s bgt $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        } else if ($this->getSOpeLogLex() == "<") {
            $sCodigo = sprintf('%s blt $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        } else if ($this->getSOpeLogLex() == ">=") {
            $sCodigo = sprintf('%s bge $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        } else if ($this->getSOpeLogLex() == "<=") {
            $sCodigo = sprintf('%s ble $v0, $v1, lb%s', $sImmediate, $this->getSEndereco());
        }
        $this->setSCodigoAssembly($sCodigo);
    }
}