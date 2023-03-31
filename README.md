# Acuarius

Acuarius es una aplicación web desarrollada en Laravel que permite llevar el control del consumo de agua de los usuarios del acueducto rural.

## Características

- Registro y gestión de usuarios del acueducto.
- Registro y gestión de consumo de agua de los usuarios.
- Generación de reportes de consumo de agua por usuario y por periodo de tiempo.
- Administración de los parámetros del sistema de medición de consumo de agua.

## Requisitos

- PHP 7.2 o superior
- Base de datos MySQL
- Composer
- NPM

## Instalación

1. Clonar el repositorio de Github:

git clone https://github.com/tu_usuario/acuarius.git

markdown
Copy code

2. Instalar las dependencias de PHP con Composer:

composer install

markdown
Copy code

3. Crear un archivo `.env` a partir del archivo `.env.example` y configurar las variables de entorno de la aplicación:

cp .env.example .env

markdown
Copy code

4. Generar una nueva clave de aplicación:

php artisan key:generate

markdown
Copy code

5. Configurar la conexión a la base de datos en el archivo `.env`.

6. Ejecutar las migraciones y los seeders para crear las tablas y los datos de prueba:

php artisan migrate --seed

markdown
Copy code

7. Compilar los assets de la aplicación con NPM:

npm install
npm run dev

markdown
Copy code

8. Iniciar el servidor web de Laravel:

php artisan serve

markdown
Copy code

## Uso

1. Ingresar al sistema con una cuenta de usuario existente o crear una cuenta nueva.

2. Registrar el consumo de agua de los usuarios en la sección de "Consumo".

3. Generar reportes de consumo en la sección de "Reportes".

## Contribución

Si deseas contribuir al desarrollo de Acuarius, puedes crear un fork del repositorio, hacer tus cambios y enviar un pull request. Tu contribución será muy apreciada.

## Licencia

Acuarius se distribuye bajo la licencia MIT. Puedes encontrar más detalles en el archivo LICENSE.
