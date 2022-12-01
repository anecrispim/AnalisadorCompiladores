<?php
abstract class AbstractAssembly {
    private $sCodigoAssembly;
    private $sEndereco;

    /**
     * Get the value of sCodigoAssembly
     */
    public function getSCodigoAssembly() {
        return $this->sCodigoAssembly;
    }

    /**
     * Set the value of sCodigoAssembly
     */
    public function setSCodigoAssembly($sCodigoAssembly) {
        $this->sCodigoAssembly = $sCodigoAssembly;
    }

    /**
     * Get the value of sEndereco
     */
    public function getSEndereco() {
        return $this->sEndereco;
    }

    /**
     * Set the value of sEndereco
     */
    public function setSEndereco($sEndereco) {
        $this->sEndereco = $sEndereco;
    }

    abstract protected function toAssembly();
}