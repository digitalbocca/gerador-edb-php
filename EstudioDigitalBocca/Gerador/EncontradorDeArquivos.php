<?php

/**
 * EncontradorDeArquivos.php
 * 
 * Encontra os Arquivos dentro de um diretório.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v2.0
 */

namespace EstudioDigitalBocca\Gerador;

use EstudioDigitalBocca\Gerador\Interfaces\RetornoDeListaInterface;

class EncontradorDeArquivos implements RetornoDeListaInterface {

    /**
     * Lista de Arquivos do Diretório.
     *
     * @var array $listaDeArquivos
     */
    private $listaDeArquivos;

    /**
     * Remove Niveis de Diretório Acima.
     *
     * @param int $quantidade Quantidade de Níveis Acima para serem Removidos.
     * @return void
     */
    private function removeNivel($quantidade){
        for($i = 0; $i < $quantidade; $i++){
            array_shift($this->listaDeArquivos);
        }
    }

    /**
     * Recebe um diretório e cria uma lista de arquivos.
     *
     * @param string $nome Nome do diretório que será analisado.
     * @param string $caminho O caminho do diretório (PADRÃO: "./").
     * 
     * @return void
     */
    public function __construct($nome, $caminho = "./"){
        $diretorio = $caminho . $nome;
        $this->listaDeArquivos = scandir($diretorio);
        $this->removeNivel(2);
    }

    /**
     * Retorna a Lista de Arquivos do Diretório.
     * Metodo da Interface RetornoDeListaInterface.
     *
     * @return array $listaDeArquivos A Lista de arquivos do diretório.
     */
    public function retornaLista(){
        return $this->listaDeArquivos;
    }

}