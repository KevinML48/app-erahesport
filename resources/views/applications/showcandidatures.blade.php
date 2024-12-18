<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/build/assets/css/candidature-show.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/teams/assets/img/ERAH_Logo_sans_texte.png') }}" type="image/x-icon">
    <title>Candidature | {{ $application->first_name }}</title>
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <section class="home">
        <div class="home-img">
            <img src="{{ asset('build/assets/image/show-candidature.png') }}" alt="">
        </div>
        <div class="home-content">
            <h1>{{ $application->last_name }} <span>{{ $application->first_name }}</span></h1>
            <h3 class="typing-text">Il a postulé pour <span>{{ $application->domain->name }}</span></h3>
            <h3 class="typing-text">en tant que <span>{{ $application->position->name }}</span></h3>
            <p>Informations supplémentaires 👇</p>
            <br>
            <p>Voici son speudo : {{ $application->username }}</p>
            <br>
            <p class="long-text">{{ $application->description }}</p>
            <br>
            <p>Voici son email : {{ $application->email }}</p>
            <div class="social-icons">
                <!-- Conditionner l'affichage des boutons en fonction du status -->
                @if($application->status == 'validée')
                    <!-- Si validée, afficher seulement le bouton Supprimer -->
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" title="Supprimer" style="color: red; font-size: 24px;">
                            <i class="fa-solid fa-times-circle"></i>
                        </a>
                    </form>
                @else
                    <!-- Si pas validée, afficher les boutons Valider et Supprimer -->
                    <form action="{{ route('applications.accept', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" title="Valider" style="color: green; font-size: 24px;">
                            <i class="fa-solid fa-check-circle"></i>
                        </a>
                    </form>
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" title="Supprimer" style="color: red; font-size: 24px;">
                            <i class="fa-solid fa-times-circle"></i>
                        </a>
                    </form>
                @endif
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const body = document.querySelector("body");
            const sidebar = document.querySelector("nav");
            const logoToggle = document.querySelector("#logo-toggle");
            const modeToggle = body.querySelector(".mode-toggle");

            // Dark Mode
            let getMode = localStorage.getItem("mode");
            if (getMode && getMode === "dark") {
                body.classList.toggle("dark");
            }

            modeToggle.addEventListener("click", () => {
                body.classList.toggle("dark");
                localStorage.setItem("mode", body.classList.contains("dark") ? "dark" : "light");
            });

            // Sidebar
            let getStatus = localStorage.getItem("status");
            if (getStatus && getStatus === "close") {
                sidebar.classList.toggle("close");
            }

            // Toggle sidebar when clicking the logo image
            logoToggle.addEventListener("click", () => {
                sidebar.classList.toggle("close");
                localStorage.setItem("status", sidebar.classList.contains("close") ? "close" : "open");
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const paragraphs = document.querySelectorAll('.long-text');

            paragraphs.forEach(paragraph => {
                let text = paragraph.textContent;
                let formattedText = '';

                while (text.length > 50) {
                    formattedText += text.slice(0, 50) + '<br>';
                    text = text.slice(50);
                }
                formattedText += text; // Ajouter le texte restant
                paragraph.innerHTML = formattedText;
            });
        });
    </script>

</body>

</html>
