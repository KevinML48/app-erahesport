<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" href="/build/assets/css/proposition.css">
    <<link rel="stylesheet" href="/build/assets/css/domaine.css">

    <title>Découvrez nos propositions</title>
</head>

<body>
    <header class="header" id="header">
        <nav class="nav container">
            <a href="/" class="nav__logo">
                Erah
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">Nos atouts</a>
                    </li>
                    <li class="nav__item">
                        <a href="#critères" class="nav__link">Critères</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Postuler</a>
                    </li>
                </ul>

                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__btns">

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="{{ asset('build/assets/image/logo_proposition.png') }}" alt="" class="home__img">

                <div class="home__data">
                    <h1 class="home__title">
                        Un rêve esportif
                    </h1>
                    <p class="home__description">
                        Avec ERAH nous ferons en sorte de vous suivre le plus loins possible, car nous croyons en vos capacités !
                    </p>
                    <a href="{{ route('offers.all') }}" class="button button--flex">
                        Nos offres <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="home__social">
                    <span class="home__social-follow">Follow us</span>

                    <div class="home__social-links">
                        <a href="https://www.linkedin.com/" target="_blank" class="home__social-link">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="home__social-link">
                            <i class="ri-twitter-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="about section container" id="about">
            <div class="about__container grid">
                <img src="{{ asset('build/assets/image/2.png') }}" alt="" class="about__img">

                <div class="about__data">
                    <h2 class="section__title about__title">
                        Ce que nous <br> proposons
                    </h2>

                    <p class="about__description">
                        Pour nous le suivis des joueurs mais également l'encadrement de leur évolutions sont primordiales
                    </p>

                    <div class="about__details">
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Suivis médial
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Suivis administratif
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Développement de carriere personnel
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Financement sur projet
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Contrat adapter
                        </p>
                    </div>

                    <a href="#contact" class="button--link button--flex">
                        Tenter votre chance ? <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>
            </div>
        </section>

        <br>
        <br>
        <br>

        <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title">
                        Vous souhaitez postuler ? <br><br> Remplisser le formulaire <br> avec les informations demander
                    </h2>

                    <div class="contact__data">
                        <div class="contact__information">
                            <h3 class="contact__subtitle">Notre numéro</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line contact__icon"></i>
                                06 49 42 55 78
                            </span>
                        </div>

                        <div class="contact__information">
                            <h3 class="contact__subtitle">Notre email</h3>
                            <span class="contact__description">
                                <i class="ri-mail-line contact__icon"></i>
                                erah.association@gmail.com
                            </span>
                        </div>
                    </div>
                </div>

                <form action="{{ route('applications.store') }}" method="POST" class="contact__form">
    @csrf

    <!-- Afficher les messages de succès -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Afficher les erreurs -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="contact__inputs">
        <div class="contact__content">
            <input type="text" name="first_name" placeholder=" " class="contact__input" value="{{ old('first_name') }}" required>
            <label class="contact__label">Prénom</label>
            @error('first_name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content">
            <input type="text" name="last_name" placeholder=" " class="contact__input" value="{{ old('last_name') }}" required>
            <label class="contact__label">Nom</label>
            @error('last_name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content">
            <input type="text" name="username" placeholder=" " class="contact__input" value="{{ old('username') }}" required>
            <label class="contact__label">Pseudo</label>
            @error('username')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content">
            <input type="email" name="email" placeholder=" " class="contact__input" value="{{ old('email', $email) }}" required>
            <label class="contact__label">Email</label>
            @error('email')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content contact__area">
            <textarea name="description" placeholder=" " class="contact__input" required>{{ old('description') }}</textarea>
            <label class="contact__label">Description</label>
            @error('description')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content">
        <select name="domain_id" class="contact__input" required style="background-color: black; color: white;">
    <option value="" disabled {{ !$domainId ? 'selected' : '' }}>Choisir un domaine</option>
    @foreach($domains as $domain)
        <option value="{{ $domain->id }}" {{ $domainId == $domain->id ? 'selected' : '' }}>{{ $domain->name }}</option>
    @endforeach
</select>
            <label class="contact__label">Domaine</label>
            @error('domain_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="contact__content">
        <select name="position_id" class="contact__input" required style="background-color: black; color: white;">
    <option value="" disabled {{ !$positionId ? 'selected' : '' }}>Choisir une position</option>
    @foreach($positions as $position)
        <option value="{{ $position->id }}" {{ $positionId == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
    @endforeach
</select>
            <label class="contact__label">Position</label>
            @error('position_id')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="button button--flex">
        Enregistrer
        <i class="ri-arrow-right-up-line button__icon"></i>
    </button>
</form>
            </div>
        </section>
    </main>

    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="https://x.com/ErahEsport" class="footer__logo" target="_blank">
                    Erah
                </a>

                <h3 class="footer__title">
                    Suivez nous sur les réseaux <br> pour suivre nos avancer !
                </h3>

            </div>

            <div class="footer__content">
                <h3 class="footer__title">Ou sommes nous ?</h3>

                <ul class="footer__data">
                    <li class="footer__information">Lozère 48000</li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Nous contacter</h3>

                <ul class="footer__data">
                    <li class="footer__information">erah.association@gmail.com</li>

                    <div class="footer__social">
                        <a href="https://www.facebook.com/" class="footer__social-link" target="_blank">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/" class="footer__social-link" target="_blank">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://twitter.com/" class="footer__social-link" target="_blank">
                            <i class="ri-twitter-fill"></i>
                        </a>
                        <a href="https://twitter.com/" class="footer__social-link">
                            <i class="ri-discord-fill"></i>
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    Tenter votre chance !
                </h3>

                <div class="footer__cards">
                    <img src="assets/img/card1.png" alt="" class="footer__card">
                    <img src="assets/img/card2.png" alt="" class="footer__card">
                    <img src="assets/img/card3.png" alt="" class="footer__card">
                    <img src="assets/img/card4.png" alt="" class="footer__card">
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-fill scrollup__icon"></i>
    </a>

    <script src="{{ asset('build/assets/teams/assets/js/scrollreveal.min.js') }}"></script>

    <script src="{{ asset('build/assets/js/proposition.js') }}"></script>
</body>

</html>