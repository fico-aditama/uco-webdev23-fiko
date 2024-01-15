# Article Management System

This is a simple PHP script that allows users to manage articles, including creating, viewing, editing, and deleting articles. It also allows users to comment on articles.

Objectives
1. Meningkatkan keamanan form dengan validasi
2. Memanfaatkan fitur validasi pada inputan
3. Menampilkan pesan validasi


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
