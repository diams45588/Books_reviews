<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Gestion de Livres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <style>
        body {
            background: url('images/covers/library.jpeg') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff; /* Couleur blanche pour le texte */
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }
        .card {
            background: rgba(0, 0, 0, 0.7); /* Fond semi-transparent pour la carte */
            color: #ffffff; /* Couleur blanche pour le texte de la carte */
        }
        .btn-primary {
            background-color:rgb(131, 86, 32); /* Couleur primaire */
            border-color:rgb(131, 71, 31); /* Couleur de bordure primaire */
        }
        .btn-primary:hover {
            background-color:rgb(197, 134, 62); /* Couleur primaire au survol */
            border-color:rgb(199, 133, 34); /* Couleur de bordure primaire au survol */
        }

    </style>
    <div class="container py-5">
        <h1 class="mb-4 text-center">Bienvenue sur le site de gestion de livres et d'avis de Diaminatou Sanogo</h1>

        <div class="text-center mb-4">
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg">Voir la liste des livres</a>
        </div>

        <div class="card mt-5 shadow">
            <div class="card-body">
                <h4 class="card-title">Fonctionnalités</h4>
                <ul>
                    <li>Affichage de la liste des livres</li>
                    <li>Détails d’un livre avec ses avis</li>
                    <li>Ajout d’un avis (note + commentaire)</li>
                    <li>Gestion des utilisateurs simples</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
