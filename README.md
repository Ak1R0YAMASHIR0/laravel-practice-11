# Практическая работа №11 — Маршрутизация Laravel

Учебный проект по теме «Маршрутизация Laravel»: маршруты с параметрами, именованные маршруты и проверка через `php artisan route:list`.

## Что в проекте

Все маршруты описаны в одном файле — [`routes/web.php`](routes/web.php).

| № | Метод и адрес | Имя маршрута | Особенность |
|---|---------------|--------------|-------------|
| 1 | `GET /` | `home` | именованный маршрут |
| 2 | `GET /about` | — | статическая страница |
| 3 | `GET /catalog/{id}` | `catalog.show` | обязательный параметр + `whereNumber('id')` |
| 4 | `GET /hello/{name?}` | `hello` | необязательный параметр, значение по умолчанию |
| 5 | `GET /posts/{post}/comments/{comment}` | — | два параметра в одном адресе |
| 6 | `GET /courses/{slug}` | `courses.show` | параметр с правилом `[A-Za-z0-9-]+` |

Итого: 6 маршрутов, 4 из них принимают параметры из адреса, 3 — именованные.

## Запуск

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Сервер поднимется на `http://127.0.0.1:8000`.

## Проверка

```bash
$ php artisan route:list

  GET|HEAD  / ............................................................................... home › routes/web.php:14
  GET|HEAD  about .................................................................................. routes/web.php:19
  GET|HEAD  catalog/{id} ............................................................ catalog.show › routes/web.php:24
  GET|HEAD  courses/{slug} .......................................................... courses.show › routes/web.php:39
  GET|HEAD  hello/{name?} .................................................................. hello › routes/web.php:29
  GET|HEAD  posts/{post}/comments/{comment} ........................................................ routes/web.php:34
  GET|HEAD  storage/{path} storage.local › vendor/laravel/framework/src/Illuminate/Filesystem/FilesystemServiceProvid…
  PUT       storage/{path} storage.local.upload › vendor/laravel/framework/src/Illuminate/Filesystem/FilesystemServic…
  GET|HEAD  up ........... vendor/laravel/framework/src/Illuminate/Foundation/Configuration/ApplicationBuilder.php:219

                                                                    Showing [9] routes
```

Адреса для проверки в браузере:

- `http://127.0.0.1:8000/` → «Главная страница»
- `http://127.0.0.1:8000/about` → «О проекте»
- `http://127.0.0.1:8000/catalog/7` → «Товар №7»
- `http://127.0.0.1:8000/hello/Анна` → «Привет, Анна!»
- `http://127.0.0.1:8000/posts/3/comments/12` → «Статья №3, комментарий №12»
- `http://127.0.0.1:8000/courses/laravel-basics` → «Курс: laravel-basics»
- `http://127.0.0.1:8000/catalog/abc` → 404 (сработало ограничение `whereNumber`)

## Отчёт

[REPORT.docx](REPORT.docx) — отчёт с пояснениями и скриншотами. Скриншоты лежат в [`docs/screenshots`](docs/screenshots).
