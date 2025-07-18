<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Signup</title>
</head>
<body>

    <!-- ***************** Header ***************** -->
    <div class="container mt-4">
        <img src="{{asset('Dsite/image/brand-logo.svg')}}" width="100" alt="myshop logo" class="mb-3">

        <nav class="nav mb-4">
            <a href="{{route('lay23accueil')}}" id="selected" class="nav-link active">Home</a>
            <a href="shop.html" class="nav-link">Shop</a>
            <a href="contact.html" class="nav-link">Contact</a>
            <a href="profile.html" class="nav-link">Profile</a>
            <a href="signup.html" class="nav-link">Signup</a>
        </nav>

        <form method="POST" action="{{route('clients.store')}}"class="row g-3 col-md-6 col-lg-5 mx-auto">
            @csrf
            <div class="col-12">
                <label for="fullname" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="fullname" required>
            </div>

            <div class="col-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms">
                    <label class="form-check-label" for="terms">
                        I agree to the <a href="#">terms of use</a>.
                    </label>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Signup</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
