<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class FornecedorController{

    private GeralModel $oFornecedorModel;

    public function __construct() {
        $this->oFornecedorModel = new GeralModel();
    }

    public function index(){
        $cidades = $this->oFornecedorModel->listarGeral('TBCIDADE','CIDNOME');
        $fornecedores = $this->oFornecedorModel->listarGeral('TBFORNECEDOR','FORNOME', '*', 'JOIN MERCADO.TBCIDADE ON TBFORNECEDOR.CIDCODIGO = TBCIDADE.CIDCODIGO');
        require_once 'app/views/fornecedor.php';
    }

    public function cadastrar(){
        $nomeFornecedor = pg_escape_string($_POST['nome_fornecedor']);
        $cnpj = pg_escape_string($_POST['cnpj']);
        $cidadeCodigo = (int)$_POST['cid_codigo'];

        $value = "'$nomeFornecedor', '$cnpj', $cidadeCodigo";
        $this->oFornecedorModel->inserirGeral('fornecedor', 'TBFORNECEDOR', 'FORNOME, FORCNPJ, CIDCODIGO', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oFornecedorModel->deletarGeral('fornecedor', 'TBFORNECEDOR', 'FORCODIGO', $codigo);
        }
    }
    

}

?>