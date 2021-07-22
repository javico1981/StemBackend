
## Instalación

- Crear una base datos en PhpMyAdmin
- Copiar o renombrar el archivo .env.example tal que quede así (.env)
- En el .env colocar el nombre de la base de datos y sus credenciales
- En la terminal de comandos hacer composer install 
- En la terminal de comando hacer un php artisan key:generate
- En la terminal de comandos hacer un php artisan migrate --seed
- Y para ejecutar el proyecto php artisan serve