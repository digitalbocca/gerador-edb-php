<?php

/**
 * CriadorDeArquivo.php
 * 
 * Cria um arquivo.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador;

use EstudioDigitalBocca\Gerador\Interfaces\ArquivoInterface;

class CriadorDeArquivo {

    /**
     * Recebe uma Instancia que implementa ArquivoInterface
     * e cria um arquivo com as informações da Entidade passada.
     * 
     * @see EstudioDigitalBocca\Gerador\Interfaces\ArquivoInterface
     * @param ArquivoInterface $arquivo Instancia que implementa ArquivoInterface
     * @return void
     */
    public function __construct(ArquivoInterface $arquivo){ 
        $arquivo = $arquivo->retornaArquivo();

        $nomeCompleto = $arquivo['caminho'] .
                        $arquivo['nome'] .
                        $arquivo['extensao'];

        file_put_contents($nomeCompleto, $arquivo['conteudo'], FILE_TEXT);
    }

}