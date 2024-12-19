<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Domaines</title>
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
</head>

<body>
    <main class="table" id="domains_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Domains</a></h1>
            <a href="{{ route('domains.create') }}" class="btn btn-create">Créer un Domaine</a>
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
                    @foreach($domains as $domain)
                    <tr>
                        <td>{{ $domain->id }}</td>
                        <td>{{ $domain->name }}</td>
                        <td>
    <!-- Actions: Modifier et Supprimer -->
    <a href="{{ route('domains.edit', $domain->id) }}" class="btn btn-edit">Modifier</a>
    <form action="{{ route('domains.destroy', $domain->id) }}" method="POST" style="display:inline;">
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
