## INICIALIZAR UN PROYECTO CON LARAVEL:

# Crear la estructura inicial(tarda un poco en crearse):
    composer create-project laravel/laravel nombre-de-tu-proyecto

# Abrir en el VSC la carpeta recien creada para estar situado donde toca. 

# Levantar el servidor:
    php artisan serve

# Para listar los comandos de artisan:
    php artisan

## MIGRATIONS:

# Crear un nuevo archivo de migracion con la estructura básica:
    php artisan make:migration create_nombre_table

# Crear un nuevo archivo de migracion sin la estructura básica:
    php artisan make:migration nombre

# Crear un nuevo archivo de migracion para añadir una columna a una tabla ya existente:
    php artisan make:migration add_type_to_nombretabla_table

# Lanzar las migraciones a la base de datos:
    php artisan migrate

# Eliminar las migraciones de la base de datos:
    php artisan migrate:rollback

# Eliminar migraciones y volver a ejecutarlas:
    php artisan migrate:fresh 

## SEEDERS:

# Crear un archivo seed:
    php artisan make:seeder Nombre

# Ejecutar todos los seeds:
    php artisan db:seed

# Ejecutar un seeder en concreto:
    php artisan db:seed --class=NombreArchivo

## FACTORY:

# Generar un archivo factory:
    php artisan make:factory Nombre

## MODELS:

# Crear un nuevo modelo:
    php artisan make:model Nombre

## CONTROLLERS:

# Crear el archivo que almacena los controlladores:
    php artisan make:controller NombreDelControlador


/--------------------------------------
COSAS PARA HACER (TODO):
- ABSTRACCION DE VALIDACIONES
