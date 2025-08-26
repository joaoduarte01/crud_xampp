# Biblioteca CRUD em PHP + MySQL

## Como rodar
1. Instale e inicie o XAMPP.
2. No phpMyAdmin, crie o banco importando `db/db.sql`.
3. Configure a conexão no arquivo `includes/conexao.php`.
4. Coloque a pasta `biblioteca-crud` dentro de `htdocs/`.
5. Acesse no navegador: `http://localhost/crud_xampp.

## Funcionalidades
- CRUD de Autores, Livros, Leitores e Empréstimos.
- Filtros: buscar livros por gênero, autor ou ano.
- Listar empréstimos ativos e concluídos.
- Listar livros emprestados a um leitor específico.
- Regras de negócio implementadas:
  - Ano de publicação > 1500 e <= ano atual.
  - Livro só pode ser emprestado se não estiver ativo.
  - Leitor pode ter até 3 empréstimos ativos.
  - Data de devolução >= data de empréstimo.

## Testes
- Crie autores e livros.
- Adicione leitores.
- Realize empréstimos válidos.
- Tente ultrapassar as regras (ano inválido, livro já emprestado, mais de 3 empréstimos por leitor) para validar restrições.