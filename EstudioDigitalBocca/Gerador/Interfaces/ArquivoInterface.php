<?php

/**
 * ArquivoInterface.php
 * 
 * Interface para uma entidade de Arquivo Padrão.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador\Interfaces;

interface ArquivoInterface {

    /**
     * Altera o Nome do arquivo.
     *
     * @param string $nome O novo nome.
     * @return void
     */
    public function setNome($nome);    
    
    /**
     * Altera o Conteudo do arquivo.
     *
     * @param string $conteudo O novo Conteúdo.
     * @return void
     */
    public function setConteudo($conteudo);

    /**
     * Altera a extensão do arquivo.
     *
     * @param string $extensao A nova extensão.
     * @return void
     */
    public function setExtensao($extensao);
    
    /**
     * Altera o caminho de escrita do Arquivo.
     *
     * @param string $caminho O novo Caminho
     * @return void
     */
    public function setCaminho($caminho);

    /**
     * Retorna uma entidade Arquivo.
     *
     * @return array Um array associativo contendo as informações da Entidade.
     */
    public function retornaArquivo();

}