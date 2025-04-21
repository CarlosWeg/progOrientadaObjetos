<?php

require_once 'db.php';

    function listarGeral($nomeTabela,$colunaOrder, $colunas = '*', $joins = ''){
        $conexao = conectarBD();
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
        $conexao = conectarBD();
        $query = "DELETE
                    FROM MERCADO.$nomeTabela
                   WHERE $colunaWhere = $codigoWhere";
        pg_query($conexao,$query);
        header("Location: $pagina");
        exit();
    }

    function inserirGeral($pagina,$nomeTabela, $camposTabela, $valores){
        $conexao = conectarBD();
        $query = "INSERT INTO MERCADO.$nomeTabela
                         ($camposTabela)
                  VALUES ($valores)";
                pg_query($conexao,$query);
        header("Location: $pagina");
        exit();
    }