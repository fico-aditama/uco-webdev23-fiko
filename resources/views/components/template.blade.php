<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .row>* {
            flex: 1 1 90px
        }

        .solution_cards_box .solution_card {
            flex: 0 50%;
            background: #fff;
            box-shadow: 0 2px 4px 0 rgba(136, 144, 195, .2), 0 5px 15px 0 rgba(37, 44, 97, .15);
            border-radius: 15px;
            margin: 8px;
            padding: 10px 15px;
            position: relative;
            z-index: 1;
            overflow: hidden;
            min-height: 265px;
            transition: .7s
        }

        .solution_cards_box .solution_card:hover {
            background: #309df0;
            color: #fff;
            transform: scale(1.1);
            z-index: 9
        }

        .solution_cards_box .solution_card:hover::before {
            background: rgb(85 108 214 / 10%)
        }

        .solution_cards_box .solution_card:hover .solu_description p,
        .solution_cards_box .solution_card:hover .solu_title h3 {
            color: #fff
        }

        .solution_cards_box .solution_card:before {
            content: "";
            position: absolute;
            background: rgb(85 108 214 / 5%);
            width: 170px;
            height: 400px;
            z-index: -1;
            transform: rotate(42deg);
            right: -56px;
            top: -23px;
            border-radius: 35px
        }

        .solution_cards_box .solution_card:hover .solu_description button {
            background: #fff !important;
            color: #309df0
        }

        .solution_card .solu_title h3 {
            color: #212121;
            font-size: 1.3rem;
            margin-top: 13px;
            margin-bottom: 13px
        }

        .solution_card .solu_description p {
            font-size: 15px;
            margin-bottom: 15px
        }

        .solution_card .solu_description button {
            border: 0;
            border-radius: 15px;
            background: linear-gradient(140deg, #42c3ca 0, #42c3ca 50%, #42c3cac7 75%) !important;
            color: #fff;
            font-weight: 500;
            font-size: 1rem;
            padding: 5px 16px
        }

        .our_solution_content h1 {
            text-transform: capitalize;
            margin-bottom: 1rem;
            font-size: 2.5rem
        }

        .hover_color_bubble {
            position: absolute;
            background: rgb(54 81 207 / 15%);
            width: 100rem;
            height: 100rem;
            right: 0;
            z-index: -1;
            top: 16rem;
            border-radius: 50%;
            transform: rotate(-36deg);
            left: -18rem;
            transition: .7s
        }

        .solution_cards_box .solution_card:hover .hover_color_bubble {
            top: 0
        }

        .solution_cards_box .solution_card .so_top_icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #fff;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .solution_cards_box .solution_card .so_top_icon img {
            width: 40px;
            height: 50px;
            object-fit: contain
        }

        @media screen and (min-width:320px) {
            .sol_card_top_3 {
                position: relative;
                top: 0
            }

            .solution_cards_box {
                flex: auto
            }
        }

        @media only screen and (min-width:768px) {
            .solution_cards_box {
                flex: 1
            }
        }

        @media only screen and (min-width:1024px) {
            .sol_card_top_3 {
                position: relative;
                top: -3rem
            }
        }
    </style>
    <script>
        var myAlert = new bootstrap.Alert(document.querySelector('.alert'));
        myAlert.close();
    </script>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">WebDev</a>
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
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <x-alert type="success">Berhasil</x-alert>
        <x-alert type="danger">Gagal</x-alert>
    </div>
    {{ $slot }}

</body>

</html>
