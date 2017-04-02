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

    /**
     * Nome do arquivo.
     *
     * @var string
     */
    private $nome;

    /**
     * Extensao do arquivo.
     *
     * @var string
     */
    private $extensao;

    /**
     * Caminho de destino do arquivo.
     *
     * @var string
     */
    private $caminho;

    /**
     * Conteúdo do Arquivo.
     *
     * @var string
     */
    private $conteudo;

    /**
     * Constrói uma Entidade Arquivo.
     *
     * @param string $extensao Valor Padrão ".html"
     * @param string $caminho Valor Padrão "./gerados/"
     */
    public function __construct($extensao = ".html", $caminho = "./gerados/"){
        $this->extensao = $extensao;
        $this->caminho = $caminho;
    }

    /**
     * Altera o Nome do Arquivo.
     * Metodo da Interface ArquivoInterface.
     *
     * @param string $nome 
     * @return void
     */
    public function setNome($nome){
        $this->nome = $nome;
    }

    /**
     * Altera o Conteúdo do Arquivo.
     * Metodo da Interface ArquivoInterface.
     *
     * @param string $conteudo
     * @return void
     */
    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }

    /**
     * Altera a Extensão do Arquivo.
     * Metodo da Interface ArquivoInterface. 
     *
     * @param string $extensao
     * @return void
     */
    public function setExtensao($extensao){
        $this->extensao = $extensao;
    }

    /**
     * Altera o Caminho de Destino do Arquivo.
     * Metodo da Interface ArquivoInterface.
     *
     * @param string $caminho
     * @return void
     */
    public function setCaminho($caminho){
        $this->caminho = $caminho;
    }

    /**
     * Retorna um array associativo contendo as informações da entidade.
     * Metodo da Interface ArquivoInterface.
     *
     * @return array
     */
    public function retornaArquivo(){
        return array(
            "nome"     => $this->nome,
            "extensao" => $this->extensao,
            "caminho"  => $this->caminho,
            "conteudo" => $this->conteudo
        );
    }
}