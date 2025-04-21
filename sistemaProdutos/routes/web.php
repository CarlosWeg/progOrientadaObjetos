<?php

$oRouter->addRota('GET', '/', [\App\Controllers\ProdutoController::class,'index']);
$oRouter->addRota('POST', '/produto/cadastrar', [\App\Controllers\ProdutoController::class, 'cadastrar']);
$oRouter->addRota('GET', '/produto/deletar', [\App\Controllers\ProdutoController::class,'deletar']);

$oRouter->addRota('GET', '/cidade', [\App\Controllers\CidadeController::class,'index']);
$oRouter->addRota('POST', '/cidade/cadastrar', [\App\Controllers\CidadeController::class, 'cadastrar']);
$oRouter->addRota('GET', '/cidade/deletar', [\App\Controllers\CidadeController::class,'deletar']);

$oRouter->addRota('GET', '/cliente', [\App\Controllers\ClienteController::class,'index']);
$oRouter->addRota('POST', '/cliente/cadastrar', [\App\Controllers\ClienteController::class, 'cadastrar']);
$oRouter->addRota('GET', '/cliente/deletar', [\App\Controllers\ClienteController::class,'deletar']);

$oRouter->addRota('GET', '/fornecedor', [\App\Controllers\FornecedorController::class,'index']);
$oRouter->addRota('POST', '/fornecedor/cadastrar', [\App\Controllers\FornecedorController::class, 'cadastrar']);
$oRouter->addRota('GET', '/fornecedor/deletar', [\App\Controllers\FornecedorController::class,'deletar']);

$oRouter->addRota('GET', '/funcionario', [\App\Controllers\FuncionarioController::class,'index']);
$oRouter->addRota('POST', '/funcionario/cadastrar', [\App\Controllers\FuncionarioController::class, 'cadastrar']);
$oRouter->addRota('GET', '/funcionario/deletar', [\App\Controllers\FuncionarioController::class,'deletar']);

$oRouter->addRota('GET', '/departamento', [\App\Controllers\DepartamentoController::class,'index']);
$oRouter->addRota('POST', '/departamento/cadastrar', [\App\Controllers\DepartamentoController::class, 'cadastrar']);
$oRouter->addRota('GET', '/departamento/deletar', [\App\Controllers\DepartamentoController::class,'deletar']);


$oRouter->addRota('GET', '/categoria', [\App\Controllers\CategoriaController::class,'index']);
$oRouter->addRota('POST', '/categoria/cadastrar', [\App\Controllers\CategoriaController::class, 'cadastrar']);
$oRouter->addRota('GET', '/categoria/deletar', [\App\Controllers\CategoriaController::class,'deletar']);