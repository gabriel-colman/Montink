<?php

// Inclui as configurações e rotas da API
require_once 'config/constantes.php';
require_once 'api/routes/api.php';

// Configura os headers para CORS
header("Access-Control-Allow-Origin: http://localhost:3000");  // Permitindo o React acessar o backend
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Roteia as requisições para a API
handleApiRequest();
?>
