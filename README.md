# DevOps Laravel - Task API

API REST simples para gerenciamento de tarefas, criada para a disciplina de DevOps.

## Stack

- Laravel 11
- PHP 8.x
- SQLite (testes)

## Endpoints

- `GET /api/tasks` - Listar tarefas
- `POST /api/tasks` - Criar tarefa
- `GET /api/tasks/{id}` - Exibir tarefa
- `PUT /api/tasks/{id}` - Atualizar tarefa
- `DELETE /api/tasks/{id}` - Deletar tarefa

## Rodando os testes
```bash
php artisan test
```