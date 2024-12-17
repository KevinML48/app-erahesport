<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Membres</title>
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
    <style>
        .status-signe {
            background-color: #28a745; /* Vert pour Signé */
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-non-signe {
            background-color: #dc3545; /* Rouge pour Non Signé */
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <main class="table" id="members_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Membres</a></h1>
            <a href="{{ route('members.create') }}" class="btn btn-create">Ajouter un Membre</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($members as $member)
                    <tr>
                        <td>
                            <!-- Afficher l'image du membre -->
                            @if ($member->image)
                                <img src="{{ asset('storage/' . $member->image) }}" alt="Image du membre" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <img src="{{ asset('build/assets/image/default-avatar.png') }}" alt="Image par défaut" style="width: 50px; height: 50px; object-fit: cover;">
                            @endif
                        </td>
                        <td>{{ $member->id }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->prenom }}</td>
                        <td>{{ $member->position->name }}</td>
                        <td>
                            <!-- Afficher le statut avec des couleurs de fond -->
                            <span class="{{ $member->status == 'signé' ? 'status-signe' : 'status-non-signe' }}">
                                {{ ucfirst($member->status) }}
                            </span>
                        </td>
                        <td>
                            <!-- Actions: Modifier et Supprimer -->
                            <a href="{{ route('members.edit', $member->id) }}" class="btn btn-edit">Modifier</a>
                            <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
    <script src="{{ asset('build/assets/js/tableau.js') }}"></script>
</body>
</html>
