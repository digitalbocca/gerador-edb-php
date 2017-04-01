<?php

/**
 * Arquivo.php
 * 
 * Entidade que contém as informações do arquivo.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador;

use EstudioDigitalBocca\Gerador\Interfaces\ArquivoInterface;

class Arquivo implements ArquivoInterface {

    private $nome;
    private $extensao;
    private $caminho;
    private $conteudo;

    public function __construct($extensao = ".html", $caminho = "./gerados/"){
        $this->extensao = $extensao;
        $this->caminho = $caminho;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }

    public function setExtensao($extensao){
        $this->extensao = $extensao;
    }

    public function setCaminho($caminho){
        $this->caminho = $caminho;
    }

    public function retornaArquivo(){
        return array(
            "nome"     => $this->nome,
            "extensao" => $this->extensao,
            "caminho"  => $this->caminho,
            "conteudo" => $this->conteudo
        );
    }
}