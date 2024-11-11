# Desafio-TecnoTech
 
Projeto criado como desáfio técnico do processo seletivo da empresa TecnoTech, usando php e PostgreSQL

Para Rodar o projeto basta enviar o comando 'php -S localhost:8080' para rodar localmente

No projeto foi criada uma interface onde nela são exibidos todos os associados e anuidades cadastradas no banco de dados, através dos icones que abrem modais é possível:
- Cadastrar Associados
- Cadastrar Anuidades
- Editar Anuidades
- Editar Associados
- Excluir Anuidades
- Excluir Associados

É necessário garantir que o arquivo php.ini está com as extensões do PostrgreSQL habilitadas. Para isso é necessário descomentar (remover o ponto e virgula que antecede a linha) as seguintes linhas do arquivo php.ini:

  ;extension=pdo_pgsql
  
  ;extension=pgsql

  devem ficar:

  extension=pdo_pgsql
  
  extension=pgsql

 Além disso, é necessário ter o postgreSQL instalado para rodar o banco de dados.
