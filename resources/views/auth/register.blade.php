<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="auth-container">
        <h2 class="text-center mb-4">Inscription</h2>

        <!-- Affichage des erreurs -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="row g-3 col-md-6 col-lg-5 mx-auto">
            @csrf 

            <div class="mb-3">
                <label for="fullname" class="form-label">Nom complet</label>
                <input type="text" class="form-control" 
                       id="fullname" name="fullname" 
                       value="{{ old('fullname') }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" 
                       id="email" name="email"
                       value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" 
                       id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                <input type="password" class="form-control" 
                       id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" 
                       id="terms" name="terms" required>
                <label class="form-check-label" for="terms">
                    J'accepte les <a href="#">conditions d'utilisation</a>
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100">S'inscrire</button>

            <div class="mt-3 text-center">
                Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>