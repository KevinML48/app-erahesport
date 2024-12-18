<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="/build/assets/css/welcome.css">

        <title>Responsive landing page</title>
    </head>
    <body>
        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-up-arrow-alt scrolltop__icon'></i>
        </a>
        
        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
        <nav class="nav bd-container">
    <a href="https://erah-esport.fr/" class="nav__logo">ERAH Esport</a>

    <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
            <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
            <li class="nav__item"><a href="#informations" class="nav__link">Informations</a></li>
            <li class="nav__item"><a href="#equipes" class="nav__link">Equipes</a></li>
            <li class="nav__item"><a href="#postuler" class="nav__link">Postuler</a></li>
        </ul>
    </div>

    <!-- Toggle Menu Icon -->
    <div class="nav__toggle" id="nav-toggle">
        <i class='bx bx-grid-alt'></i>
    </div>
</nav>
        </header>

        <main class="l-main">
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__img">
                        <img src="{{ asset('build/assets/image/logo.png') }}" alt="">
                    </div>

                    <div class="home__data">
                        <h1 class="home__title">Bienvenue !</h1>
                        <p class="home__description">Découvrez notre plateforme pour vous
                        facilitez vos recrutement et vos démarches !</p>
                        <a href="/proposition" class="button">Postuler ?</a>
                    </div>   
                </div>
            </section>

            <!--========== SHARE ==========-->
            <section class="share section bd-container" id="informations">
                <div class="share__container bd-grid">
                    <div class="share__data">
                        <h2 class="section-title-center">En savoir plus <br /> sur nos recherches</h2>
                        <p class="share__description">Découvrez tout nos domaines d'activités mais
                                    également ce que l'on propose si vous
                                    intégrez ERAH</p>
                        <a href="/informations" class="button">En savoir plus</a>
                    </div>

                    <div class="share__img">
                        <img src="{{ asset('build/assets/image/shared.png') }}" alt="">
                    </div>
                </div>
            </section>
            <br>
            <br>
            <br>
            <br>

            <!--========== DECORATION ==========-->
            <h2 class="section-title" id="equipes">Voici nos équipes</h2>
    <div class="container">
        <div class="card__container">
            <!-- Boucle à travers toutes les équipes -->
            @foreach($teams as $team)
            <article class="card__article">
                <!-- Affichage de l'image de l'équipe, avec un fallback si l'image n'existe pas -->
                <img src="{{ asset('storage/' . $team->image) }}" alt="image" class="card__img">
                
                <div class="card__data">
                    <!-- Affichage du domaine de l'équipe -->
                    <span class="card__description">{{ $team->domain->name }}</span>
                    <!-- Affichage du nom de l'équipe -->
                    <h2 class="card__title">{{ $team->name }}</h2>
                    <!-- Lien pour plus d'infos -->
                    <a href="/team/{{ $team->id }}" class="card__button">Informations</a>
                </div>
            </article>
            @endforeach
        </div>
    </div>

            <!--========== SEND GIFT ==========-->
            <section class="send section" id="postuler">
                <div class="send__container bd-container bd-grid">
                    <div class="send__content">
                        <h2 class="section-title-center send__title">Tentez votre chance !</h2>
                        <p class="send__description">N'hésitez plus, passez à la seconde étape
                        pour postuler au sein de ERAH</p>
                        <form action="">
                            <div class="send__direction">
                                <input type="text" placeholder="Votre adresse email..." class="send__input">
                                <a href="#" class="button">Postuler</a>
                            </div>
                        </form>
                    </div>

                    <div class="send__img">
                        <img src="{{ asset('build/assets/image/enveloppe.png') }}" alt="">
                    </div>
                </div>
            </section>
        </main>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="{{ asset('build/assets/js/welcome.js') }}"></script>
    </body>
</html>