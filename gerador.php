<?php
    //$diretorio = opendir("./paginas");

    mkdir('./gerados');

    $encontraArquivos = scandir("./paginas");
    //var_dump($encontraArquivos);

    array_shift($encontraArquivos);
    //var_dump($encontraArquivos);
    
    array_shift($encontraArquivos);
    //var_dump($encontraArquivos);


    //$arquivo = file_get_contents("./paginas/index.json");
    //$configuracao = json_decode($arquivo, true);
    
    //var_dump($configuracao);
    //var_dump(scandir("./"));
    //closedir($diretorio);

    function montaPagina($configuracao){
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
    }

    //file_put_contents("index.html", $dados, FILE_TEXT);

    foreach ($encontraArquivos as $arquivo) {
        $arquivoAtual = "./paginas/" . $arquivo;
        $abrir = file_get_contents($arquivoAtual);
        $configuracao = json_decode($abrir, true);

        $montaPagina = montapagina($configuracao);

        $olhaAExplosao = explode('.',$arquivo);
        $nomeDoGerado = "./gerados/" . $olhaAExplosao[0] . ".html";

        file_put_contents($nomeDoGerado, $montaPagina, FILE_TEXT);

    }


    /**
     * Gerando o NPM
     * 
     */
    $arquivoNPM = file_get_contents("./projeto.json");
    $configuracaoNPM = json_decode($arquivoNPM, true);
    
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

    file_put_contents("./gerados/package.json", $npm, FILE_TEXT);

    /**
     * Criando Git Ignore
     */
    $gitIgnore = "/node_modules";
    file_put_contents("./gerados/.gitignore", $gitIgnore, FILE_TEXT);