<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Positions</title>
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
</head>

<body>
    <main class="table" id="positions_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Positions</a></h1>
            <a href="{{ route('positions.create') }}" class="btn btn-create">Créer une Position</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->name }}</td>
                        <td>
                            <!-- Actions: Modifier et Supprimer -->
                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-edit">Modifier</a>
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
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
