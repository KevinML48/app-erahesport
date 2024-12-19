<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Offres</title>
    <link rel="stylesheet" href="/build/assets/css/tableau.css">
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
</head>

<body>
    <main class="table" id="offers_table">
        <section class="table__header">
            <h1><a href="/dashboard" style="text-decoration: none; color: white">Liste des Offres</a></h1>
            <a href="{{ route('offers.create') }}" class="btn btn-create">Créer une Offre</a>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Statut</th>
                        <th>Position</th>
                        <th>Domaine</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($offers as $offer)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->name }}</td>
                        <td>{{ $offer->description }}</td>
                        <td>{{ ucfirst($offer->status) }}</td>
                        <td>{{ $offer->position->name ?? 'Non défini' }}</td>
                        <td>{{ $offer->domain->name ?? 'Non défini' }}</td>
                        <td>
                            <!-- Actions: Modifier et Supprimer -->
                            <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-edit">Modifier</a>
                            <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display:inline;">
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
