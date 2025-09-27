# Tidelib - Monorepo

Este proyecto contiene tanto la API como el frontend de Tidelib en un solo repositorio para facilitar el desarrollo.

## Estructura del Proyecto

```
www-tidelib-com-ar/
├── api/                 # Backend Laravel (rama main)
├── front/               # Frontend Vue.js (rama desaGabyFrontend)
├── package.json         # Scripts para manejar ambos proyectos
└── README.md           # Este archivo
```

## Tecnologías

- **API**: Laravel (PHP)
- **Frontend**: Vue.js 3 + Vite
- **Base de datos**: MySQL/PostgreSQL
- **Frontend assets**: Vite + Bootstrap 5
- **Estado**: Pinia
- **Routing**: Vue Router

## Instalación

### 1. Instalar dependencias

```bash
# Instalar dependencias de ambos proyectos
npm run install:all

# O instalar por separado:
npm run install:api    # composer install en api/
npm run install:front  # npm install en front/
```

### 2. Configurar variables de entorno

```bash
# Copiar archivos de configuración
cp api/.env.example api/.env
cp front/.env.example front/.env

# Editar las variables según tu entorno
nano api/.env
nano front/.env
```

### 3. Configurar base de datos

```bash
# Ejecutar migraciones
npm run migrate

# O con datos de prueba
npm run fresh
```

## Desarrollo

### Ejecutar ambos proyectos simultáneamente

```bash
npm run dev
```

Esto ejecutará:
- API en http://localhost:8000
- Frontend en http://localhost:5173 (Vite)

### Ejecutar proyectos por separado

```bash
# Solo API
npm run dev:api

# Solo Frontend
npm run dev:front
```

## Scripts Disponibles

- `npm run dev` - Ejecutar ambos proyectos en desarrollo
- `npm run build` - Construir ambos proyectos para producción
- `npm run test` - Ejecutar tests de ambos proyectos
- `npm run migrate` - Ejecutar migraciones de la API
- `npm run fresh` - Resetear DB y ejecutar seeders
- `npm run install:all` - Instalar todas las dependencias

## Comandos Laravel Útiles

```bash
# En la carpeta api/ o front/
php artisan serve                    # Servidor de desarrollo
php artisan migrate                 # Ejecutar migraciones
php artisan migrate:fresh --seed    # Resetear DB con datos de prueba
php artisan make:controller Nombre  # Crear controlador
php artisan make:model Nombre       # Crear modelo
php artisan make:livewire Nombre    # Crear componente Livewire
```

## Estructura de la API

La API está en la carpeta `api/` y contiene:
- Controladores REST
- Modelos Eloquent
- Migraciones de base de datos
- Rutas API
- Documentación Swagger

## Estructura del Frontend

El frontend está en la carpeta `front/` y contiene:
- Componentes Livewire
- Vistas Blade
- Assets compilados con Vite
- Estilos con Tailwind CSS

## Contribución

1. Hacer cambios en la rama correspondiente
2. Probar ambos proyectos con `npm run dev`
3. Ejecutar tests con `npm run test`
4. Hacer commit y push
