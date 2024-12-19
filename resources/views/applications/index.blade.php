<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="/build/assets/css/candidature.css">
    <link rel="shortcut icon" href="{{ asset('build/assets/image/logo.png') }}" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<title>Gestion Candidatures</title>
</head>
<body>

<div class="content">

@if(session('success'))
<div id="success-alert" class="alert" style="position: absolute; top: 20px; right: 20px; background-color: green; color: white; padding: 10px; border-radius: 5px; z-index: 1000;">
	{{ session('success') }}
</div>

<script>
	setTimeout(function() {
		var alert = document.getElementById('success-alert');
		if (alert) {
			alert.style.transition = 'opacity 0.5s ease';
			alert.style.opacity = '0';
			setTimeout(function() {
				alert.remove();
			}, 500);
		}
	}, 3000);
</script>
@endif


<main>
	<div class="header">
		<div class="left">
			<h1><a href="/dashboard" style="color: white">Gestion</a></h1>
			<ul class="breadcrumb">
				<li><a href="#">Candidatures</a></li>
			</ul>
		</div>
	</div>

    <div class="bottom-data">
    <div class="orders">
        <div class="header">
            <i class='bx bx-receipt'></i>
            <h3>Toutes les Candidatures</h3>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Rôles</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                    @if($application->status != 'validée') <!-- Afficher les candidatures non validées -->
                        <tr>
                            <td>
                            <a href="{{ route('applications.show', $application->id) }}">
        <p style="color: white !important;">{{ $application->position->name }}</p>
    </a>
                            </td>
                            <td>
                                <form action="{{ route('applications.accept', $application->id) }}" method="POST" style="display: inline-block; margin-right: 5px;">
                                    @csrf
                                    <button type="submit" class="btn btn-success" style="background-color: green; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                                        <i class="fas fa-check"></i> Accepter
                                    </button>
                                </form>
                                <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                                        <i class="fas fa-trash"></i> Refuser
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>


<div class="reminders">
    <div class="header">
        <i class='bx bx-note'></i>
        <h3>Candidatures Validées</h3>
    </div>
    <ul class="task-list">
        @foreach($acceptedApplications as $application)
            <li class="completed">
                <div class="task-title">
                <a href="{{ route('applications.show', $application->id) }}">
        <p style="color: white !important;">{{ $application->position->name }}</p>
    </a>
                </div>
                <div class="task-status" style="color: green">
                    <p style="margin-right: 10px">Acceptée</p>
                </div>
                <div class="task-actions">
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="background-color: red; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer;">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

	</div>
</main>

</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
	const body = document.querySelector("body");
	const sidebar = document.querySelector("nav");
	const logoToggle = document.querySelector("#logo-toggle");
	const modeToggle = body.querySelector(".mode-toggle");

	// Dark Mode
	let getMode = localStorage.getItem("mode");
	if (getMode && getMode === "dark") {
		body.classList.toggle("dark");
	}

	modeToggle.addEventListener("click", () => {
		body.classList.toggle("dark");
		localStorage.setItem("mode", body.classList.contains("dark") ? "dark" : "light");
	});

	// Sidebar
	let getStatus = localStorage.getItem("status");
	if (getStatus && getStatus === "close") {
		sidebar.classList.toggle("close");
	}

	// Toggle sidebar when clicking the logo image
	logoToggle.addEventListener("click", () => {
		sidebar.classList.toggle("close");
		localStorage.setItem("status", sidebar.classList.contains("close") ? "close" : "open");
	});
});
</script>

</body>
</html>
