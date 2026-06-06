# Estructura Detallada del Proyecto IMGEESA

Este documento explica de forma detallada la estructura de carpetas y archivos del proyecto **Pagina_IMGEESA**. Laravel sigue el patrón de diseño Modelo-Vista-Controlador (MVC), organizando el código de manera que cada componente tenga una responsabilidad única y clara.

---

## 📁 Directorios Principales

### 1. [app/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app)
Contiene todo el código PHP central de tu aplicación backend. Es el núcleo donde reside la lógica de negocio.
*   **[Http/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Http)**: Maneja las solicitudes entrantes al servidor.
    *   **[Controllers/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Http/Controllers)**: Aquí se definen los controladores que reciben los datos HTTP y coordinan las respuestas.
        *   [Controller.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Http/Controllers/Controller.php): Controlador base del cual heredan todos los demás controladores.
*   **[Models/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Models)**: Contiene las clases de modelos Eloquent que representan las tablas de la base de datos y sus relaciones.
    *   [User.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Models/User.php): Modelo de usuario por defecto para autenticación y perfilamiento.
*   **[Providers/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Providers)**: Proveedores de servicios que inicializan e inyectan configuraciones y servicios en el contenedor de dependencias de Laravel.
    *   [AppServiceProvider.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/app/Providers/AppServiceProvider.php): Usado para configurar detalles globales de la aplicación (como directivas de Blade, extensiones de esquemas, etc.).

### 2. [bootstrap/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/bootstrap)
Se encarga del arranque e inicialización inicial de la aplicación.
*   [app.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/bootstrap/app.php): Registra las rutas de la consola y web, los middlewares globales de la aplicación y la gestión de excepciones HTTP.
*   [providers.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/bootstrap/providers.php): Lista de proveedores de servicios que deben cargarse al iniciar la aplicación.
*   `cache/`: Directorio interno donde Laravel guarda archivos temporales de configuración y rutas para acelerar el tiempo de respuesta.

### 3. [config/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config)
Contiene todos los archivos de configuración del framework. Cada archivo se enfoca en un aspecto de la aplicación:
*   [app.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/app.php): Nombre, entorno, zona horaria y claves del proyecto.
*   [auth.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/auth.php): Configuración de seguridad, guardianes (guards) y proveedores de usuarios para autenticación.
*   [cache.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/cache.php): Configuración de los sistemas de caché compatibles (base de datos, redis, file, etc.).
*   [database.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/database.php): Ajustes de la base de datos SQLite, MySQL, PostgreSQL o SQL Server.
*   [filesystems.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/filesystems.php): Configuración de almacenamiento de archivos (Local, AWS S3, etc.).
*   [logging.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/logging.php): Configuración de logs y canales de auditoría.
*   [mail.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/mail.php): Configuración de envío de correos electrónicos.
*   [queue.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/queue.php): Configuración de colas y trabajos en segundo plano (jobs).
*   [services.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/services.php): Configuraciones de servicios de terceros (AWS, APIs, etc.).
*   [session.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/config/session.php): Gestión de sesiones (tiempo de expiración, almacenamiento en base de datos o archivos).

### 4. [database/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/database)
Todo lo relacionado con el diseño físico y población de la base de datos.
*   `database.sqlite`: Base de datos SQLite local ligera que se utiliza por defecto en el desarrollo.
*   **[migrations/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/database/migrations)**: Contiene los planos (esquemas) de las tablas para crearlas o modificarlas en la base de datos de manera controlada por versiones.
    *   `create_users_table.php`: Migración de usuarios.
    *   `create_cache_table.php`: Estructura para el manejo de caché en BD.
    *   `create_jobs_table.php`: Estructura para almacenar tareas y colas pendientes.
*   **[factories/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/database/factories)**: Clases para autogenerar datos simulados o de prueba usando la librería Faker.
*   **[seeders/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/database/seeders)**: Clases para rellenar la base de datos con información por defecto o inicial.
    *   [DatabaseSeeder.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/database/seeders/DatabaseSeeder.php): Sembrador principal que orquesta la ejecución del resto de seeders.

