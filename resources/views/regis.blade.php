<!-- resources/views/regis.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Enregistrement</title>
</head>
<body>
    <h1>Créer un compte</h1>

    <!-- Formulaire d'enregistrement sans traitement des données -->
    <form method="POST" action="#">
        @csrf <!-- Token de sécurité pour le formulaire -->

        <!-- Champ Nom -->
        <div>
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
        </div>

        <!-- Champ Email -->
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Champ Mot de Passe -->
        <div>
            <label for="password">Mot de Passe</label>
            <input type="password" id="password" name="password" required>
        </div>

        <!-- Confirmer le Mot de Passe -->
        <div>
            <label for="password_confirmation">Confirmer le Mot de Passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <!-- Bouton de Soumission -->
        <div>
            <button type="submit">S'enregistrer</button>
        </div>
    </form>

    <p>Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a></p>
</body>
</html>
