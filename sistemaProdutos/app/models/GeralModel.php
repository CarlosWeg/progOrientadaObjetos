<?php

namespace App\Models;
use App\Utils\dataBaseUtil;   

class GeralModel{

    function listarGeral($nomeTabela,$colunaOrder, $colunas = '*', $joins = ''){
        $conexao = dataBaseUtil::conectarBD();
        $query = "SELECT $colunas
                    FROM MERCADO.$nomeTabela
                  $joins
                   ORDER BY $colunaOrder ASC";
        $oResult  = pg_query($conexao,$query);
        $aData = [];

        while ($aResultado = pg_fetch_assoc($oResult)){
            $aData[]=$aResultado;
        }      

        return $aData;
    }

    function deletarGeral($pagina, $nomeTabela,$colunaWhere, $codigoWhere){
        $conexao = dataBaseUtil::conectarBD();
        $query = "DELETE
                    FROM MERCADO.$nomeTabela
                   WHERE $colunaWhere = $codigoWhere";
        pg_query($conexao,$query);
        $pagina = '/progOrientadaObjetos/sistemaProdutos/' . $pagina;
        header("Location: $pagina");
        exit();
    }

    function inserirGeral($pagina,$nomeTabela, $camposTabela, $valores){
        $conexao = dataBaseUtil::conectarBD();
        $query = "INSERT INTO MERCADO.$nomeTabela
                         ($camposTabela)
                  VALUES ($valores)";
                pg_query($conexao,$query);
        $pagina = '/progOrientadaObjetos/sistemaProdutos/' . $pagina;
        header("Location: $pagina");
        exit();
    }

}