<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Équipe</title>
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
                <span>Créer une Équipe</span>
            </div>
            <div class="form-inputs">
                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Champ pour le nom de l'équipe -->
                    <div class="input-box">
                        <input type="text" class="input-field" name="name" placeholder="Nom de l'équipe" required>
                    </div>

                    <!-- Champ pour la description de l'équipe -->
                    <div class="input-box">
                        <textarea class="input-field" name="description" placeholder="Description de l'équipe" required></textarea>
                    </div>

                    <!-- Champ pour l'image de l'équipe -->
                    <div class="input-box file-input-wrapper">
                        <label for="image">
                            <img id="imagePreview" src="{{ asset('build/assets/image/logo.png') }}" alt="Aperçu de l'image">
                        </label>
                        <input type="file" class="input-field" name="image" id="image" onchange="updateFileName()">
                    </div>

                    <!-- Sélection du domaine -->
                    <div class="input-box">
                        <select name="domain_id" class="input-field" required>
                            @foreach($domains as $domain)
                                <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="input-box">
                        <button class="input-submit" type="submit">
                            <span>Créer l'Équipe</span>
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
