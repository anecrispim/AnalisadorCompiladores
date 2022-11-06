<?php
class Compilador {
    private $sCadeia;
    private $aEntradas;
    private $aTokens;
    private $aLexemas;
    private $aEstados;
    private $aPosicoes;
    private $aMatrizTransicao;
    private $aEstadosFinais;
    private $aEstadosEspeciais;
    private $aNaoConcatena;
    private $aNaoTerminal;
    private $aTabelaM;
    private $aAction;
    private $aGoTo;

    function __construct(
        $sCadeia
        , $sArquivoMatrizTransicao
        , $aEstadosFinais
        , $aEstadosEspeciais
        , $aNaoConcatena
        , $aNaoTerminal
        , $sArquivoTabelaM
        , $aAction
        , $aGoTo) 
    {
        $this->setSCadeia($sCadeia);
        $sJson = file_get_contents($sArquivoMatrizTransicao);
        $this->setAEntradas(str_split(strtolower($sCadeia)));
        $this->setAMatrizTransicao(json_decode($sJson, true));
        $this->setAEstadosFinais($aEstadosFinais);
        $this->setAEstadosEspeciais($aEstadosEspeciais);
        $this->setANaoConcatena($aNaoConcatena);
        $this->setANaoTerminal($aNaoTerminal);
        $sJson = file_get_contents($sArquivoTabelaM);
        $this->setATabelaM(json_decode($sJson, true));
        $this->setAAction($aAction);
        $this->setAGoTo($aGoTo);
    }

    /**
     * Retorna a cadeia
     * 
     * @return string
     */
    public function getSCadeia() {
        return $this->sCadeia;
    }

    /**
     * Seta a cadeia
     * 
     * @param string $sCadeia
     */
    public function setSCadeia($sCadeia) {
        $this->sCadeia = $sCadeia;
    }

    /**
     * Retorna o valor das entradas, onde cada caracter da cadeia representa uma entrada
     * 
     * @return array
     */
    public function getAEntradas() {
        return $this->aEntradas;
    }

    /**
     * Seta a valor das entradas, onde cada caracter da cadeia representa uma entrada
     * 
     * @param array $aEntradas
     */
    public function setAEntradas($aEntradas) {
        $this->aEntradas = $aEntradas;
    }

    /**
     * Retorna um array com os tokens
     * 
     * @return array
     */
    public function getATokens() {
        return $this->aTokens;
    }

    /**
     * Seta um array com os tokens
     * 
     * @param array $aTokens
     */
    public function setATokens($aTokens) {
        $this->aTokens = $aTokens;
    }

    /**
     * Retorna um array com os lexemas
     * 
     * @return array
     */
    public function getALexemas() {
        return $this->aLexemas;
    }

    /**
     * Seta um array com os lexemas
     * 
     * @param array $aLexemas
     */
    public function setALexemas($aLexemas) {
        $this->aLexemas = $aLexemas;
    }

    /**
     * Retorna um array de estados
     * 
     * @return array
     */
    public function getAEstados() {
        return $this->aEstados;
    }

    /**
     * Seta um array dos estados
     * 
     * @param array $aEstados
     */
    public function setAEstados($aEstados) {
        $this->aEstados = $aEstados;
    }

    /**
     * Retorna um array das posições
     * 
     * @return array
     */
    public function getAPosicoes() {
        return $this->aPosicoes;
    }

    /**
     * Seta um array das posições
     * 
     * @param array $aPosicoes
     */
    public function setAPosicoes($aPosicoes) {
        $this->aPosicoes = $aPosicoes;
    }

    /**
     * Retorna um array com a matriz de transição
     * 
     * @return array
     */
    public function getAMatrizTransicao()
    {
        return $this->aMatrizTransicao;
    }

    /**
     * Seta um array com a matriz de transição
     * 
     * @param array $aMatrizTransicao
     */
    public function setAMatrizTransicao($aMatrizTransicao) {
        $this->aMatrizTransicao = $aMatrizTransicao;
    }

    /**
     * Retorna um array com os estados finais da linguagem
     * 
     * @return array
     */
    public function getAEstadosFinais() {
        return $this->aEstadosFinais;
    }

    /**
     * Seta um array com os estados finais
     * 
     * @param array $aEstadosFinais
     */
    public function setAEstadosFinais($aEstadosFinais) {
        $this->aEstadosFinais = $aEstadosFinais;
    }

    /**
     * Retorna um array com os estados especiais
     * 
     * @return array
     */
    public function getAEstadosEspeciais() {
        return $this->aEstadosEspeciais;
    }

