<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Équipes</title>
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
</head>
<body>
    <main class="table" id="teams_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Équipes</a></h1>
            <a href="{{ route('teams.create') }}" class="btn btn-create">Créer une Équipe</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($teams as $team)
    <tr>
        <td>
            <!-- Afficher l'image de la team -->
            <img src="{{ asset('storage/' . $team->image) }}" alt="Image de l'équipe" style="width: 50px; height: 50px; object-fit: cover;">
        </td>
        <td>{{ $team->id }}</td>
        <td>{{ $team->name }}</td>
        <td>{{ $team->description }}</td>
        <td>
            <!-- Actions: Modifier et Supprimer -->
            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-edit">Modifier</a>
            <form action="{{ route('teams.destroy', $team->id) }}" method="POST" style="display:inline;">
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
