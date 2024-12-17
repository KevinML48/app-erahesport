<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ludiflex | Modifier un Domaine</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="/build/assets/css/tableau-create.css">
</head>
<body>
    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                <img src="{{ asset('build/assets/image/white-outline.png') }}" class="form-image-main">
                <img src="{{ asset('build/assets/image/dots.png') }}" class="form-image dots">
                <img src="{{ asset('build/assets/image/coin.png') }}" class="form-image coin">
                <img src="{{ asset('build/assets/image/spring.png') }}" class="form-image spring">
                <img src="{{ asset('build/assets/image/rocket.png') }}" class="form-image rocket">
                <img src="{{ asset('build/assets/image/cloud.png') }}" class="form-image cloud">
                <img src="{{ asset('build/assets/image/stars.png') }}" class="form-image stars">
            </div>
        </div>

        <div class="login-form">
            <div class="form-title">
                <span>Modifier un Domaine</span>
            </div>
            <div class="form-inputs">
                <!-- Formulaire Laravel pour modifier un domaine -->
                <form action="{{ route('domains.update', $domain->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Champ pour le nom du domaine pré-rempli -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="name" placeholder="Nom du domaine" value="{{ $domain->name }}" required>
                    </div>

                    <!-- Bouton de soumission pour mettre à jour le domaine -->
                    <div class="input-box">
                        <button class="input-submit" type="submit">
                            <span>Mettre à jour le Domaine</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>