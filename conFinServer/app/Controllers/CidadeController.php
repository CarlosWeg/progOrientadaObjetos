<?php

namespace App\Controllers;

use App\Models\CidadeModel;

class CidadeController {
    public function listarCidade() {
        $oCidadeModel = new CidadeModel();
        $aCidades = $oCidadeModel->obterCidadesBD();

        include_once 'app/Views/cidade.php';
    }

    public function cadastrarCidade() {
        $sCidNome = trim($_POST['nome_cidade']);
        $sEstSigla = trim($_POST['sigla_estado']);

        $oCidadeModel = new CidadeModel();
        $oCidadeModel->cadastrarCidadeBD($sCidNome, $sEstSigla);
        header('Location: /progOrientadaObjetos/conFinServer/cidade');
    }

    public function excluirCidade(){
        $iCidCodigo = $_GET['cidcodigo'];

        $oCidadeModel = new CidadeModel();
        $oCidadeModel->excluirCidadeBD($iCidCodigo);
        header('Location: /progOrientadaObjetos/conFinServer/cidade');
    }

}