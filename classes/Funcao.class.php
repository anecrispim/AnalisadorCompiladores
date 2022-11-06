<?php
class Funcao {
    private $sFunction;
    private $sId;
    private $sAp;
    private $sFp;
    private $oParam;
    private $oBloco;

    /**
     * Retorna o token ID
     * 
     * @return string
     */
    public function getSId() {
        return $this->sId;
    }

    /**
     * Seta o token ID
     * @param string $sId
     */
    public function setSId($sId) {
        $this->sId = $sId;
    }

    /**
     * Retorna o token FUNCTION
     * 
     * @return string
     */
    public function getSFunction() {
        return $this->sFunction;
    }

    /**
     * Seta o token FUNCTION
     * @param string $sFunction
     */
    public function setSFunction($sFunction) {
        $this->sFunction = $sFunction;
    }

    /**
     * Retorna o token AP
     * @return string
     */
    public function getSAp() {
        return $this->sAp;
    }

    /**
     * Seta o token AP
     * @param string $sAp
     */
    public function setSAp($sAp) {
        $this->sAp = $sAp;
    }

    /**
     * Retorna o token FP
     * @return string
     */
    public function getSFp() {
        return $this->sFp;
    }

    /**
     * Seta o token FP
     * @param string FP
     */
    public function setSFp($sFp) {
        $this->sFp = $sFp;
    }

    /**
     * Retorna o objeto de Parametros
     * @return object
     */
    public function getOParam() {
        return $this->oParam;
    }

    /**
     * Seta o objeto de parametro
     * @param $oParam
     */
    public function setOParam($oParam) {
        $this->oParam = $oParam;
    }

    /**
     * Retorna o objeto de bloco
     * @return object
     */
    public function getOBloco() {
        return $this->oBloco;
    }

    /**
     * Seta o objeto de bloco
     * @param object $oBloco
     */
    public function setOBloco($oBloco) {
        $this->oBloco = $oBloco;
    }
}
?>