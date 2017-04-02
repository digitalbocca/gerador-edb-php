<?php

/**
 * package.php
 * 
 * Modelo de package do npm.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.4.0 Gerador EDB
 * @version v1.0
 */

$modelo = <<<MODELO
{
  "name": "{$configuracao['Nome']}",
  "version": "0.4.0",
  "description": "{$configuracao['Descricao']}",
  "scripts": {
    "build": "gulp build"
  },
  "author": "{$configuracao['Autor']}",
  "devDependencies": {
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
}

MODELO;

?>