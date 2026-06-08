# Página IMGEESSA

Este es el repositorio oficial de la página web y landing page de **IMGEESSA**, desarrollada para presentar los servicios, catálogo, información corporativa (Quiénes Somos) y facilitar el contacto con los clientes.

## 🚀 Descripción del Proyecto

El proyecto es una aplicación web desarrollada para **IMGEESSA**, diseñada para ser dinámica, responsiva y administrable. Cuenta con una sección pública (landing page interactiva) y un panel administrativo que permite gestionar el contenido de manera autónoma.

### Características Principales:
- **Inicio:** Página principal con un diseño dinámico, información general y un carrusel de distribuidores autorizados.
- **Catálogo:** Visualización de productos y servicios ofrecidos por la empresa.
- **Quiénes Somos:** Información sobre la empresa, misión, visión y ubicación física con un mapa interactivo integrado.
- **Blog:** Sección de artículos o noticias para mantener a los clientes informados.
- **Contacto y Agendamiento:** Formulario de contacto integrado con envíos de correo mediante SMTP de Gmail y un sistema de calendario para agendamiento de reuniones.
- **Panel Administrativo:** Base de datos estructurada y panel para actualizar textos, imágenes y contenidos de las distintas secciones (inicio, catálogo, quiénes somos, etc.) de forma dinámica sin necesidad de tocar el código fuente.

## 🛠️ Tecnologías Utilizadas

- **Backend:** Laravel (PHP)
- **Frontend:** Blade, TailwindCSS, JavaScript (Vite) para un diseño moderno y ágil.
- **Base de Datos:** MySQL / MariaDB (gestionado a través de migraciones y Eloquent ORM de Laravel).
- **Manejo de Correos:** SMTP de Gmail para notificaciones de contacto.

## ⚙️ Requisitos Previos

Antes de ejecutar el proyecto, asegúrate de tener instalado:
- PHP (v8.2 o superior recomendado)
- Composer
- Node.js y npm
- Servidor de Base de Datos (MySQL o MariaDB)
- Git

## 💻 Instalación y Configuración Local

Sigue estos pasos para desplegar el proyecto en tu entorno de desarrollo local:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/tu-usuario/Pagina_IMGEESA.git
   cd Pagina_IMGEESSA
   ```

2. **Instalar dependencias del Backend (PHP):**
   ```bash
   composer install
   ```

3. **Instalar dependencias del Frontend (Node):**
   ```bash
   npm install
   ```

4. **Configurar el entorno:**
   Copia el archivo de ejemplo para crear tu entorno local:
   ```bash
   cp .env.example .env
   ```
   *Nota importante: Configura tus credenciales de base de datos (`DB_*`) y los datos de SMTP para el envío de correos (`MAIL_*`) en el archivo `.env`.*

5. **Generar la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

6. **Ejecutar las migraciones (Base de datos):**
   Configura las tablas necesarias para la gestión dinámica del sitio web:
   ```bash
   php artisan migrate
   ```

7. **Compilar los assets del frontend:**
   ```bash
   npm run dev
   ```

8. **Iniciar el servidor de desarrollo:**
   Abre una nueva terminal y ejecuta:
   ```bash
   php artisan serve
   ```
   La aplicación estará disponible localmente en `http://localhost:8000`.

## 📂 Estructura del Proyecto

Las partes más importantes configuradas en este proyecto incluyen:
- `resources/views/`: Vistas de Blade de la aplicación (ej. `inicio.blade.php`, `catalogo.blade.php`, `quienes_somos.blade.php`, `blog_detalle.blade.php`) y plantillas de correos (`emails/`).
- `app/Http/Controllers/`: Controladores que manejan la lógica de navegación, envío de correos, calendario y el panel administrativo.
- `database/migrations/`: Estructura de la base de datos que permite la edición dinámica de los módulos del sitio.
- `routes/web.php`: Rutas de la web pública y del entorno administrativo.

## 🚢 Despliegue en Producción
Para desplegar esta aplicación en un servidor de producción:
1. Asegúrate de que el *Document Root* de tu servidor web (Apache/Nginx) apunte a la carpeta `public/` del proyecto.
2. Compila los assets de Vite para producción:
   ```bash
   npm run build
   ```
3. Configura correctamente tu archivo `.env` para producción:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   ```
4. Optimiza la carga de Laravel:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

---
**Desarrollado para IMGEESSA.**
