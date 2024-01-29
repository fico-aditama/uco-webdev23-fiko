# Article Management System

This is a simple PHP script that allows users to manage articles, including creating, viewing, editing, and deleting articles. It also allows users to comment on articles.

Objectives
[ SESI 1 ] Setup dan Instalasi Laravel, Git, VSCode dan Github

[ SESI 2 ] Mengenal MVC dan Laravel

[ SESI 3 ] Routing, Controller dan View

[ SESI 4 ] Blade Template dan Bootstrap

[ SESI 5 ] Database Migration
            Mengenal struktur migration
            Membuat migration untuk membuat tabel
            Mendefinisikan tabel dalam migration dan mengenal jenis-jenis kolom tabel
            Menjalankan migration
[ SESI 6 ] Blade Template dan Bootstrap
            Membuat model
            Menambahkan data
            Mengubah data
            Menghapus data
            Mengambil data
[ SESI 7 ] Relationship, Custom Attribute, dan Collection
            Mengenal jenis relasi (one to one, one to many)
            Memanfaatkan fungsi Laravel untuk merelasikan satu model dengan model lain
            Menambahkan custom attribute di model
            Memanfaatkan beberapa fungsi dalam Collection

[ SESI 8 ] Seeding, Factory, dan Faker
            Membuat dan menjalankan seeder
            Memanfaatkan faker untuk membuat data dummy
            Membuat dan memanfaatkan factory untuk melakukan generate data dengan cepat

[ SESI 9 ] Form Validation
            Meningkatkan keamanan form dengan validasi
            Memanfaatkan fitur validasi pada inputan
            Menampilkan pesan validasi

[ SESI 10 ]Authentication dan Middleware
            Membuat Sistem autentikasi ( login )
            Mengakses data user yang sedang login
            Membuat fitur logout
            Memanfaatkan middleware untuk sistem authorization sederhana

[ SESI 10 ]Custom Middleware dan Authorization
            Membuat middlewre dan memahami struktur middleware
            Membuat middleware dengan parameter
            Memahami authorization
            Menggunakan gates untuk authorization


## Prerequisites

To run this script, you will need:

* PHP 8.0 or later
* Composer
* A MySQL database

## Installation

1. Clone this repository:

```
git clone https://github.com/fico-aditama/uco-webdev23-fiko.git
```

2. Install the dependencies:

```
composer install
```

3. Create a `.env` file and add the following configuration:

```
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=articles
DB_USERNAME=root
DB_PASSWORD=
```

4. Create the database and tables:

```
php artisan migrate
```

## Usage

To use this script, simply run the following command:

```
php artisan serve
```

This will start a local development server on port 8000. You can then access the application by visiting `http://localhost:8000` in your browser.

## Features

This script includes the following features:

* **Article management:** Users can create, view, edit, and delete articles.
* **Comment management:** Users can comment on articles.
* **Validation:** The script uses Laravel's built-in validation to ensure that user input is valid.
* **Error handling:** The script uses Laravel's built-in error handling to display error messages to users.

## Code Overview

The script is organized into the following files:

* `app/Http/Controllers/ArticleController.php`: This file contains the controller for the articles.
* `app/Models/Article.php`: This file contains the model for the articles.
* `app/Models/ArticleCategory.php`: This file contains the model for the article categories.
* `app/Models/ArticleComment.php`: This file contains the model for the article comments.
* `resources/views/article/form.blade.php`: This file contains the view for the article form.
* `resources/views/article/list.blade.php`: This file contains the view for the article list.
* `resources/views/article/single.blade.php`: This file contains the view for the single article.
