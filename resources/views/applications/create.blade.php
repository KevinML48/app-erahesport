<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler</title>
</head>
<body>
    <h1>Postuler</h1>

    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" placeholder="Prénom" required>
        </div>

        <div>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" id="last_name" placeholder="Nom" required>
        </div>

        <div>
            <label for="username">Pseudo</label>
            <input type="text" name="username" id="username" placeholder="Pseudo" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="Description" required></textarea>
        </div>

        <div>
            <label for="domain_id">Domaine</label>
            <select name="domain_id" id="domain_id" required>
                <option value="" disabled selected>Choisissez un domaine</option>
                @foreach($domains as $domain)
                    <option value="{{ $domain->id }}">{{ $domain->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="position_id">Position</label>
            <select name="position_id" id="position_id" required>
                <option value="" disabled selected>Choisissez une position</option>
                @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Postuler</button>
    </form>

</body>
</html>
