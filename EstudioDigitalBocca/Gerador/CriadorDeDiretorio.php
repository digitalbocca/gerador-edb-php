<?php

/**
 * CriadorDeDiretorio.php
 * 
 * Recebe um nome e cria um diretório.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.0
 */

namespace EstudioDigitalBocca\Gerador;

class CriadorDeDiretorio {

    /**
     * Recebe um nome e um caminho (opcional) para a criação de um diretório.
     * Caso não receba um caminho o valor padrão é o diretório atual.
     *
     * @param string $nome O nome do diretório que será criado.
     * @param string $caminho O caminho do diretório (PADRÃO: "./").
     * 
     * @return void
     */
    public function __construct($nome, $caminho = "./"){
        $diretorio = $caminho . $nome;

        if(file_exists($diretorio)){
            /**
             * CUIDADO !!!
             * Implementação GoHorse.
             * 
             * @todo Receber um Objeto Encontrador de Arquivos
             */
            
            $listaDeArquivos = new EncontradorDeArquivos($nome);

            foreach ($listaDeArquivos->retornaLista() as $arquivo){
                $arquivoAtual = $diretorio . "/" . $arquivo;
                print("APAGANDO ARQUIVO: " . $arquivoAtual . "\n");
                unlink($arquivoAtual);
            }

            /**
             * Final da Implementação GoHorse.
             */

            rmdir($diretorio);
            print("Apagando Pasta Antiga\n");
        }

        mkdir($diretorio);
    }
}