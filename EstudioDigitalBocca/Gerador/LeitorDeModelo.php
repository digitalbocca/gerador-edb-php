<?php

/**
 * LeitorDeModelo.php
 * 
 * Lê modelos de arquivos.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador;

use EstudioDigitalBocca\Gerador\Interfaces\RetornoDeConfiguracaoInterface as RCI;

class LeitorDeModelo {

    private $modelo;

    public function __construct(RCI $conf, $tipo){
        $configuracao = $conf->retornaConfiguracao();
        require "modelos/" . $tipo . ".php";
        $this->modelo = $modelo;
    }

    public function retornaModelo(){
        return $this->modelo;
    }
}