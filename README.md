# Espe Salud – Clasificación por Edad

**Versión:** 1.0.0  
**Descripción:**  
Sistema web en Laravel que, **antes de cualquier registro o login**, solicita la edad del visitante y lo redirige a un portal específico (Bebés, Niños, Adolescentes, Jóvenes, Adultos, Mayores o Longevos). Incluye validación segura, registro de intentos y vistas ricas con Tailwind & Alpine.js.

---

## 📋 Requisitos Previos

- PHP ≥ 8.0  
- Composer  
- Node.js & npm  
- MySQL (u otro motor compatible)  
- Git (opcional)

---

## 🔧 Instalación y Puesta en Marcha

1. **Clona el repositorio**  
   ```bash
   git clone https://tu-repositorio.git espe-salud
   cd espe-salud
   ```

2. **Instala dependencias de PHP**  
   ```bash
   composer install
   ```

3. **Instala dependencias de Node**  
   ```bash
   npm install
   ```

4. **Configura tu entorno**  
   - Copia `.env.example` a `.env`:  
     ```bash
     cp .env.example .env
     ```
   - Ajusta las variables de conexión a tu base de datos:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=espe_salud
     DB_USERNAME=tu_usuario
     DB_PASSWORD=tu_contraseña
     ```

5. **Genera la clave de aplicación**  
   ```bash
   php artisan key:generate
   ```

6. **Corre las migraciones**  
   ```bash
   php artisan migrate
   ```
   > **Si encuentras errores de migración**, asegúrate de que tu base de datos exista y que las credenciales en `.env` sean correctas.  
   > Como alternativa, puedes crear la base de datos manualmente o usar tu herramienta de MySQL (phpMyAdmin, Workbench) y volver a ejecutar:
   > ```bash
   > php artisan migrate:fresh
   > ```

7. **Compila los assets**  
   ```bash
   npm run dev
   ```
   > Para desarrollo continuo, puedes usar `npm run watch`.

8. **Levanta el servidor local**  
   ```bash
   php artisan serve
   ```
   Por defecto correrá en `http://127.0.0.1:8000`.

9. **Visita la aplicación**  
   - Abre tu navegador en `http://127.0.0.1:8000`  
   - Haz clic en **Empezar**, escribe tu edad y explora el portal etario.

---

## 🛠 Estructura de Carpetas

```
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Controladores por portal etario
│   │   ├── Middleware/         # AgeRedirect, EnsureAgeClassification
│   ├── Models/                 # AgeLog
│   └── Services/               # AgeRouterService + interfaz
├── database/
│   └── migrations/             # Migración de age_logs
├── resources/
│   └── views/                  # Vistas Tailwind + Alpine.js
├── routes/
│   └── web.php                 # Rutas limpias y protegidas
├── public/
│   └── css/, js/               # Assets compilados
└── README.md                   # Documentación de instalación
```

---

## ✨ Buenas Prácticas

- **Validación** en servidor y cliente (`min=0`, `max=120`, `is_numeric`).  
- **Separación de responsabilidades**: middleware ligero, servicio SOLID, controladores mínimos.  
- **Registro de trazabilidad** en tabla `age_logs`.  
- **Protección de rutas** con sesión, evitando accesos directos.

---

## 📞 Soporte

Si algo no funciona o tienes dudas, abre un **issue** en el repositorio o contáctate con el equipo de desarrollo de la ESPE.

¡Disfruta de tu portal de salud según tu edad! 🩺🎉
