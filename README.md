# TESTE DE APTIDÃO 

Para instalar a aplicação, siga as instruções abaixo:

1. Instalar as dependências:
```bash
composer install
```

2. Criar banco de dados:</br>
Nome: loginfo </br>
Charset: UTF8 - utf8_unicode_ci</br>
Database: MySQL</br>

3. Configurações as informações do banco de dados em \config\app_local.php

4. Iniciar a migração utilizando Phinx
```bash
vendor/bin/phinx migrate
```

