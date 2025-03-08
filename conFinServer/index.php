<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\CidadeController;

function limpaUrl($sBaseDir) {
    // Pega a URL completa
    $sUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Verifica se $sBaseDir é o início de $sUrl
    if (strpos($sUrl, $sBaseDir) === 0) {
        // Remove o diretório de base
        $sUrl = substr($sUrl, strlen($sBaseDir));
    }

    if (empty($sUrl)) {
        return '/';
    }

    return $sUrl;
}

function renderizar($view) {
    include_once "app/views/{$view}.php";
}

$sUrl = limpaUrl('/progOrientadaObjetos/conFinServer');

switch($sUrl) {
    case '/':
        renderizar('home');
        break;

    case '/cidade':
        $oCidadeController = new CidadeController();
        $oCidadeController->listarCidade();
        break;

    case '/cidade-cadastrar':
        $oCidadeController = new CidadeController();
        $oCidadeController->cadastrarCidade();
        break;
    case '/cidade-excluir':
        $oCidadeController = new CidadeController();
        $oCidadeController->excluirCidade();
    break;

    case '/estado':
        renderizar('estado');
        break;

    default:
        http_response_code(404);
        renderizar('pagina_nao_encontrada');
        break;
}