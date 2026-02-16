# To Do List APP + API - Laravel Test Project 

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![GitHub](https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white)

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Laravel Version](https://img.shields.io/badge/Laravel-11.x-FF2D20.svg)](https://laravel.com)

> A complete REST API for task management (To‑Do List) built with Laravel 12.  
> Includes a Bootstrap 5 frontend, Docker support, Form Requests, API Resources, Feature Tests, Factories & Seeders.

> Полноценный REST API для управления задачами (To‑Do список), разработанный на Laravel 12.  
> Включает Bootstrap 5 интерфейс, поддержку Docker, Form Request, API Resource, Feature Tests, фабрики и сидеры.

---
## ✨ Возможности

- ✅ **RESTful API** с полным CRUD (создание, чтение, обновление, удаление)
- ✅ **Веб‑интерфейс** на Bootstrap 5
- ✅ **Валидация через Form Request** с кастомными сообщениями на русском
- ✅ **API Resources** – единый формат JSON‑ответов
- ✅ **База данных MySQL** – миграции, фабрики и сидеры (20 тестовых задач)
- ✅ **Поддержка Docker**
- ✅ **7 Feature‑тестов** для проверки API

## ✨ Features

- ✅ **RESTful API** with full CRUD operations (Create, Read, Update, Delete)
- ✅ **Web interface** built with Bootstrap 5
- ✅ **Form Request validation** with custom Russian error messages
- ✅ **API Resources** – consistent JSON response formatting
- ✅ **MySQL database** with migrations, factories, and seeders (20 dummy tasks)
- ✅ **Docker support**
- ✅ **Comprehensive feature tests** – 7 passing tests for the API

## 📋 Requirements / Требования
- PHP 8.1+
- MySQL 5.7+
- Composer

## 🚀 Installation

### 1. Clone the repository / Клонировать репозиторий
git clone https://github.com/cer3us/todolist-app_api-laravel.git
cd todolist-app_api-laravel

### 2. Install PHP dependencies / Установить PHP зависимости
composer install

### 3. Copy environment file / Копировать .env файл 
cp .env.example .env

### 4. Generate application key / Сгенерировать ключ приложения
php artisan key:generate

### 5. Create a MySQL database (e.g. `todo_api`) / Создать базу данныз MySQL ( на примере `todo_api`) 
####    Update `.env` with your database credentials / Внести учетные данные в `.env` :
####    DB_DATABASE=todo_api
####    DB_USERNAME=root
####    DB_PASSWORD=root

### 6. Run migrations and seeders / Запустить миграции с сидерами
php artisan migrate --seed

### 7. Start the development server / Запустить локальный тестовый сервер
php artisan serve --port=8000

### 8. Use the App or API / Простеститьровать Вэб интерфейс или API
http://localhost:8000 – for web interface / Вэб интерфейс  
http://localhost:8000/api/tasks - API base URL / маршрут для API 

---

🔹 Endpoints / Маршруты
| Method/Метод | Endpoint/URL | Description/Описание | HTTP Status Codes / Коды состояния HTTP |
| --- | --- | --- | --- |
| GET |	/api/tasks | Get all tasks/Получить все задачи | 200 OK |
| POST | /api/tasks | Create a new task/Создать задачу | 201 Created |
| GET |	/api/tasks/{id} | Get a single task/Получить одну задачу | 200 OK, 404 Not Found |
| PATCH | /api/tasks/{id} | Update a task/Обновить задачу | 200 OK, 404 Not Found |
| DELETE | /api/tasks/{id} | Delete a task/Удалить задачу |	200 OK, 404 Not Found |
