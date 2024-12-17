<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('build/assets/teams/assets/img/ERAH_Logo_sans_texte.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

    <link rel="stylesheet" href="{{ asset('build/assets/teams/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('build/assets/teams/assets/css/styles.css') }}">

    <title>{{ $team->name }}</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo">
                <img src="{{ asset('build/assets/teams/assets/img/ERAH_Logo_sans_texte.png') }}" alt="image"> Erah-Team
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li>
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>

                    <li>
                        <a href="#equipe" class="nav__link">Equipe</a>
                    </li>

                    <li>
                        <a href="#information" class="nav__link">Information</a>
                    </li>
                </ul>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-large-line"></i>
                </div>

                <img src="{{ asset('build/assets/teams/assets/img/ERAH_Logo_sans_texte.png') }}" alt="image" class="nav__img">
            </div>

            <!-- Toggle button -->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-4-line"></i>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="home section" id="home">
            <img src="{{ asset('build/assets/teams/assets/img/banniere.png') }}" alt="image" class="home__bg">

            <div class="home__container container grid">
                <div class="home__data">
                    <h1 class="home__title">
                        <span>{{ $team->name }}</span>
                    </h1>
                </div>

                @if($team->image)
                <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}" class="home__img">
                @endif
            </div>
        </section>

        <section class="travel section" id="equipe">

            <div class="travel__container container">
                <h2 class="section__title">
                    NOTRE <span>EQUIPE</span>
                </h2>

                <div class="travel__swiper swiper">
                    <div class="swiper-wrapper">
                        @foreach($team->players as $player)
                        <article class="travel__card swiper-slide">
                            @if($player->image)
                            <img src="{{ asset('storage/' . $player->image) }}" alt="Default Player Image" class="travel__img">
                            @else
                            <img src="{{ asset('build/assets/image/logo.png') }}" alt="Default Player Image" class="travel__img">
                            @endif

                            <h3 class="travel__title">{{ $player->member->name }}</h3>
                            <span class="travel__info">{{ $player->member->prenom }}</span>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="explore section" id="information">
            <div class="explore__container container grid">
                <div class="explore__data">
                    <h2 class="section__title">
                        C'EST QUOI <span>{{ $team->name }} ?</span>
                    </h2>

                    <p class="explore__description">
                        {{ $team->description }}
                    </p>

                    <div class="explore__info">
                        <div>
                            <h3 class="explore__info-title">TOTAL PLAYERS</h3>
                            <h2 class="explore__info-number">{{ $team->players->count() }}</h2>
                        </div>
                    </div>
                </div>

                <div class="explore__group">
                    <img src="{{ asset('build/assets/teams/assets/img/explore-img.png') }}" alt="image" class="explore__img">
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container container grid">
            <img src="{{ asset('build/assets/teams/assets/img/ERAH_Logo_sans_texte.png') }}" alt="image" class="footer__planet-1">
            <img src="{{ asset('build/assets/teams/assets/img/design-1.png') }}" alt="image" class="footer__planet-2">

            <div class="footer__content grid">
                <ul class="footer__links">
                    <li>
                        <a href="/" class="footer__link">Accueil</a>
                    </li>

                    <li>
                        <a href="/proposition" class="footer__link">Actualités</a>
                    </li>
                </ul>

                <div class="footer__social">
                    <a href="https://www.linkedin.com/feed/update/urn:li:activity:7148233821132357632/" target="_blank" class="footer__social-link">
                        <i class="ri-linkedin-fill"></i>
                    </a>

                    <a href="https://www.instagram.com/erahesport/" target="_blank" class="footer__social-link">
                        <i class="ri-instagram-fill"></i>
                    </a>

                    <a href="https://x.com/ErahEsport" target="_blank" class="footer__social-link">
                        <i class="ri-twitter-x-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>

    <script src="{{ asset('build/assets/teams/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('build/assets/teams/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('build/assets/teams/assets/js/main.js') }}"></script>

</body>

</html>
