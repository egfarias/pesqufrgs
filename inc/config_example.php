<?php

/* Exibir erros - Use somente durante os testes */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// ============== CONFIGURAÇÕES ============== //

/* Endereço do server, sem http:// */
$hosts = ['localhost'];

/* Endereço base */
$url_base = "http://localhost:8080/prodmais";


/* Configurações do Elasticsearch */
$index = "prodmais";
$index_cv = "prodmaiscv";
$index_ppg = "prodmaisppg";

/* Load libraries for PHP composer */
require(__DIR__ . '/../vendor/autoload.php');

/* Load Elasticsearch Client */
$client = \Elasticsearch\ClientBuilder::create()->setHosts($hosts)->build();

/* Login */
$login_user = "admin";
$login_password = "admin";


// ============== CUSTOMIZAÇÃO ============== //

// Definir Instituição
$instituicao = "Universidade Federal do Rio Grande do Sul";
$branch = "PesqUFRGS";
$branch_description = "Descrição";
$facebook_image = "";
$slogan = '';

$mostrar_instituicao = true;
$mostrar_area_concentracao = true;
$mostrar_existe_doi = true;
$mostrar_openalex = true;
$mostrar_link_dashboard = true;

// Tema
// $theme = 'Prodmais';
// $theme = 'Waterbeach';
// $theme = 'Tomaton';
// $theme = 'Blueberry';
$theme = 'UFRGSPesq';
