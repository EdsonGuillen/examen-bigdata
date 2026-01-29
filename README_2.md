# Examen Big Data - Sistema de Reportes

Este proyecto es una aplicación Laravel que analiza una base de datos de empleados masiva (+300k registros).

## Requisitos
* PHP 8.2+
* MySQL
* Composer

## Instalación
1. Clonar el repositorio.
2. Ejecutar `composer install`.
3. Copiar `.env.example` a `.env` y configurar base de datos (`employeesdb`).
4. Ejecutar `php artisan key:generate`.
5. Importar la base de datos (Nota: Los archivos .dump están en .gitignore por peso, usar backup local).
6. Ejecutar `php artisan serve`.

## Funcionalidades
* Reportes tabulares con paginación.
* Gráficos estadísticos con Chart.js.
* Manejo de grandes volúmenes de datos.
