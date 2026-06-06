# Guía de Instalación y Configuración Local

Este documento detalla los requisitos, pasos y configuraciones adicionales necesarias para ejecutar la aplicación **Pagina_IMGEESA** de manera local en tu entorno de desarrollo.

---

## 🛠 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado en tu sistema:
1.  **PHP 8.3** o superior (con las extensiones recomendadas por Laravel: `openssl`, `pdo`, `mbstring`, `tokenizer`, `xml`, `ctype`, `json`).
2.  **Composer** (gestor de dependencias de PHP).
3.  **Node.js (v18+ o v20+) y npm** (entorno de ejecución y gestor de paquetes JS).
4.  **SQLite** (instalado por defecto en PHP) o **MySQL/MariaDB** si prefieres usar otra base de datos.

---

## 🚀 Pasos para Iniciar el Proyecto Localmente

El proyecto incluye scripts automatizados para simplificar la instalación y el arranque.

### Opción 1: Instalación Rápida con Composer (Recomendado)

1.  Abre la terminal en la raíz del proyecto.
2.  Ejecuta el script de configuración inicial:
    ```bash
    composer run setup
    ```
    Este comando ejecutará de forma secuencial:
    *   Instalación de dependencias de PHP (`composer install`).
    *   Copia automática de `.env.example` a `.env` (si no existe ya un archivo `.env`).
    *   Generación de la clave única de encriptación de Laravel (`php artisan key:generate`).
    *   Creación y migración de la base de datos local SQLite (`php artisan migrate --force`).
    *   Instalación de paquetes frontend de npm (`npm install`).
    *   Compilación de los recursos estáticos iniciales (`npm run build`).

3.  Una vez completado el setup, inicia el servidor de desarrollo local con:
    ```bash
    composer run dev
    ```
    *Este comando levantará concurrentemente el servidor PHP Artisan (`http://127.0.0.1:8000`), el servidor de assets de Vite, el escuchador de colas de trabajos en segundo plano y el visor de logs (Laravel Pail).*

---

### Opción 2: Instalación Manual Paso a Paso

Si prefieres realizar los pasos de manera individual:

1.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```
2.  **Configurar archivo de entorno:**
    Copia el archivo `.env.example` y nómbralo `.env`:
    ```bash
    copy .env.example .env
    ```
3.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```
4.  **Configurar y Migrar la Base de Datos:**
    Asegúrate de tener la base de datos configurada (ver sección de base de datos abajo) y corre:
    ```bash
    php artisan migrate
    ```
    *(Opcional: Si quieres poblar datos de prueba iniciales de la base de datos)*
    ```bash
    php artisan db:seed
    ```
5.  **Instalar dependencias frontend de JavaScript:**
    ```bash
    npm install
    ```
6.  **Levantar el servidor web y Vite:**
    En consolas separadas (o usando `npx concurrently`):
    *   Para el servidor PHP:
        ```bash
        php artisan serve
        ```
    *   Para el servidor de desarrollo de Vite (CSS y JS en caliente):
        ```bash
        npm run dev
        ```

---

## ⚙️ Configuraciones Pendientes / Faltantes

Para que el proyecto funcione de forma completa con todas sus integraciones, es necesario que configures los siguientes bloques en tu archivo local `.env`:

### 1. Base de Datos (DB)
Por defecto, el proyecto usa **SQLite** (`database/database.sqlite`), el cual no requiere configurar credenciales.
Si deseas cambiar a **MySQL**, modifica tu archivo `.env` con las siguientes credenciales:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql
```
*Recuerda crear la base de datos en tu servidor local de MySQL antes de correr `php artisan migrate`.*

### 2. Almacenamiento en la Nube (AWS S3)
El proyecto incluye soporte para el SDK de Amazon AWS S3. Si la aplicación requiere subir imágenes, PDFs, o archivos adjuntos a la nube, completa los siguientes campos en tu archivo `.env`:
```env
AWS_ACCESS_KEY_ID=tu_aws_access_key
AWS_SECRET_ACCESS_KEY=tu_aws_secret_access_key
AWS_DEFAULT_REGION=us-east-1  # Modifica según tu región
AWS_BUCKET=nombre-de-tu-bucket-s3
AWS_USE_PATH_STYLE_ENDPOINT=false
```

### 3. Servicio de Correos (Mail)
Por defecto, las notificaciones y correos electrónicos enviados por la aplicación se guardarán en los archivos de logs locales (`storage/logs/laravel.log`) para evitar envíos no deseados durante el desarrollo:
```env
MAIL_MAILER=log
```
Si deseas probar el envío de correos real mediante un servidor SMTP local o de pruebas (como Mailtrap o Mailhog), actualiza:
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io  # Ejemplo con Mailtrap
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario_smtp
MAIL_PASSWORD=tu_contraseña_smtp
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@imgeesa.com"
MAIL_FROM_NAME="IMGEESA"
```

### 4. Configuración de Sesiones, Caché y Colas
En el archivo `.env.example` vienen configurados para usar la base de datos por estabilidad local:
*   `SESSION_DRIVER=database`
*   `QUEUE_CONNECTION=database`
*   `CACHE_STORE=database`

Si tienes algún problema con las sesiones o colas locales, asegúrate de que tus tablas de migraciones correspondientes estén cargadas. Puedes limpiar el caché local en cualquier momento ejecutando:
```bash
php artisan optimize:clear
```
