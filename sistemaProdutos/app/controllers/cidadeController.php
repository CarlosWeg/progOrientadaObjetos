<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class CidadeController{

    private GeralModel $oCidadeModel;

    public function __construct() {
        $this->oCidadeModel = new GeralModel();
    }

    public function index(){
        $cidades = $this->oCidadeModel->listarGeral('TBCIDADE','CIDNOME');
        require_once 'app/views/cidade.php';
    }

    public function cadastrar(){
        $nomeCidade = pg_escape_string($_POST['nome_cidade']);
        $value = "'$nomeCidade'";
        $this->oCidadeModel->inserirGeral('cidade','TBCIDADE', 'CIDNOME', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oCidadeModel->deletarGeral('cidade','TBCIDADE', 'CIDCODIGO', $codigo);
        }
    }
    

}

?>
