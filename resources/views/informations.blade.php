<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="{{ asset('build/assets/image/favicon.png') }}" type="image/x-icon">

    <!--=============== REMIXICONS ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.1.0/remixicon.min.css">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('build/assets/css/information.css') }}">

    <title>Responsive cactus website - Bedimcode</title>
</head>
<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo">
                ERAH
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="#new" class="nav__link">Supports</a>
                    </li>

                    <li class="nav__item">
                        <a href="#shop" class="nav__link">Produits</a>
                    </li>

                    <li class="nav__item">
                        <a href="#encadrement" class="nav__link">Encadrement</a>
                    </li>
                </ul>

                <!-- Close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__actions">

                <!-- Toggle button -->
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">
            <div class="home__container container grid">
                <img src="{{ asset('build/assets/image/image-welcome.png') }}" alt="image" class="home__img">

                <div class="home__data">
                    <h1 class="home__title">
                        UNE <br>
                        <span>PLATEFORME</span> FAITES <br>
                        POUR VOUS <br>
                    </h1>

                    <p class="home__description">
                        Découvrez nos offres exclusives, soutenez nos équipes et plongez au cœur de l'univers ERAH 
                    </p>

                    <div class="home__buttons">
                        <a href="{{ route('offers.all') }}" class="button">
                            <span>
                                <i class="ri-arrow-right-line"></i>
                            </span>

                            NOS OFFRES
                        </a>

                        <a href="#encadrement" class="button__link">DETAILS</a>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== NEWS ====================-->
        <section class="new section" id="new">
            <div class="new__container container grid">
                <div class="new__data">
                    <h2 class="section__title">
                        CE QUE NOUS FAISONS <br> POUR VOUS
                    </h2>

                    <p class="new__description">
                        Nous souhaitons vous offrir les meilleures conditions possibles pour atteindre vos objectifs rapidement et vous faire vivre une véritable expérience.
                    </p>
                </div>

                <div class="new__content grid">
                    <article class="new__card">
                        <img src="{{ asset('build/assets/image/new-cactus-1.png') }}" alt="image" class="new__img">
                        <h2 class="new__title">Suivis Compétitif</h2>
                    </article>

                    <article class="new__card">
                        <img src="{{ asset('build/assets/image/new-cactus-2.png') }}" alt="image" class="new__img">
                        <h2 class="new__title">Ressources</h2>
                    </article>

                    <article class="new__card">
                        <img src="{{ asset('build/assets/image/new-cactus-3.png') }}" alt="image" class="new__img">
                        <h2 class="new__title">Développement Visuel</h2>
                    </article>
                </div>
            </div>
        </section>

        <!--==================== SHOP ====================-->
        <section class="shop section" id="shop">
            <h2 class="section__title">
                NOS PRODUITS
            </h2>

            <div class="shop__container container grid">
                <article class="shop__card">
                    <img src="{{ asset('build/assets/image/maillot-2025.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Maillot <br> 2025</h3>
                    <span class="shop__price">31,99$</span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('build/assets/image/JERSEY - erah.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Maillot <br> 2026</h3>
                    <span class="shop__price">31,99$</span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('build/assets/image/Manchettes.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Manchettes <br> 2024</h3>
                    <span class="shop__price">18$</span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('build/assets/image/tapis de souris.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">Tapis de <br> souris</h3>
                    <span class="shop__price">35$</span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>

                <article class="shop__card">
                    <img src="{{ asset('build/assets/image/unnamed.png') }}" alt="image" class="shop__img">

                    <h3 class="shop__title">En <br> développement</h3>
                    <span class="shop__price"></span>

                    <button class="shop__button">
                        <i class="ri-shopping-bag-line"></i>
                    </button>
                </article>
            </div>
        </section>

        <!--==================== CARE ====================-->
        <section class="care section" id="encadrement">
            <h2 class="section__title">
                Ce que nous <br> proposons
            </h2>

            <div class="care__container container grid">
                <img src="{{ asset('build/assets/image/care-cactus.png') }}" alt="image" class="care__img">

                <ul class="care__list">
                    <li class="care__item">
                        <i class="ri-checkbox-fill"></i>
                        <p>
                            Suivis médial
                        </p>
                    </li>

                    <li class="care__item">
                        <i class="ri-checkbox-fill"></i>
                        <p>
                            Suivis administratif
                        </p>
                    </li>

                    <li class="care__item">
                        <i class="ri-checkbox-fill"></i>
                        <p>
                            Développement de carriere personnel
                        </p>
                    </li>

                    <li class="care__item">
                        <i class="ri-checkbox-fill"></i>
                        <p>
                            Financement sur projet
                        </p>
                    </li>

                    <li class="care__item">
                        <i class="ri-checkbox-fill"></i>
                        <p>
                            Contrat adapter
                        </p>
                    </li>
                </ul>
            </div>
        </section>
    </main>

    <script src="{{ asset('build/assets/teams/assets/js/scrollreveal.min.js') }}"></script>

    <script src="{{ asset('build/assets/js/information.js') }}"></script>
</body>
</html>
