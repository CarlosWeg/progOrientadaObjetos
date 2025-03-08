<?php

namespace App\Models;
use Config\DataBase;

class CidadeModel{


    public function obterCidadesBD(){
        $sSql = 'SELECT * FROM confin.tbcidade';

        $oResultado = pg_query(DataBase::obterConexao(), $sSql);
        $aData = [];

        while ($aLinha = pg_fetch_assoc($oResultado)){
            $aData[] = $aLinha;
        }

        return $aData;
    }

    public function cadastrarCidadeBD($sCidNome,$sEstSigla){
    
        $sSql = "INSERT INTO confin.tbcidade (cidnome, estsigla) VALUES ('$sCidNome','$sEstSigla')";

        return pg_query(DataBase::obterConexao(), $sSql);

    }

    public function excluirCidadeBD($iCidCodigo){
        $sSql = "DELETE FROM confin.tbcidade WHERE cidcodigo = $iCidCodigo";

        return pg_query(DataBase::obterConexao(), $sSql);
    }

}