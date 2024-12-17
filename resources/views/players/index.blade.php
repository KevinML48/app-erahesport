<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Joueurs</title>
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
</head>
<body>
    <main class="table" id="players_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Joueurs</a></h1>
            <a href="{{ route('players.create') }}" class="btn btn-create">Créer un Joueur</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>Membre</th>
                        <th>Équipe</th>
                        <th>Domaine</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($players as $player)
    <tr>
        <td>
            <!-- Afficher la photo du joueur -->
            <img src="{{ asset('storage/' . $player->image) }}" alt="Photo du joueur" style="width: 50px; height: 50px; object-fit: cover;">
        </td>
        <td>{{ $player->id }}</td>
        <td>{{ $player->member->name }}</td>
        <td>{{ $player->team->name ?? 'Aucune' }}</td>
        <td>{{ $player->domain->name ?? 'Aucun' }}</td>
        <td>
            <!-- Actions: Modifier et Supprimer -->
            <a href="{{ route('players.edit', $player->id) }}" class="btn btn-edit">Modifier</a>
            <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
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