    /**
     * Seta um valor com os estados especiais
     * 
     * @param array $aEstadosEspeciais
     */
    public function setAEstadosEspeciais($aEstadosEspeciais) {
        $this->aEstadosEspeciais = $aEstadosEspeciais;
    }

    /**
     * Retorna um array com os tokens que não devem ter concatenação no reconhecimento dos lexemas
     * 
     * @return array
     */
    public function getANaoConcatena() {
        return $this->aNaoConcatena;
    }

    /**
     * Seta um array com os tokens que não devem ter concatenação no reconhecimento dos lexemas
     * 
     * @param array $aNaoConcatena
     */
    public function setANaoConcatena($aNaoConcatena) {
        $this->aNaoConcatena = $aNaoConcatena;
    }

    /**
     * Retorna um array com os não terminais
     * @return array
     */
    public function getANaoTerminal() {
        return $this->aNaoTerminal;
    }

    /**
     * Seta o array com os não terminais
     * 
     * @param array $aNaoTerminal
     */
    public function setANaoTerminal($aNaoTerminal) {
        $this->aNaoTerminal = $aNaoTerminal;
    }

    /**
     * Retorna um array com a matriz da Tabela M
     * 
     * @return array
     */
    public function getATabelaM()
    {
        return $this->aTabelaM;
    }

    /**
     * Seta um array com a matriz da tabela M
     * 
     * @param array $aTabelaM
     */
    public function setATabelaM($aTabelaM) {
        $this->aTabelaM = $aTabelaM;
    }

    /**
     * Retorna um array com as ações
     * 
     * @return array
     */
    public function getAAction() {
        return $this->aAction;
    }

    /**
     * Seta o array com as ações
     * 
     * @param array $aAction
     */
    public function setAAction($aAction) {
        $this->aAction = $aAction;
    }

    /**
     * Retorna um array com a tabela go to
     * 
     * @return array
     */
    public function getAGoTo() {
        return $this->aGoTo;
    }

    /**
     * Seta o array com a tabela go to
     * 
     * @param array $aGoTo
     */
    public function setAGoTo($aGoTo) {
        $this->aGoTo = $aGoTo;
    }

    /**
     * Realiza a analise léxica
     * 
     * @return void|string
     */
    public function analisadorLexico() {
        $sLexema = '';
        $sEstado = '';
        $iEstado = 0;
        $aEntradas = $this->getAEntradas();
        $aMatrizTransicao = $this->getAMatrizTransicao();
        $aEstadosFinais = $this->getAEstadosFinais();
        $aEstadosEspeciais = $this->getAEstadosEspeciais();
        $aNaoConcatena = $this->getANaoConcatena();

        $aEstados = [];
        $aPosicao = [];
        $aTokens = [];
        $aLexema = [];
        for ($i = 0; $i < count($aEntradas); $i++) {
            $iEstado = $aMatrizTransicao[$iEstado][$aEntradas[$i]];
            if (!empty($aEstadosFinais[$iEstado])) {
                $aEstados[] = $iEstado;
                $aPosicao[] = $i;
                $aTokens[] = $aEstadosFinais[$iEstado];
                $aLexema[] = $aEntradas[$i];
                if (!empty($aEstadosEspeciais[$iEstado])) {
                    for ($j=(strlen($aEstadosEspeciais[$iEstado])-1); $j >= 1; $j--) { 
                        unset($aPosicao[$i - $j]);
                        unset($aTokens[$i - $j]);
                        $sLexema = sprintf('%s%s', $sLexema, $aLexema[$i - $j]);
                        $sEstado = sprintf('%s,%s', $sEstado, $aEstados[$i - $j]);
                        unset($aLexema[$i - $j]);
                        unset($aEstados[$i - $j]);
                    }
                    $aTokens[$i] = $aEstadosEspeciais[$iEstado];
                    $aLexema[$i] = sprintf('%s%s', $sLexema, $aLexema[$i]);
                    $aEstados[$i] = str_replace(',,', ',', ltrim(sprintf('%s,%s', $sEstado, $aEstados[$i]), ','));
                    $aPosicao[$i] = $i - (strlen($aEstadosEspeciais[$iEstado])-1);
                    $sLexema = '';
                    $sEstado = '';
                } else if ($i != 0 && !in_array($aTokens[$i], $aNaoConcatena)) {
                    if ($aTokens[$i] == $aTokens[$i - 1]) {
                        $aEstados[$i - 1] = str_replace(',,', ',', ltrim(sprintf(',%s,%s', $aEstados[$i - 1], $iEstado), ','));
                        $aLexema[$i - 1] = sprintf('%s%s', $aLexema[$i - 1], $aEntradas[$i]);
                        unset($aEstados[$i]);
                        unset($aLexema[$i]);
                        unset($aPosicao[$i]);
                        unset($aTokens[$i]);
                    }
                }                              
            } else {
                $sErro = '
                    <div class="ui negative message">
                        <i class="close icon"></i>
                        <div class="header">Erro Léxico identificado!</div>
                        <p>Token não identificado para o lexema "%s"</p>
                    </div>
                ';
                printf($sErro, $aEntradas[$i]);
                break;
            }
        }
        $this->setATokens($aTokens);
        $this->setALexemas($aLexema);
        $this->setAEstados($aEstados);
        $this->setAPosicoes($aPosicao);
    }

