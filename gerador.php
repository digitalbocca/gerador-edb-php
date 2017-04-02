<?php

/**
 * Gerador de Páginas Estáticas EDB.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca 
 * @since v0.13.0 EDB Framework
 * @version v0.3.0
 */

require_once('vendor/autoload.php');

$pasta = new EstudioDigitalBocca\Gerador\CriadorDeDiretorio('gerados');
$paginas = new EstudioDigitalBocca\Gerador\EncontradorDeArquivos('paginas');

//ADAPTADOR PARA O CÓDIGO LEGADO
//PASSA A LISTA DE ARQUIVOS
$encontraArquivos = $paginas->retornaLista();

    function montaPagina($configuracao, $tipo){
        /**
         * @deprecated
         */
        
        /*
        $doctype = "<!DOCTYPE html>";
        $lang = "<html lang='pt-br'>";

        $abreHead = "<head>";
        $title = "<title>" . $configuracao["title"] . "</title>";
        $head = '<meta charset="utf-8">'
            . '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'
            . '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">';
        $fechaHead = "</head>";

        $abreBody = "<body>";
        $h1 = "<h1>" . $configuracao["text"] . "</h1>";
        $fechaBody = "</body>";

        $fechaHTML = "</html>";

        $dados = "";
        $dados .= $doctype 
                . $lang 
                . $abreHead 
                . $title
                . $head 
                . $fechaHead
                . $abreBody
                . $h1
                . $fechaBody
                . $fechaHTML;
        return $dados;
        */

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
    
    /**
     * @deprecated
     */
    
    /*
    $npm = '{'
         . '"name": "' . $configuracaoNPM['Nome'] . '",'
         . '"version": "1.24.0",'
         . '"description": "' . $configuracaoNPM['Descricao'] . '",'
         . '"scripts": {
                "build": "gulp build"
             },'
         . '"author": "' . $configuracaoNPM['Autor'] . '",'
         . '"devDependencies": {
                "@aquafadas/gulp-php-minify": "^0.3.1",
                "gulp": "^3.9.1",
                "gulp-clean-css": "^3.0.4",
                "gulp-concat": "^2.6.1",
                "gulp-html-minifier2": "^1.1.8",
                "gulp-jsonminify2": "^1.0.2",
                "gulp-rename": "^1.2.2",
                "gulp-tinify": "^1.0.2",
                "gulp-uglify": "^2.1.2",
                "gulp-util": "^3.0.8",
                "gulp-watch": "^4.3.11"
            }
        }';

    */

    //ADAPTADOR NA FUNCAO QUE GERA O ARQUIVO
    $gerarNPM = montaPagina($configuracaoNPM, 'package');
    file_put_contents("./gerados/package.json", $gerarNPM, FILE_TEXT);

    /**
     * @deprecated
     */
    //file_put_contents("./gerados/package.json", $npm, FILE_TEXT);

    /**
     * Criando Git Ignore
     */
    $gitIgnore = "/node_modules";
    file_put_contents("./gerados/.gitignore", $gitIgnore, FILE_TEXT);

    print("\n");
    print("SEU SITE FOI CRIADO NA PASTA gerados\n");
    print("\n");
    print("cd gerados\n");
    print("npm install\n");
    print("npm run build\n");