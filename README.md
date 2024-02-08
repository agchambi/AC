# Backend Biblioteca por Antony G. Chambi

## Descripción
Este proyecto es el backend para una aplicación de biblioteca. Este documento se intentó generar mediante Swagger; sin embargo, debido a problemas con la configuración de Laravel, no se pudo generar los endpoints automáticamente.

## Instalación

Sigue estos pasos para instalar y configurar el proyecto:

1. Clona el repositorio:
2. Instala las dependencias de Composer:
3. Copia el archivo de entorno de ejemplo y configura tus variables de entorno:
4. Genera una clave de aplicación:
5. Ejecuta las migraciones para crear la estructura de la base de datos:
6. Opcional: Puebla la base de datos con datos de ejemplo:
7. Inicia el servidor de desarrollo:
8. Abre tu navegador y ve a [localhost:8000](http://localhost:8000).

## Rutas API REST

Este proyecto soporta las operaciones CRUD básicas (Crear, Leer, Actualizar, Eliminar) a través de los siguientes endpoints:

### Recursos Básicos

- **Autores**
  - `GET /autor`: Listar todos los autores.
  - `POST /autor`: Crear un nuevo autor.
  - `GET /autor/{id}`: Obtener detalles de un autor específico.
  - `PUT /autor/{id}`: Actualizar un autor existente.
  - `DELETE /autor/{id}`: Eliminar un autor.

- **Libros**
  - `GET /libros`: Listar todos los libros.
  - `POST /libros`: Crear un nuevo libro.
  - `GET /libros/{id}`: Obtener detalles de un libro específico.
  - `PUT /libros/{id}`: Actualizar un libro existente.
  - `DELETE /libros/{id}`: Eliminar un libro.

- **Clientes**
  - `GET /cliente`: Listar todos los clientes.
  - `POST /cliente`: Crear un nuevo cliente.
  - `GET /cliente/{id}`: Obtener detalles de un cliente específico.
  - `PUT /cliente/{id}`: Actualizar un cliente existente.
  - `DELETE /cliente/{id}`: Eliminar un cliente.

- **Préstamos**
  - `GET /prestamos`: Listar todos los préstamos.
  - `POST /prestamos`: Crear un nuevo préstamo.
  - `GET /prestamos/{id}`: Obtener detalles de un préstamo específico.
  - `PUT /prestamos/{id}`: Actualizar un préstamo existente.
  - `DELETE /prestamos/{id}`: Eliminar un préstamo.

### Lógica de Negocio (Reportes)

- `GET /reportes/prestamos-por-mes`: Reporte de préstamos por mes.
- `GET /reportes/prestamos-por-semana`: Reporte de préstamos por semana.
- `GET /reportes/libros-prestados-mes-actual`: Reporte de libros prestados en el mes actual.
- `GET /reportes/libros-prestados-semana-actual`: Reporte de libros prestados en la semana actual.
- `GET /reportes/total-libros`: Reporte del total de libros.
