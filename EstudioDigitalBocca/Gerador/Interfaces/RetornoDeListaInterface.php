<?php

/**
 * RetornoDeListaInterface.php
 * 
 * Interface para retorno de uma lista.
 * 
 * @author Gabriel Bertola Bocca <gabriel at estudiodigitalbocca.com.br>
 * @copyright (c) 2017, Estúdio Digital Bocca
 * @since v0.13.0 EDB Framework
 * @version v1.1
 */

namespace EstudioDigitalBocca\Gerador\Interfaces;

interface RetornoDeListaInterface {

    /**
     * Retorna uma lista de valores.
     *
     * @return array Uma lista de valores.
     */
    public function retornaLista();

}