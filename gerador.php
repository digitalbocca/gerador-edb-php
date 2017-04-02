<?php

/**
 * Gerador de Páginas Estáticas EDB.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca 
 * @since v0.1.0 Gerador EDB
 * @version v0.5.0
 */

require_once('vendor/autoload.php');

$pasta = new EstudioDigitalBocca\Gerador\CriadorDeDiretorio('gerados');
$paginas = new EstudioDigitalBocca\Gerador\EncontradorDeArquivos('paginas');

//ADAPTADOR PARA O CÓDIGO LEGADO
//PASSA A LISTA DE ARQUIVOS
$encontraArquivos = $paginas->retornaLista();

function montaPagina($configuracao, $tipo){
    require "modelos/" . $tipo . ".php";
    return $modelo;
}

foreach ($encontraArquivos as $arquivo) {
    $arquivoAtual = "./paginas/" . $arquivo;
    $abrir = file_get_contents($arquivoAtual);
    $configuracao = json_decode($abrir, true);

    $montaPagina = montapagina($configuracao, 'pagina');

    $olhaAExplosao = explode('.',$arquivo);
    $nomeDoGerado = "./gerados/" . $olhaAExplosao[0] . ".html";

    //ADAPTADOR DE CODIGO LEGADO
    //NA NOVA CLASSE DEVE RECEBER UMA INSTANCIA DA CLASSE
    //DEVE IMPLEMENTAR UMA INTERFACE PARA MANIPULACAO DESSA CLASSE
    $entidadeArquivo = new EstudioDigitalBocca\Gerador\Arquivo();
    //var_dump($entidadeArquivo->retornaArquivo());
    $entidadeArquivo->setNome($olhaAExplosao[0]);
    $entidadeArquivo->setConteudo($montaPagina);
    
    new EstudioDigitalBocca\Gerador\CriadorDeArquivo($entidadeArquivo);
}

/**
 * Gerando o NPM
 * 
 */
$arquivoNPM = file_get_contents("./projeto.json");
$configuracaoNPM = json_decode($arquivoNPM, true);

$arquivoNPM = new EstudioDigitalBocca\Gerador\Arquivo(".json");
$arquivoNPM->setNome("package");

//ADAPTADOR NA FUNCAO QUE GERA O ARQUIVO
$gerarNPM = montaPagina($configuracaoNPM, 'package');

$arquivoNPM->setConteudo($gerarNPM);

new EstudioDigitalBocca\Gerador\CriadorDeArquivo($arquivoNPM);

/**
 * @deprecated
 */

//file_put_contents("./gerados/package.json", $gerarNPM, FILE_TEXT);

/**
 * Criando Git Ignore
 */
$gitIgnore = "/node_modules";
file_put_contents("./gerados/.gitignore", $gitIgnore, FILE_TEXT);

/**
 * Saída de Dados
 */

print("\n");
print("SEU SITE FOI CRIADO NA PASTA gerados\n");
print("\n");
print("cd gerados\n");
print("npm install\n");
print("npm run build\n");