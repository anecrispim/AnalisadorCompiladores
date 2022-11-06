<?php
class Programa {
    private $oFunction;

    /**
     * Retorna o objeto Funcao
     * @return object
     */
    public function getOFunction() {
        return $this->oFunction;
    }

    /**
     * Seta o objeto Funcao
     * @param object $oFunction
     */
    public function setOFunction($oFunction) {
        $this->oFunction = $oFunction;
    }
}
?>