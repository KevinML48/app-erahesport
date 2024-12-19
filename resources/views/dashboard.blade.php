<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/build/assets/css/dashboard.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Dashboard Admin</title>
</head>

<style>
    /* Styles de base pour les boutons */
    .btn-edit, .btn-delete, .btn-view-all {
        background-color: #FFF;  /* Fond blanc */
        color: #000;  /* Texte noir */
        border: 2px solid #000;  /* Bordure noire */
        padding: 10px 20px;  /* Espacement interne */
        border-radius: 5px;  /* Coins arrondis */
        font-size: 16px;  /* Taille de texte */
        font-weight: bold;  /* Texte en gras */
        transition: all 0.3s ease;  /* Transition douce pour les animations */
        cursor: pointer;  /* Curseur en forme de main pour indiquer que c'est un bouton */
    }

    /* Animation au survol : agrandissement et changement de couleur */
    .btn-edit:hover {
        background-color: #2980b9;  /* Bleu plus foncé */
        color: #FFF;  /* Texte blanc au survol */
        transform: scale(1.1);  /* Agrandissement */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);  /* Ombre plus marquée */
    }

    .btn-delete:hover {
        background-color: #c0392b;  /* Rouge plus foncé */
        color: #FFF;  /* Texte blanc au survol */
        transform: scale(1.1);  /* Agrandissement */
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);  /* Ombre plus marquée */
    }

    .btn-view-all:hover {
        background-color: rgb(255, 255, 255);  /* Vert plus foncé */
        color: #000;  /* Texte noir au survol */
        transform: scale(1.05);  /* Agrandissement au survol */
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);  /* Ombre plus marquée */
    }

    /* Animation de clic : léger agrandissement et retour */
    .btn-edit:active {
        transform: scale(0.98);  /* Légère réduction au clic */
    }

    .btn-delete:active {
        transform: scale(0.98);  /* Légère réduction au clic */
    }

    .btn-view-all:active {
        transform: scale(0.98);  /* Réduction légère au clic */
    }

</style>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="{{ asset('build/assets/image/logo.png') }}" alt="">
            </div>

            <span class="logo_name">ERAH Admin</span>
        </div>

        <div class="menu-items">
        <ul class="nav-links">
    <li><a href="/members">
        <i class="uil uil-users-alt"></i> <!-- Icone de groupe d'utilisateurs -->
        <span class="link-name">Members</span>
    </a></li>
    <li><a href="/players">
        <i class="uil uil-user-circle"></i> <!-- Icone représentant un joueur -->
        <span class="link-name">Joueurs</span>
    </a></li>
    <li><a href="/teams">
        <i class="uil uil-users-alt"></i> <!-- Icone pour les équipes -->
        <span class="link-name">Equipes</span>
    </a></li>
    <li><a href="/positions">
        <i class="uil uil-briefcase"></i> <!-- Icone de rôle professionnel -->
        <span class="link-name">Rôles</span>
    </a></li>
    <li><a href="/offers">
    <i class="uil uil-list-ul"></i> <!-- Icone d'alerte ou d'annonce -->
        <span class="link-name">Offres</span>
    </a></li>
    <li><a href="/domains">
        <i class="uil uil-layer-group"></i> <!-- Icone pour les domaines -->
        <span class="link-name">Domaines</span>
    </a></li>
    <li><a href="/applications">
        <i class="uil uil-file-check-alt"></i> <!-- Icone de candidature -->
        <span class="link-name">Candidatures</span>
    </a></li>
</ul>

            
<ul class="logout-mode">
    <li>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="uil uil-signout"></i>
            <span class="link-name">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
</ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            
            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                    <i class="uil uil-user"></i>
            <span class="text">Total Players</span>
            <span class="number" id="players-count">{{ $playersCount }}</span>
                    </div>
                    <div class="box box2">
                    <i class="uil uil-file-check"></i>
            <span class="text">Total Applications</span>
            <span class="number" id="applications-count">{{ $applicationsCount }}</span>
                    </div>
                    <div class="box box3">
                    <i class="uil uil-users-alt"></i>
            <span class="text">Total Members</span>
            <span class="number" id="members-count">{{ count($members) }}</span>
                    </div>
                </div>
            </div>

            <div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Membres Récents</span>
    </div>

    <div class="activity-data">
        <!-- Colonne des noms -->
        <div class="data names">
            <span class="data-title">Name</span>
            @foreach ($members as $member)
                <span class="data-list">{{ $member->prenom }} {{ $member->name }}</span>
            @endforeach
        </div>
        
        <!-- Colonne des positions -->
        <div class="data position">
            <span class="data-title">Position</span>
            @foreach ($members as $member)
                <span class="data-list">{{ $member->position ? $member->position->name : 'N/A' }}</span>
            @endforeach
        </div>
        
        <!-- Colonne des dates d'inscription -->
        <div class="data joined">
            <span class="data-title">Joined</span>
            @foreach ($members as $member)
                <span class="data-list">{{ $member->created_at->format('Y-m-d') }}</span>
            @endforeach
        </div>
        
        <!-- Colonne du type -->
        <div class="data type">
            <span class="data-title">Type</span>
            @foreach ($members as $member)
                <span class="data-list">{{ $member->status === 'signé' ? 'Signed' : 'Unsigned' }}</span>
            @endforeach
        </div>
        
        <!-- Colonne du statut -->
        <div class="data status">
            <span class="data-title">Status</span>
            @foreach ($members as $member)
                <span class="data-list">{{ $member->status }}</span>
            @endforeach
        </div>
        
        <!-- Colonne des actions -->
        <div class="data actions">
            <span class="data-title">Actions</span>
            @foreach ($members as $member)
                <span class="data-list">
                    <!-- Lien pour modifier le membre -->
                    <a href="{{ route('members.edit', $member->id) }}" 
                       class="btn-edit" 
                       style="padding: 10px 20px; 
                              background-color:rgb(255, 255, 255); 
                              color: black; 
                              font-size: 14px; 
                              font-weight: bold; 
                              border-radius: 5px; 
                              text-decoration: none; 
                              cursor: pointer; 
                              display: inline-block; 
                              text-align: center; 
                              box-shadow: 0 4px 6px rgba(255, 0, 0, 0.1); 
                              transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;">
                        Edit
                    </a>
                    
                    <!-- Formulaire pour supprimer le membre -->
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="btn-delete" 
                                style="padding: 10px 20px; 
                                       background-color: #e74c3c; 
                                       color: white; 
                                       font-size: 14px; 
                                       font-weight: bold; 
                                       border-radius: 5px; 
                                       cursor: pointer; 
                                       text-align: center; 
                                       box-shadow: 0 4px 6px rgba(255, 0, 0, 0.1); 
                                       transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;" 
                                onclick="return confirm('Are you sure you want to delete this member?')">
                            Delete
                        </button>
                    </form>
                </span>
            @endforeach
        </div>
        

    </div>
            <!-- Bouton pour voir tous les membres centré -->
            <div class="view-all-members" style="display: flex; justify-content: center; margin-top: 20px;">
            <a href="{{ route('members.index') }}" 
               class="btn-view-all" 
               style="padding: 12px 25px; 
                      background-color:rgb(255, 255, 255); 
                      color: black; 
                      font-size: 16px; 
                      font-weight: bold; 
                      border-radius: 5px; 
                      text-decoration: none; 
                      text-align: center; 
                      cursor: pointer; 
                      box-shadow: 0 4px 6px rgba(255, 0, 0, 0.1); 
                      transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;">
                Voir tous les membres
            </a>
        </div>
</div>


        </div>
    </section>

    <script>
        // Utilisation de fetch pour récupérer les données depuis l'API
        fetch('/api/dashboard/stats')
            .then(response => response.json())  // Récupère la réponse en JSON
            .then(data => {
                // Mise à jour des éléments HTML avec les données
                document.getElementById('applications-count').textContent = data.applicationsCount;
                document.getElementById('members-count').textContent = data.membersCount;
                document.getElementById('players-count').textContent = data.playersCount; // Mise à jour du nombre de joueurs
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>

    <script src="{{ asset('build/assets/js/dashboard.js') }}"></script>
</body>
</html>