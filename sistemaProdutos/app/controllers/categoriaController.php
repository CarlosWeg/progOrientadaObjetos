<?php

namespace App\Controllers;

use App\Models\GeralModel;
use App\Models\ModelGeral;

class CategoriaController{

    private GeralModel $oCategoriaModel;

    public function __construct() {
        $this->oCategoriaModel = new GeralModel();
    }

    public function index(){
        $categorias = $this->oCategoriaModel->listarGeral('TBCATEGORIA','CATDESCRICAO');
        require_once 'app/views/categoria.php';
    }

    public function cadastrar(){
        $nomeCategoria = pg_escape_string($_POST['nome_categoria']);
        $value = "'$nomeCategoria'";
        $this->oCategoriaModel->inserirGeral('categoria','TBCATEGORIA', 'CATDESCRICAO', $value);
    }

    public function deletar() {
        $codigo = $_GET['id'] ?? null;
    
        if ($codigo) {
            $this->oCategoriaModel->deletarGeral('categoria', 'TBCATEGORIA', 'CATCODIGO', $codigo);
        }
    }
    

}

?>