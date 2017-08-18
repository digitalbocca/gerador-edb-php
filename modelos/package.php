<?php

/**
 * package.php
 * 
 * Modelo de package do npm.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.4.0 Gerador EDB
 * @version v1.1.0
 */

$modelo = <<<MODELO
{
  "name": "{$configuracao['Nome']}",
  "version": "0.8.0",
  "description": "{$configuracao['Descricao']}",
  "scripts": {
    "build": "gulp build",
    "dev": "http-server -o",
    "pos": "npm install -g http-server"
  },
  "author": "{$configuracao['Autor']}",
  "devDependencies": {
    "@cedx/gulp-php-minify": "^5.0.0",
    "gulp": "^3.9.1",
    "gulp-clean-css": "^3.7.0",
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