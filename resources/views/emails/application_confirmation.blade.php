<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Envoyée</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #000000;
            padding: 20px;
            border-radius: 10px;
            color: #ffffff;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 150px;
            height: auto;
        }

        .content {
            margin-bottom: 30px;
        }

        .content h1 {
            color: #ff0000;
        }

        .content p {
            font-size: 16px;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #ffffff;
            background-color: #ff0000;
            text-decoration: none;
            border-radius: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #444444;
        }

        .footer a {
            color: #ff0000;
            text-decoration: none;
            margin: 0 10px;
        }

        .footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header with Logo -->
        <div class="header">
            <img src="{{ $logoUrl }}" alt="ERAH Logo">
        </div>

        <!-- Content -->
        <div class="content">
            <h1>Bonjour {{ $application->first_name }},</h1>
            <p>
                Merci d'avoir soumis votre candidature pour le poste de <strong>{{ $application->position->name }}</strong>.
            </p>
            <p style="color: white">
                Nous avons bien reçu votre candidature et nous l'examinerons dans les plus brefs délais. Vous recevrez une réponse de notre part sous peu.
            </p>
            <p style="color: white">
                En attendant, nous vous invitons à vous renseigner davantage sur notre entreprise en visitant notre serveur Discord ou en suivant nos comptes sur les réseaux sociaux.
            </p>
            <p>
                <a href="https://discord.gg/meaJw7nbvn" class="button" style="color: #ffffff; text-decoration: none">Rejoindre notre Discord</a>
            </p>
        </div>

        <!-- Footer with Social Media Links -->
        <div class="footer">
            <p style="color: white">Restons connectés :</p>
            <p style="color: white">
                <a href="https://twitter.com/ErahEsport">Twitter</a> |
                <a href="https://www.instagram.com/erahesport/">Instagram</a> |
                <a href="mailto:erah.association@gmail.com">Email</a>
            </p>
            <p style="color: white">Ou appelez-nous au : +33 06 49 42 55 78</p>
            <p style="color: white">&copy; {{ date('Y') }} ERAH Association. Tous droits réservés.</p>
        </div>
    </div>
</body>

</html>
