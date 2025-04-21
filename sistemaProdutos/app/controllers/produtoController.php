<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class ProdutoController{

    private GeralModel $oProdutoModel;

    public function __construct() {
        $this->oProdutoModel = new GeralModel();
    }

    public function index(){
        $produtos = $this->oProdutoModel->listarGeral('TBPRODUTO','PRONOME', '*', 'JOIN MERCADO.TBCATEGORIA ON MERCADO.TBPRODUTO.CATCODIGO = TBCATEGORIA.CATCODIGO JOIN MERCADO.TBFORNECEDOR ON MERCADO.TBFORNECEDOR.FORCODIGO = TBFORNECEDOR.FORCODIGO');
        $categorias = $this->oProdutoModel->listarGeral('TBCATEGORIA','CATDESCRICAO');
        $fornecedores = $this->oProdutoModel->listarGeral('TBFORNECEDOR','FORNOME');
        require_once 'app/views/produto.php';
    }

    public function cadastrar(){
        $nomeProduto = pg_escape_string($_POST['nome_produto']);
        $descricaoProduto = pg_escape_string($_POST['descricao_produto']);
        $valorProduto = $_POST['valor_produto'];
        $estoqueProduto = (int)$_POST['valor_produto'];
        $fornecedorCodigo = (int)$_POST['fornecedor_codigo'];
        $categoriaCodigo = (int)$_POST['categoria_codigo'];
    
        $value = "'$nomeProduto', '$descricaoProduto', $valorProduto, $estoqueProduto, $categoriaCodigo, $fornecedorCodigo";
        $this->oProdutoModel->inserirGeral('','TBPRODUTO', 'pronome,prodescricao,provalor,proestoque,catcodigo,forcodigo', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oProdutoModel->deletarGeral('', 'TBPRODUTO', 'PROCODIGO', $codigo);
        }
    }
    

}

?>