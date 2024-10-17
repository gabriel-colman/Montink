<?php

require_once __DIR__ . '/../../database/redis.php';  // Inclui a conexão com o Redis

class TemplateController
{
    private $redis;

    public function __construct()
    {
        // Inicializa a conexão com o Redis
        $this->redis = new RedisConnection();
    }

    // Retorna todos os templates
    public function getTemplates()
    {
        $templates = $this->redis->get('templates');  // Busca os templates do Redis
        if (!$templates) {
            $templates = [];  // Se não houver templates salvos, inicializa como array vazio
        }
        echo json_encode($templates);
    }

    // Salva um novo template no Redis
    public function saveTemplate($templateData)
    {
        // Busca os templates existentes no Redis
        $templates = $this->redis->get('templates');
        if (!$templates) {
            $templates = [];
        }

        // Adiciona o novo template ao array existente
        array_push($templates, $templateData);

        // Salva o array atualizado no Redis
        $this->redis->save('templates', $templates);

        // Retorna o novo estado dos templates
        echo json_encode([
            'message' => 'Template salvo com sucesso!',
            'data' => $templates
        ]);
    }

    // Edita um template (exemplo de função que poderia ser implementada com Redis)
    public function editTemplate($id, $templateData)
    {
        $templates = $this->redis->get('templates');
        if (isset($templates[$id])) {
            $templates[$id] = $templateData;

            // Atualiza no Redis
            $this->redis->save('templates', $templates);

            echo json_encode([
                'message' => 'Template atualizado com sucesso!',
                'data' => $templates
            ]);
        } else {
            echo json_encode([
                'message' => 'Template não encontrado.'
            ]);
        }
    }
}
?>
