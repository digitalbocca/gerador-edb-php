<?php

/**
 * pagina.php
 * 
 * Modelo de página bootstrap4.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.4.0 Gerador EDB
 * @version v1.0
 */

$modelo = <<<MODELO
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>{$configuracao['title']}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    </head>
    <body>
        <h1>{$configuracao['text']}</h1>
    </body>
</html>

MODELO;

?>