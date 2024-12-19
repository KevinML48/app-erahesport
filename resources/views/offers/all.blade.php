<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/build/assets/css/offre.css">
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
    <title>Nos offres</title>
</head>

<body>

    <div class="container">

        <a href="{{ url('/') }}" style="
    display: block; 
    position: absolute; 
    top: 20px; /* Distance par rapport au haut de la page */
    left: 50%; 
    transform: translateX(-50%); 
    text-align: center;
    font-size: 34px; /* Ajustez la taille de la police si nécessaire */
    color:rgb(255, 0, 21); /* Couleur du texte */
    text-decoration: none; /* Pour enlever le soulignement du lien */
    font-weight: 600;
">
            ERAH - Offre
        </a>

        <br>
        <br>


        <div class="main">
            <div class="content">

                <div class="job-cards">

                    @if($totalOffers > 0)
                    @foreach($offers as $offer)
                    <div class="card">
                        <div class="card-header">
                            <div class="job-info">
                                <img src="{{ asset('build/assets/image/logo.png') }}" style="width: 30px;">
                                <div>
                                    <h5>{{ $offer->position->name }} <span>| {{ $offer->created_at->diffForHumans() }}</span></h5>
                                    <a href="#">{{ $offer->domain->name }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-tags">
                            <a href="#">{{ ucfirst($offer->status) }}</a>
                        </div>
                        <div class="card-desc">
                            {{ $offer->description ?? 'No description available' }}
                        </div>
                        <div class="card-footer">
                            <br>
                            <button style="background-color: red; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; text-decoration: none;">
                                <a href="{{ route('proposition.index', ['position_id' => $offer->position->id, 'domain_id' => $offer->domain->id]) }}#contact" style="color: #fff; text-decoration: none;">Postuler</a>
                            </button>
                        </div>
                    </div>
                    @endforeach

                    @else
                    <p style="text-align: center; font-size: 18px; color: #fff;">Désolé, aucune offre ne correspond à votre recherche.</p>
                    @endif
                </div>

            </div>
            <div class="filters">

                <h4 style="color: white;">Découvrer toutes nos offres</h4>
                <p>Tentez votre chance en cliquant sur une offre qui vous correspond pour postuler</p>
                <p><strong>Total des offres :</strong> <span>{{ $totalOffers }}</span></p>

                <form action="{{ route('offers.filter') }}" method="GET">
                    <div class="header">
                        <h3>Recherche</h3>
                    </div>

                    <div class="item-search">
                        <div class="title">
                        </div>
                        <input type="text" name="search" placeholder="Rechercher une offre..." value="{{ request('search') }}" style="width: 100%; padding: 8px;" maxlength="25">
                    </div>

                    <div class="item">
                        <div class="title">
                            <h4>Status</h4>
                            <a href="{{ route('offers.all') }}">Clear</a>
                        </div>
                        <div class="checkbox">
                            <div>
                                <input type="checkbox" id="status-open" name="status[]" value="open">
                                <label for="status-open">Open</label>
                            </div>
                            <div>
                                <input type="checkbox" id="status-closed" name="status[]" value="closed">
                                <label for="status-closed">Closed</label>
                            </div>
                            <div>
                                <input type="checkbox" id="status-important" name="status[]" value="important">
                                <label for="status-important">Important</label>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="title">
                            <h4>Domain</h4>
                        </div>
                        <div class="checkbox">
                            @foreach($domains as $domain)
                            <div>
                                <input type="checkbox" id="domain-{{ $domain->id }}" name="domain[]" value="{{ $domain->id }}" {{ in_array($domain->id, request('domain', [])) ? 'checked' : '' }}>
                                <label for="domain-{{ $domain->id }}">{{ $domain->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit">Rechercher</button>
                </form>
            </div>

        </div>

    </div>


    <script src="{{ asset('assets/js/offre.js') }}"></script>
</body>

</html>