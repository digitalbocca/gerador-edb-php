<?php

/**
 * package.php
 * 
 * Modelo de package do npm.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.4.0 Gerador EDB
 * @version v1.3.0
 */

$modelo = <<<MODELO
{
  "name": "{$configuracao['Nome']}",
  "version": "0.10.0",
  "description": "{$configuracao['Descricao']}",
  "author": "{$configuracao['Autor']}",
  "config": {
    "commitMessage": "Automatização do Controle de Versão"
  },
  "scripts": {
    "build": "gulp build",
    "dev": "http-server -o",
    "postinstall": "npm install -g http-server",
    "git": "npm run gitstatus && npm run gitadd && npm run gitcommit && npm run gittag && npm run gitpushorigin",
    "gitstatus": "git status",
    "gitadd": "git add .",
    "gitcommit": "git commit -m \"%npm_package_config_commitMessage%\"",
    "gittag": "git tag v%npm_package_version%",
    "gitpushorigin" : "git push origin master --tags"
  },
  "devDependencies": {
    "@cedx/gulp-php-minify": "^7.1.1",
    "gulp": "^3.9.1",
    "gulp-clean-css": "^3.7.0",
    "gulp-concat": "^2.6.1",
    "gulp-html-minifier2": "^1.1.8",
    "gulp-jsonminify2": "^1.0.2",
    "gulp-rename": "^1.2.2",
    "gulp-tinify": "^1.0.2",
    "gulp-uglify": "^3.0.0",
    "gulp-util": "^3.0.8",
    "gulp-watch": "^4.3.11"
  }
}

MODELO;

?>