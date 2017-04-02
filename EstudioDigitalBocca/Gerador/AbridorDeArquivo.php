<?php

/**
 * AbridorDeArquivo.php
 * 
 * Abre um arquivo de configuração e retorna seu valor em array.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador;

use EstudioDigitalBocca\Gerador\Interfaces\RetornoDeConfiguracaoInterface;

class AbridorDeArquivo implements RetornoDeConfiguracaoInterface {
    
    private $arquivo;
    private $configuracao;

    private function lerArquivo(){
        $abrir = file_get_contents($this->arquivo);
        $this->configuracao = json_decode($abrir, true);
    }

    public function __construct($arquivo = false){
        if($arquivo != false){
            $this->trocaArquivo($arquivo);
        }
    }

    public function trocaArquivo($arquivo){
        $this->arquivo = $arquivo;
        $this->lerArquivo();
    }

    public function retornaConfiguracao(){
        return $this->configuracao;
    }
}