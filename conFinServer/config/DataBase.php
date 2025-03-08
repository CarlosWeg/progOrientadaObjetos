<?php

namespace Config;

class DataBase{
    private static $oConexao;
    const HOST = 'localhost';
    const USER = 'postgres';
    const PASS = 'postgres';
    const DATA_BASE_NAME = 'confin';

    public static function conectar() {
        $sConexao = 'host=' . self::HOST .
                    ' dbname=' . self::DATA_BASE_NAME .
                    ' user=' . self::USER .
                    ' password=' . self::PASS;

        return pg_connect($sConexao);
    }

    public static function obterConexao() {
        if (is_null(self::$oConexao)) {
            self::$oConexao = self::conectar();
        }

        return self::$oConexao;
    }

    public static function fecharConexao() {
        if (!is_null(self::$oConexao)) {
            pg_close(self::$oConexao);
        }
    }
}