### 5. [public/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/public)
El único directorio expuesto directamente al servidor web (Apache, Nginx, etc.). Contiene los recursos públicos accesibles por el navegador:
*   [index.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/public/index.php): Punto de entrada principal de todas las peticiones HTTP que llegan al servidor.
*   [robots.txt](file:///c:/Users/practi/Documents/Pagina_IMGEESA/public/robots.txt): Archivo de configuración para motores de búsqueda SEO.
*   `.htaccess`: Archivo de configuración del servidor Apache para redirección de URLs amigables.
*   `favicon.ico`: Ícono que aparece en la pestaña del navegador.

### 6. [resources/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources)
Contiene los archivos front-end antes de ser compilados y procesados por Vite:
*   **[css/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/css)**:
    *   [app.css](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/css/app.css): Archivo CSS principal donde se importa TailwindCSS v4 y se definen temas personalizados.
*   **[js/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/js)**:
    *   [app.js](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/js/app.js): Script JavaScript principal de entrada.
*   **[views/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/views)**:
    *   [welcome.blade.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/resources/views/welcome.blade.php): Plantilla de vista HTML del portal inicial construida mediante el motor de plantillas Blade de Laravel.

### 7. [routes/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/routes)
Define todas las URLs y rutas accesibles en la aplicación:
*   [web.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/routes/web.php): Rutas accesibles por usuarios en el navegador. Generalmente devuelven vistas Blade o redirigen a controladores.
*   [console.php](file:///c:/Users/practi/Documents/Pagina_IMGEESA/routes/console.php): Rutas basadas en consola. Aquí puedes definir comandos Artisan personalizados.

### 8. [storage/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/storage)
Directorio interno donde Laravel almacena archivos generados por la aplicación.
*   `app/`: Archivos cargados por los usuarios o creados por la aplicación.
*   `framework/`: Sesiones, caché, vistas Blade compiladas y optimizaciones internas.
*   `logs/`: Registro detallado de errores y eventos de la aplicación (`laravel.log`).

### 9. [tests/](file:///c:/Users/practi/Documents/Pagina_IMGEESA/tests)
Contiene pruebas automatizadas para garantizar la calidad del software (Pruebas unitarias y de integración).

### 10. `vendor/` y `node_modules/`
*   `vendor/`: Contiene todas las librerías PHP gestionadas e instaladas por Composer.
*   `node_modules/`: Contiene todas las librerías JavaScript instaladas por npm para el front-end.
*(Nota: Estos dos directorios están ignorados en Git y no deben modificarse manualmente).*

---

## 📄 Archivos Clave en la Raíz del Proyecto

*   **[.env](file:///c:/Users/practi/Documents/Pagina_IMGEESA/.env)**: Archivo de variables de entorno con credenciales locales del servidor, base de datos, puertos, etc. (No se sube a producción).
*   **[.env.example](file:///c:/Users/practi/Documents/Pagina_IMGEESA/.env.example)**: Plantilla pública del archivo `.env` que sirve de guía para configuraciones iniciales.
*   **[composer.json](file:///c:/Users/practi/Documents/Pagina_IMGEESA/composer.json)**: Archivo de configuración de Composer que define las dependencias del backend PHP.
*   **[package.json](file:///c:/Users/practi/Documents/Pagina_IMGEESA/package.json)**: Archivo de configuración de npm que define dependencias frontend como React, Flowbite, AOS, AlpineJS, Vite y TailwindCSS.
*   **[vite.config.js](file:///c:/Users/practi/Documents/Pagina_IMGEESA/vite.config.js)**: Configuración del empaquetador de assets Vite para compilar el código JS y CSS moderno rápidamente.
*   **[tailwind.config.js](file:///c:/Users/practi/Documents/Pagina_IMGEESA/tailwind.config.js)**: Configuración del framework CSS Tailwind CSS para extender estilos y temas.
*   **[postcss.config.js](file:///c:/Users/practi/Documents/Pagina_IMGEESA/postcss.config.js)**: Configuración de PostCSS para procesar estilos CSS con plugins de compatibilidad.
*   **[phpunit.xml](file:///c:/Users/practi/Documents/Pagina_IMGEESA/phpunit.xml)**: Configuración de PHPUnit para ejecutar pruebas automatizadas.
*   **[artisan](file:///c:/Users/practi/Documents/Pagina_IMGEESA/artisan)**: Interfaz de comandos por consola de Laravel que permite crear controladores, ejecutar migraciones, levantar servidores, etc.
