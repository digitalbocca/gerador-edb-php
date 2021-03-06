<?php

/**
 * Gerador de Páginas Estáticas EDB.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca 
 * @since v0.1.0 Gerador EDB
 * @version v0.8.0
 */

require_once('vendor/autoload.php');

/**
 * @todo Renomear projeto.json para config.json e trazer dele as configs de diretórios.
 */

$pasta = new EstudioDigitalBocca\Gerador\CriadorDeDiretorio('gerados');
$paginas = new EstudioDigitalBocca\Gerador\EncontradorDeArquivos('paginas');

//ADAPTADOR PARA O CÓDIGO LEGADO
//PASSA A LISTA DE ARQUIVOS
$encontraArquivos = $paginas->retornaLista();

//TESTE DO LEITOR DE ARQUIVOS MULTIPLOS (FORA DO FOREACH)
$leitor = new EstudioDigitalBocca\Gerador\AbridorDeArquivo();

// CRIAÇÃO DO MENU
foreach ($encontraArquivos as $arquivo) {
    $arquivoAtual = "./paginas/" . $arquivo;
    $olhaAExplosao = explode('.',$arquivo);
    $link = "<a href='" . $olhaAExplosao[0] . ".html'>" . $olhaAExplosao[0] . "</a>";
    file_put_contents("./gerados/menu.php", $link, FILE_APPEND);
}



foreach ($encontraArquivos as $arquivo) {
    $arquivoAtual = "./paginas/" . $arquivo;

    $leitor->trocaArquivo($arquivoAtual);
    
    $conf = file_get_contents('./gerados/menu.php');
    
    //Futuramente pegar o type diretamente na configuração do arquivo.json
    $lerModelo = new EstudioDigitalBocca\Gerador\LeitorDeModelo($leitor, 'pagina', $conf);

    $olhaAExplosao = explode('.',$arquivo);
    $nomeDoGerado = "./gerados/" . $olhaAExplosao[0] . ".html";

    $entidadeArquivo = new EstudioDigitalBocca\Gerador\Arquivo();
    $entidadeArquivo->setNome($olhaAExplosao[0]);
    $entidadeArquivo->setConteudo($lerModelo->retornaModelo());
    
    new EstudioDigitalBocca\Gerador\CriadorDeArquivo($entidadeArquivo);
}

/**
 * Gerando o NPM
 */

$leitorNPM = new EstudioDigitalBocca\Gerador\AbridorDeArquivo("./projeto.json");

$arquivoNPM = new EstudioDigitalBocca\Gerador\Arquivo(".json");
$arquivoNPM->setNome("package");

$lerModeloNPM = new EstudioDigitalBocca\Gerador\LeitorDeModelo($leitorNPM, 'package', 'vazio');

$arquivoNPM->setConteudo($lerModeloNPM->retornaModelo());

new EstudioDigitalBocca\Gerador\CriadorDeArquivo($arquivoNPM);

/**
 * Gerando o README
 */

// $leitorREADME = new EstudioDigitalBocca\Gerador\AbridorDeArquivo("");
$arquivoREADME = new EstudioDigitalBocca\Gerador\Arquivo(".md");
$arquivoREADME-> setNome("README");
$lerModeloREADME = new EstudioDigitalBocca\Gerador\LeitorDeModelo($leitorNPM, 'README', 'vazio');
$arquivoREADME->setConteudo($lerModeloREADME->retornaModelo());

new EstudioDigitalBocca\Gerador\CriadorDeArquivo($arquivoREADME);

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