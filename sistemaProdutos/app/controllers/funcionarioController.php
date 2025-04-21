<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class FuncionarioController{

    private GeralModel $oFuncionarioModel;

    public function __construct() {
        $this->oFuncionarioModel = new GeralModel();
    }

    public function index(){
        $departamentos = $this->oFuncionarioModel->listarGeral('TBDEPARTAMENTO','DPTDESCRICAO');
        $funcionarios = $this->oFuncionarioModel->listarGeral('TBFUNCIONARIO','FCNNOME', '*', 'JOIN MERCADO.TBDEPARTAMENTO ON TBFUNCIONARIO.DPTCODIGO = TBDEPARTAMENTO.DPTCODIGO');
        require_once 'app/views/funcionario.php';
    }

    public function cadastrar(){
        $nomeFuncionario = pg_escape_string($_POST['nome_funcionario']);
        $dptCodigo = (int)$_POST['dpt_codigo'];

        $value = "'$nomeFuncionario', $dptCodigo";
        $this->oFuncionarioModel->inserirGeral('funcionario', 'TBFUNCIONARIO', 'FCNNOME, DPTCODIGO', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oFuncionarioModel->deletarGeral('funcionario', 'TBFUNCIONARIO', 'FCNCODIGO', $codigo);
        }
    }
    

}

?>