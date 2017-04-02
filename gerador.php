<?php

/**
 * Gerador de Páginas Estáticas EDB.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca 
 * @since v0.1.0 Gerador EDB
 * @version v0.6.0
 */

require_once('vendor/autoload.php');

$pasta = new EstudioDigitalBocca\Gerador\CriadorDeDiretorio('gerados');
$paginas = new EstudioDigitalBocca\Gerador\EncontradorDeArquivos('paginas');

//ADAPTADOR PARA O CÓDIGO LEGADO
//PASSA A LISTA DE ARQUIVOS
$encontraArquivos = $paginas->retornaLista();


/**
 * @deprecated
 */

/*
function montaPagina($configuracao, $tipo){
    require "modelos/" . $tipo . ".php";
    return $modelo;
}
*/

//TESTE DO LEITOR DE ARQUIVOS MULTIPLOS (FORA DO FOREACH)
$leitor = new EstudioDigitalBocca\Gerador\AbridorDeArquivo();

foreach ($encontraArquivos as $arquivo) {
    $arquivoAtual = "./paginas/" . $arquivo;

    $leitor->trocaArquivo($arquivoAtual);


    //$configuracao = $leitor->retornaConfiguracao();
    /**
     * @deprecated
     */
    //$abrir = file_get_contents($arquivoAtual);
    //$configuracao = json_decode($abrir, true);

    //Futuramente pegar o type diretamente na configuração do arquivo.json
    $lerModelo = new EstudioDigitalBocca\Gerador\LeitorDeModelo($leitor, 'pagina');
    /**
     * @deprecated
     */
    //$montaPagina = montapagina($configuracao, 'pagina');

    $olhaAExplosao = explode('.',$arquivo);
    $nomeDoGerado = "./gerados/" . $olhaAExplosao[0] . ".html";

    $entidadeArquivo = new EstudioDigitalBocca\Gerador\Arquivo();
    $entidadeArquivo->setNome($olhaAExplosao[0]);
    $entidadeArquivo->setConteudo($lerModelo->retornaModelo());
    
    new EstudioDigitalBocca\Gerador\CriadorDeArquivo($entidadeArquivo);
}

/**
 * Gerando o NPM
 * 
 */

$leitorNPM = new EstudioDigitalBocca\Gerador\AbridorDeArquivo("./projeto.json");

/**
 * @deprecated
 */
//$configuracaoNPM = $leitorNPM->retornaConfiguracao();

/**
 * @deprecated
 */
//$arquivoNPM = file_get_contents("./projeto.json");
//$configuracaoNPM = json_decode($arquivoNPM, true);

$arquivoNPM = new EstudioDigitalBocca\Gerador\Arquivo(".json");
$arquivoNPM->setNome("package");

$lerModeloNPM = new EstudioDigitalBocca\Gerador\LeitorDeModelo($leitorNPM, 'package');

/**
 * @deprecated
 */

//ADAPTADOR NA FUNCAO QUE GERA O ARQUIVO
//$gerarNPM = montaPagina($configuracaoNPM, 'package');

$arquivoNPM->setConteudo($lerModeloNPM->retornaModelo());

new EstudioDigitalBocca\Gerador\CriadorDeArquivo($arquivoNPM);

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