<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Webdev' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <script>
        var myAlert = new bootstrap.Alert(document.querySelector('.alert'));
        myAlert.close();
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WebDev 2023</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.list') }}">Artikel</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article_category.list') }}">Kategori Artikel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
        <x-alert type="success">{{ session('success') }}</x-alert>
        @endif

        @error('alert')
        <x-alert type="danger">{{ session('errors')->first('alert') }}</x-alert>
        @enderror

    </div>
    {{ $slot }}

</body>

</html>