    /**
     * Adiciona um elemento a pilha
     * 
     * @param string $sProducao
     * @param array $aPilha
     * 
     * @return array
     */
    public function addElmPilha($sProducao, $aPilha) {
        $aInicio = explode(' ', $sProducao);
        for ($i=(count($aInicio)-1); $i >= 0; $i--) { 
            array_push($aPilha, $aInicio[$i]);
        }
        return $aPilha;
    }

    /**
     * Seleciona o proximo token
     * 
     * @param $aTks
     * 
     * @return string 
     */
    public function nextToken($aTks) {
        global $iContFuncao;
        $iContFuncao++;
        return $aTks[$iContFuncao];
    }

    /**
     * Realiza a análise sintática através de descendencia preditiva (prevendo os proximos tokens)
     * 
     * @return array
     */
    public function analisadorSintaticoDescendentePreditivo() {
        $aTks = [];
        foreach ($this->getATokens() as $sToken) { 
            $aTks[] = $sToken;
        }

        $aPilha[] = '$';
        $x = $aTks[0];
        $aTabelaM = $this->getATabelaM();
        $aPilha = $this->addElmPilha($aTabelaM['FUNC']['FUNCTION'], $aPilha);
        while (count($aPilha) > 1) {
            $sTopo = end($aPilha);
            print_r($aPilha);
            if (!in_array($sTopo, $this->getANaoTerminal())) {
                printf(" |-----| Token (%s) <br>", $x);
                //print("<br>");
                if ($sTopo == "") {
                    array_pop($aPilha);
                } else if ($sTopo == $x) {
                    array_pop($aPilha);
                    $x = $this->nextToken($aTks);
                } else {
                    print('Erro!');
                    exit();
                }
            } else {
               $sProducao = $aTabelaM[$sTopo][$x];
               //print($sProducao);
               print("<br>");
               array_pop($aPilha);
               $aPilha = $this->addElmPilha($sProducao, $aPilha);
            }
        }
        return $aPilha;
    }

    /**
     * Realiza a análise sintática de forma ascentende simulando um analisador SLR
     * 
     * @return void
     */
    public function analisadorSLR() {
        $aTks = [];
        foreach ($this->getATokens() as $sToken) { 
            $aTks[] = $sToken;
        }
        $aAction = $this->getAAction();
        $aGoTo = $this->getAGoTo();

        $aPilhaEstados[] = 0;
        $a = $aTks[0];

        $iCont = 0;
        while (true) {
            $s = end($aPilhaEstados);
            printf('<br>%s<br>', $a);
            printf('Pilha estados: %s', implode(',', $aPilhaEstados));
            if (strpos($aAction[$s][$a], 'S') !== false) {
                $t = intval(str_replace('S', '', $aAction[$s][$a]));
                array_push($aPilhaEstados, $t);
                $a = $this->nextToken($aTks);
            } else if (strpos($aAction[$s][$a], 'R') !== false){
                $r = intval(str_replace('R', '', $aAction[$s][$a]));
                print($aTks[$iCont]);
                array_splice($aPilhaEstados, $r);
                $g = $aGoTo[$s];
                array_push($aPilhaEstados, $g);
            } else if ($aAction[$s][$a] == 'ACC') {
                exit;
            } else {
                $sErro = 'Erro na análise sintática';
                exit;
            }
            $iCont++;
        }
    }
    public function analisadorSemantico() {
        $oPrograma = new Programa();
        $oFunction = new Funcao();
        $oParam = new Parametro();
        foreach ($this->getATokens() as $sToken) { 
            if ($sToken == 'FUNCTION') {
                $oFunction->setSFunction($sToken);
                continue;
            } else if ($sToken == 'ID' && !empty($oFunction->getSFunction())) {
                $oFunction->setSId($sToken);
                continue;
            } else if ($sToken == 'AP' && !empty($oFunction->getSId())) {
                $oFunction->setSAp($sToken);
                continue;
            } else if ($sToken == 'INT' && !empty($oFunction->getSAp())) {

            }

            return false;
        }
    }
}
?>