<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SystemLiik</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --success-color: #4cc9f0;
            --dark-bg: #0f172a;
            --text-main: #334155;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-main);
        }

        .login-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.05);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
        }

        .login-sidebar {
            background: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-sidebar::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .login-sidebar::after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .brand-logo {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .login-form-container {
            padding: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-control {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            font-size: 1rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            border: none;
            width: 100%;
            transition: all 0.3s;
            margin-top: 1rem;
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.2);
        }

        .btn-login:hover {
            background: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.3);
        }

        .form-label {
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-check-label {
            font-weight: 600;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="login-card row g-0">
                    <!-- Left Side -->
                    <div class="col-lg-6 login-sidebar d-none d-lg-flex">
                        <div class="brand-logo">
                            <i class="fas fa-layer-group text-info"></i>
                            SystemLiik
                        </div>
                        <h2 class="fw-bold mb-4">Bienvenue !</h2>
                        <p class="lead opacity-75 mb-5">
                            Gérez votre entreprise avec élégance et efficacité. Connectez-vous pour accéder à votre tableau de bord.
                        </p>
                        <div class="d-flex gap-3">
                            <div class="bg-white bg-opacity-25 p-3 rounded-4 text-center" style="min-width: 100px;">
                                <h3 class="fw-bold m-0">99%</h3>
                                <small>Uptime</small>
                            </div>
                            <div class="bg-white bg-opacity-25 p-3 rounded-4 text-center" style="min-width: 100px;">
                                <h3 class="fw-bold m-0">24/7</h3>
                                <small>Support</small>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="col-lg-6 login-form-container">
                        <div class="mb-5 text-center text-lg-start">
                            <h3 class="fw-bold text-dark mb-2">Connexion</h3>
                            <p class="text-muted">Entrez vos identifiants pour continuer</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label">Adresse Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-2 border-end-0 rounded-start-4 ps-3">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control border-start-0 ps-0 bg-light" placeholder="exemple@email.com" required autofocus>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label class="form-label m-0">Mot de passe</label>
                                    <a href="#" class="text-primary text-decoration-none fw-bold small">Oublié ?</a>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-2 border-end-0 rounded-start-4 ps-3">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control border-start-0 ps-0 bg-light" placeholder="" required>
                                </div>
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <button type="submit" class="btn btn-login">
                                Se connecter <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </form>

                        <div class="mt-5 text-center text-muted small">
                            &copy; {{ date('Y') }} SystemLiik. Tous droits réservés.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
