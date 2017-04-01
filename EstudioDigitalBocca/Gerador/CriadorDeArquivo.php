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

    public function __construct(ArquivoInterface $arquivo){
        //isto tem que ser passado para outra classe
     
        $arquivo = $arquivo->retornaArquivo();
        
        //var_dump($arquivo);

        $nomeCompleto = $arquivo['caminho'] .
                        $arquivo['nome'] .
                        $arquivo['extensao'];
        /*
        $caminho = $arquivo['caminho'];
        $nome = $arquivo['nome'];
        $extensao = $arquivo['extensao'];
        
        //var_dump($caminho);
        $nomeCompleto  = $caminho . $nome . $extensao;
        //var_dump($nomeCompleto);
        */

        file_put_contents($nomeCompleto, $arquivo['conteudo'], FILE_TEXT);
    }

}