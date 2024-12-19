<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="styles.css" />
    <title>Candidature | {{ $application->username }}</title>
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
</head>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

    :root {
        --primary-color: #000000;
        --primary-color-dark: #0d0d0d;
        --secondary-color: #ff0000;
        --white: #ffffff;
        --first-color: #ff0000;
    }

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Poppins", sans-serif;
        background-image: linear-gradient(to right, var(--primary-color-dark), var(--primary-color));
    }

    .container {
        min-height: 100vh;
        display: flex;
    }

    .container__left {
        flex: 1;
        background-image: url("/build/assets/image/logo-fond.png");
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .left__content {
        margin: 9rem auto 0 auto;
        padding: 1rem;
        max-width: 400px;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(10px);
        border-radius: 15px;
    }


    .left__content h4 {
        margin-bottom: 1rem;
        font-size: 2rem;
        font-weight: 600;
        color: var(--secondary-color);
    }

    .left__content p {
        color: var(--white);
    }

    .container__right {
        flex: 1.5;
        position: relative;
    }

    .container__right img {
        position: absolute;
        bottom: 0;
        left: 0;
        transform: translateX(-50%);
        width: 100%;
        max-width: 450px;
    }

    .right__content {
        margin-left: 8rem;
        margin-top: 8rem;
        padding: 2rem;
    }

    .right__content h1 {
        font-size: 3rem;
        font-weight: 600;
        line-height: 3.5rem;
        color: var(--secondary-color);
    }

    .right__content h4 {
        margin-bottom: 2rem;
        font-size: 1.5rem;
        font-weight: 500;
        color: var(--white);
    }

    .right__content p {
        margin-bottom: 3rem;
        color: var(--white);
    }

    .btn {
        margin-bottom: 3rem;
        min-width: 120px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        outline: none;
        border: 1px solid var(--secondary-color);
        cursor: pointer;
    }

    .primary__btn {
        margin-right: 1rem;
        color: var(--primary-color);
        background-color: var(--secondary-color);
    }

    .secondary__btn {
        color: var(--secondary-color);
        background-color: transparent;
    }

    .socials {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .socials span {
        font-size: 1.5rem;
        color: var(--white);
        cursor: pointer;
        transition: 0.3s;
    }

    .socials span:hover {
        color: var(--secondary-color);
    }

    @media (width < 780px) {
        .container {
            flex-direction: column;
        }

        .container__left {
            min-height: 700px;
        }

        .left__content {
            max-width: none;
            margin: 6rem 0;
            text-align: center;
        }

        .container__right {
            min-height: 700px;
        }

        .container__right img {
            left: 50%;
            top: 0;
            transform: translate(-50%, -100%);
        }

        .right__content {
            text-align: center;
            margin: 8rem auto;
        }

        .socials {
            justify-content: center;
        }
    }

    .button--flex {
        display: inline-flex;
        align-items: center;
        column-gap: .5rem;
    }

    button {
        cursor: pointer;
        border: none;
        outline: none;
    }

    .button {
        display: inline-block;
        background-color: var(--first-color);
        color: #FFF;
        padding: 1rem 1.75rem;
        border-radius: .5rem;
        font-weight: bold;
        transition: .3s;
    }

    .button:hover {
        background-color: var(--first-color-alt);
    }

    .button--link {
        color: var(--first-color);
        font-weight: var(--font-medium);
    }

    .button--link:hover .button__icon {
        transform: translateX(.25rem);
    }

    .long-text {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
</style>

<body>

    <div class="container">
        <div class="container__left">
            <div class="left__content">
                <h4>Notre Processus de Candidature</h4>
                <p>
                    Vous recevrez une réponse dans les 24 heures suivant la soumission de votre candidature. Si votre profil est sélectionné, nous organiserons un entretien pour discuter en détail de vos compétences et de vos objectifs.
                </p>
                <br>
                <p>
                    Lors de cet entretien, nous vous présenterons les membres de l'équipe avec lesquels vous pourriez collaborer et vous fournirons des informations sur les missions à venir.
                </p>
                <br>
                <p>
                    Vous recevrez également des fiches de poste détaillées concernant les responsabilités et les attentes pour le poste visé, ainsi que des informations sur votre domaine d'expertise.
                </p>
                <br>
                <p>
                    Nous visons à vous intégrer efficacement et à soutenir votre développement professionnel pour favoriser votre succès au sein de notre organisation.
                </p>
            </div>

            <div class="left__content">
                <p>
                    Nous vous remercions pour l'interêt porter a notre association !
                </p>
            </div>

        </div>
        <div class="container__right">
            <div class="right__content">
                <h1>Bonjour, <span style="color: white">{{ $application->username }}</span></h1>
                <h4>Voici les détails de votre candidature 👇</h4>
                <h4>
                    <span style="color: #ff0000;"> Votre prénom </span> {{ $application->first_name }}
                </h4>
                <h4>
                    <span style="color: #ff0000;"> Votre nom </span> {{ $application->last_name }}
                </h4>
                <h4>
                    <span style="color: #ff0000;"> Votre email </span> {{ $application->email }}
                </h4>
                <h4 class="long-text">
                    <span style="color: #ff0000;"> Descriptif de votre candidature 👇</span>{{ $application->description }}
                </h4>
                <h4>
                    <span style="color: #ff0000;">Vous avez postuler dans :</span> {{ $application->domain->name }}
                </h4>
                <h4>
                    <span style="color: #ff0000;">Dans le poste de :</span> {{ $application->position->name }}
                </h4>
                <div class="action__btns">
                    <button type="submit" class="button button--flex">
                        <a href="/" style="text-decoration: none; color: white">Accueil</a>
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </div>
                <br>
                <p style="margin-bottom: 15px;">Nous suivre</p>
                <div class="socials">
                    <span><i class="ri-instagram-line"></i></span>
                    <span><i class="ri-twitter-fill"></i></span>
                    <span><i class="ri-discord-fill"></i></span>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paragraphs = document.querySelectorAll('.long-text');

            paragraphs.forEach(paragraph => {
                let text = paragraph.textContent;
                let formattedText = '';

                while (text.length > 56) {
                    formattedText += text.slice(0, 56) + '<br>';
                    text = text.slice(56);
                }
                formattedText += text;
                paragraph.innerHTML = formattedText;
            });
        });
    </script>

</body>

</html>