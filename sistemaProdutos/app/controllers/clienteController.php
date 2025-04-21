<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class ClienteController{

    private GeralModel $oClienteModel;

    public function __construct() {
        $this->oClienteModel = new GeralModel();
    }

    public function index(){
        $cidades = $this->oClienteModel->listarGeral('TBCIDADE','CIDNOME');
        $clientes = $this->oClienteModel->listarGeral('TBCLIENTE','CLINOME', '*', 'JOIN MERCADO.TBCIDADE ON TBCLIENTE.CIDCODIGO = TBCIDADE.CIDCODIGO');
        require_once 'app/views/cliente.php';
    }

    public function cadastrar(){
        $nomeCliente = pg_escape_string($_POST['nome_cliente']);
        $cpf = pg_escape_string($_POST['cpf']);
        $cidadeCodigo = (int)$_POST['cid_codigo'];
        $value = "'$nomeCliente', '$cpf', $cidadeCodigo";
        $this->oClienteModel->inserirGeral('cliente', 'TBCLIENTE', 'CLINOME, CLICPF, CIDCODIGO', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oClienteModel->deletarGeral('cliente', 'TBCLIENTE', 'CLICODIGO', $codigo);
        }
    }
    

}

?>
