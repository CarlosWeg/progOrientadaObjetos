<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class DepartamentoController{

    private GeralModel $oDepartamentoModel;

    public function __construct() {
        $this->oDepartamentoModel = new GeralModel();
    }

    public function index(){
        $departamentos = $this->oDepartamentoModel->listarGeral('TBDEPARTAMENTO','DPTDESCRICAO');
        require_once 'app/views/departamento.php';
    }

    public function cadastrar(){
        $nomeDepartamento = pg_escape_string($_POST['nome_departamento']);

        $value = "'$nomeDepartamento'";
        $this->oDepartamentoModel->inserirGeral('departamento','TBDEPARTAMENTO', 'DPTDESCRICAO', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oDepartamentoModel->deletarGeral('departamento', 'TBDEPARTAMENTO', 'DPTCODIGO', $codigo);
        }
    }
    

}

?>