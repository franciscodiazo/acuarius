<!DOCTYPE html>
<html>
<head>
	<title>Acuarius - Control de consumo de agua</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Acuarius - Control de consumo de agua</h1>
	<p>Acuarius es una aplicación web hecha en Laravel que permite llevar el control del consumo de agua de los usuarios del acueducto rural.</p>

	<h2>Funcionalidades</h2>
	<ul>
		<li>Registro de usuarios</li>
		<li>Registro de medidores de agua</li>
		<li>Registro de lecturas de consumo</li>
		<li>Generación de reportes de consumo</li>
		<li>Envío de notificaciones por correo electrónico</li>
	</ul>

	<h2>Tecnologías utilizadas</h2>
	<ul>
		<li>Laravel</li>
		<li>MySQL</li>
		<li>Bootstrap</li>
	</ul>

	<h2>Instalación</h2>
	<p>Para instalar la aplicación, sigue los siguientes pasos:</p>
	<ol>
		<li>Clona el repositorio de Github: <code>git clone https://github.com/tu_usuario/acuarius.git</code></li>
		<li>Instala las dependencias de Laravel: <code>composer install</code></li>
		<li>Copia el archivo de configuración de ejemplo: <code>cp .env.example .env</code></li>
		<li>Configura las variables de entorno en el archivo .env</li>
		<li>Genera la clave de aplicación: <code>php artisan key:generate</code></li>
		<li>Ejecuta las migraciones: <code>php artisan migrate</code></li>
		<li>Inicia el servidor web: <code>php artisan serve</code></li>
		<li>Abre la aplicación en tu navegador: <code>http://localhost:8000</code></li>
	</ol>

	<h2>Contribuir</h2>
	<p>Si deseas contribuir al desarrollo de Acuarius, por favor crea un fork del repositorio y envía tus cambios a través de un pull request.</p>

	<h2>Autor</h2>
	<p>Acuarius fue creado por Juan Pérez.</p>
</body>
</html>
