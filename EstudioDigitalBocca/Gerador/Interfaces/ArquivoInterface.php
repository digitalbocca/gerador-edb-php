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

    public function setNome($nome);    
    public function setConteudo($conteudo);
    public function setExtensao($extensao);
    public function setCaminho($caminho);
    public function retornaArquivo();

}