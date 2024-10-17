Teste Montink - Projeto Fullstack
# Projeto Fullstack

Este é um projeto Fullstack que utiliza um backend em PHP (com suporte para Redis) e um frontend baseado em React com TypeScript. O frontend permite a manipulação de templates dinâmicos, onde os usuários podem adicionar, listar e salvar templates. O backend fornece uma API para servir os dados e manipulá-los. Além disso, o backend pode usar Redis para persistência temporária de dados.

## Estrutura do Projeto

A estrutura do projeto está organizada da seguinte forma:

```bash
.
├── backend/                     # Backend do projeto (API em PHP)
│   ├── api/                     # Lida com rotas e controladores da API
│   │   ├── controllers/
│   │   │   └── TemplateController.php   # Controlador que manipula os templates
│   │   ├── routes/
│   │   │   └── api.php                  # Rotas da API
│   ├── config/
│   │   └── constantes.php               # Blocos de templates base
│   ├── database/
│   │   └── redis.php                    # Conexão com Redis para persistência temporária
│   └── index.php                        # Arquivo principal que inicializa a API e roteia as requisições
├── react-app/                  # Frontend da aplicação (React com TypeScript)
│   ├── public/                 # Arquivos públicos (assets, fontes, etc.)
│   │   ├── assets/             # Arquivos CSS, JS, etc.
│   │   └── fonts/              # Fontes usadas na interface
│   ├── src/                    # Código-fonte principal da aplicação React
│   │   ├── App.tsx             # Componente principal da aplicação
│   │   ├── index.tsx           # Ponto de entrada do React
│   │   └── assets/             # Estilos importados no React
├── README.md                   # Instruções do projeto
└── .gitignore                  # Arquivos a serem ignorados pelo Git
```

## Requisitos

Antes de começar, certifique-se de que você tem os seguintes itens instalados:

- Node.js (recomendado: v14 ou superior) e npm
- PHP (recomendado: v7 ou superior)
- Redis (opcional, para persistência temporária)
- Composer (para gerenciar dependências PHP, se necessário)

## Instalação e Configuração

### 1. Configurando o Backend (API em PHP)

O backend é responsável por gerenciar as requisições API para manipular os templates. O Redis é utilizado para persistência temporária.

**Passos:**

1. Navegue até o diretório do backend:

    ```bash
    cd backend
    ```

2. Iniciar o servidor PHP:

    ```bash
    php -S localhost:8000 -t backend/
    ```

3. (Opcional) Iniciar o Redis: Se o Redis não estiver rodando, inicie o servidor Redis:

    ```bash
    sudo systemctl start redis-server
    ```

4. Testar o Backend: Você pode testar o backend acessando as seguintes rotas no seu navegador ou via ferramentas como Postman:

    - `GET http://localhost:8000/api/templates` – Lista os templates.
    - `POST http://localhost:8000/api/templates` – Cria um novo template (necessário passar dados via JSON).

### 2. Configurando o Frontend (React com TypeScript)

O frontend utiliza React com TypeScript e permite ao usuário interagir com os templates via interface gráfica.

**Passos:**

1. Navegue até o diretório do React:

    ```bash
    cd react-app
    ```

2. Instalar as dependências do React:

    ```bash
    npm install
    ```

3. Iniciar o servidor de desenvolvimento:

    ```bash
    npm start
    ```

Isso irá iniciar o frontend no endereço `http://localhost:3000`. O React irá se comunicar com o backend (`localhost:8000`) para buscar e manipular os templates.

## Funcionalidades

### Adicionar Novo Template

No frontend, você pode inserir o título e o valor de um novo template. Ao clicar em "Salvar Template", o template será salvo via API no backend.

### Listar Templates

A lista de templates será carregada ao acessar a interface e pode ser atualizada após a inserção de novos templates.

### Persistência Temporária (Redis)

Os templates são salvos temporariamente no Redis. Quando o backend estiver configurado com Redis, os dados serão mantidos na memória, mesmo se o servidor PHP for reiniciado.

## Dependências

### Backend:

- PHP: Para rodar a API.
- Redis: Para persistência temporária de dados (opcional).
- Composer: Para instalar dependências, caso haja alguma necessidade futura.

### Frontend:

- React: Para gerenciar a interface do usuário.
- TypeScript: Para tipagem estática e melhor organização do código.
- Bootstrap e Font Awesome: Para estilos e ícones no frontend.

## API Endpoints

### 1. GET /api/templates

Retorna todos os templates.

**Exemplo de resposta:**

```json
[
  {
    "title": "Template 1",
    "value": 10000
  },
  {
    "title": "Template 2",
    "value": 23090
  }
]
```

### 2. POST /api/templates

Cria um novo template. O corpo da requisição deve ser um JSON como o exemplo abaixo:

**Exemplo de corpo da requisição:**

```json
{
  "title": "Novo Template",
  "value": 12345
}
```

**Exemplo de resposta:**

```json
{
  "message": "Template salvo com sucesso!",
  "data": [
    {
      "title": "Novo Template",
      "value": 12345
    },
    {
      "title": "Template 1",
      "value": 10000
    }
  ]
}
```

## Como Contribuir

1. Faça um fork do repositório.
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`).
3. Faça commit das suas alterações (`git commit -m 'Adicionando nova feature'`).
4. Faça push para a branch (`git push origin feature/nova-feature`).
5. Abra um Pull Request.

## Considerações Finais

Este projeto é uma implementação de teste fullstack com um frontend dinâmico baseado em React e um backend em PHP, utilizando Redis para persistência temporária. O sistema foi desenvolvido para ser modular, facilitando a adição de novas funcionalidades tanto no frontend quanto no backend.

Se tiver alguma dúvida ou sugestão, sinta-se à vontade para abrir uma issue ou entrar em contato.
