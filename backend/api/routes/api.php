<?php

require_once __DIR__ . '/../controllers/TemplateController.php';

function handleApiRequest()
{
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $templateController = new TemplateController();

    // API /api/templates
    if ($uri === '/api/templates') {
        if ($method === 'GET') {
            $templateController->getTemplates();  // Retorna todos os templates
        } elseif ($method === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $templateController->saveTemplate($data);  // Salva um novo template
        }
    }

    // API /api/templates/{id} para edição
    if (preg_match('/\/api\/templates\/(\d+)/', $uri, $matches)) {
        $id = $matches[1];
        if ($method === 'PUT') {
            $data = json_decode(file_get_contents('php://input'), true);
            $templateController->editTemplate($id, $data);  // Edita o template
        }
    }
}
?>
