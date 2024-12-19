<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Membre</title>
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="/build/assets/css/tableau-create.css">
    <style>
        .file-input-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        #imagePreview {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        input[type="file"] {
            display: none;
        }
    </style>
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
                <span>Créer un Membre</span>
            </div>
            <div class="form-inputs">
                <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Champ pour le nom du membre -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="name" placeholder="Nom du membre" required>
                    </div>

                    <!-- Champ pour le prénom du membre -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="prenom" placeholder="Prénom du membre" required>
                    </div>

                    <!-- Sélection de la position -->
                    <div class="input-box">
                        <select name="position_id" class="input-field" required>
                            @foreach($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Champ pour l'image du membre -->
                    <div class="input-box file-input-wrapper">
                        <label for="image">
                            <img id="imagePreview" src="{{ asset('build/assets/image/logo.png') }}" alt="Aperçu de l'image">
                        </label>
                        <input type="file" class="input-field" name="image" id="image" onchange="updateFileName()">
                    </div>

                    <!-- Sélection du statut -->
                    <div class="input-box">
                        <select name="status" class="input-field" required>
                            <option value="signé">Signé</option>
                            <option value="non signé">Non Signé</option>
                        </select>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="input-box">
                        <button class="input-submit" type="submit">
                            <span>Créer le Membre</span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function updateFileName() {
            const fileInput = document.getElementById('image');
            const file = fileInput.files[0];
            const reader = new FileReader();
            
            reader.onloadend = function() {
                document.getElementById('imagePreview').src = reader.result;
            }
            
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
