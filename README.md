# Devstagram

**Devstagram** es una red social básica inspirada en Instagram, desarrollada con Laravel 10, Tailwind CSS y Livewire. Este proyecto tiene fines educativos y está orientado a demostrar el uso de funcionalidades esenciales del framework Laravel.

## 🚀 Funcionalidades principales

- Registro e inicio de sesión de usuarios
- Autenticación y autorización usando middleware y políticas
- Visualización de perfiles de usuario con foto de perfil
- Subida de publicaciones con imágenes
- Likes y comentarios en publicaciones
- Sistema de seguidores entre usuarios
- Interfaz responsiva con Tailwind CSS
- Componentes dinámicos usando Livewire

## 🧰 Tecnologías utilizadas

- **Laravel 10**
- **Laravel Livewire**
- **Tailwind CSS**
- **Vite**
- **Eloquent ORM**
- **Intervention Image** para el manejo de imágenes
- **MySQL** como base de datos

## 📦 Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/tu-usuario/devstagram.git
   cd devstagram
2. Instala las dependencias de PHP y Node.js:
   ```bash
   composer install
   npm install
3. Crea y configura tu archivo .env:
   ```bash
   cp .env.example .env
   php artisan key:generate
4. Configura tu base de datos en .env y ejecuta las migraciones:
   ```bash
   php artisan migrate
5. Compila los assets:
   ```bash
   npm run dev
6. Inicia el servidor:
   ```bash
   php artisan serve

## 📚 Aprendizajes y buenas prácticas aplicadas
- Organización del proyecto siguiendo el patrón MVC (Model View Controller)
- Uso de componentes de Laravel y Livewire para mantener la lógica desacoplada y tener un código fácilmente mantenible
- Uso de migraciones y seeders para definir y poblar la base de datos
- Políticas para el control de acceso a acciones sensibles (Protección de rutas)
- Buenas prácticas con Git: ramas, PRs y mensajes claros
