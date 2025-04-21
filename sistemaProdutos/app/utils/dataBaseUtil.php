<?php

namespace App\Utils;

class DataBaseUtil{
    public static function conectarBD(){

        $sHost = '127.0.0.1';
        $sPort = '5432';
        $sDbName = 'mercado';
        $sUser = 'postgres';
        $sPassword = 'postgres';

        $sConexao = "host = $sHost
                    port = $sPort
                    dbname = $sDbName
                    user = $sUser
                    password = $sPassword";

        $conexao = pg_connect($sConexao);

        if (!$conexao) {
            die("Erro na conexão com o banco de dados.");
        }
        
        return $conexao;

    }
}
?>