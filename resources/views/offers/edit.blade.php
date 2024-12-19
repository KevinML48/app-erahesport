<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Offre</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
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
                <span>Modifier une Offre</span>
            </div>
            <div class="form-inputs">
                <!-- Formulaire Laravel pour modifier une offre -->
                <form action="{{ route('offers.update', $offer->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Champ pour le nom de l'offre -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="name" placeholder="Nom de l'offre" value="{{ $offer->name }}" required>
                    </div>

                    <!-- Champ pour la description -->
                    <div class="input-box">
                        <textarea class="input-field" name="description" placeholder="Description de l'offre" rows="4" required>{{ $offer->description }}</textarea>
                    </div>

                    <!-- Sélecteur pour le domaine -->
                    <div class="input-box">
                        <select class="input-field" name="domain_id" required>
                            <option value="" disabled>Choisir un domaine</option>
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}" {{ $offer->domain_id == $domain->id ? 'selected' : '' }}>{{ $domain->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sélecteur pour la position -->
                    <div class="input-box">
                        <select class="input-field" name="position_id" required>
                            <option value="" disabled>Choisir une position</option>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}" {{ $offer->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Sélecteur pour le statut -->
                    <div class="input-box">
    <select name="status" id="status" class="input-field" required>
        <option value="open" {{ $offer->status === 'open' ? 'selected' : '' }}>Ouverte</option>
        <option value="closed" {{ $offer->status === 'closed' ? 'selected' : '' }}>Fermée</option>
        <option value="important" {{ $offer->status === 'important' ? 'selected' : '' }}>Importante</option>
    </select>
</div>


                    <!-- Bouton de soumission pour mettre à jour l'offre -->
                    <div class="input-box">
                        <button class="input-submit" type="submit">
                            <span>Mettre à jour l'Offre</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
