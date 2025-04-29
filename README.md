# Biblioteca Sebas -  CRUD  PHP - Yii2 

<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
</p>

Proyecto básico realizado en Yii2 para gestionar libros en una biblioteca.

---

## Requisitos

- PHP 7.4 o superior
- Composer
- PostgreSQL 12 o superior

---

## Instalación

### 1. Instalar Composer

### 2. Crear el proyecto Yii2 Basic

En tu terminal, ejecuta: - composer create-project --prefer-dist yiisoft/yii2-app-basic biblioteca_sebas

## Configurar la base de datos

### 1. archivo config/db.php para que se conecte a PostgreSQL:

### 2. Crear la base de datos y la tabla para los libros 

CREATE DATABASE biblioteca;

CREATE TABLE libro (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    anio_publicacion INT,
    editorial VARCHAR(255)
);


## Ejecutar el proyecto

### 1. Levantar el servidor integrado de Yii2 
php yii serve

### 2.Acceder en el navegador
http://localhost:8080



