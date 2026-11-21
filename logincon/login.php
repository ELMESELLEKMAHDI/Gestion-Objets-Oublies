<?php
session_start();

$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];

unset($_SESSION['login_error'], $_SESSION['register_error']);
function showError($error) {
    return !empty($error) ? "<div class='alert alert-danger text-center login-alert'>$error</div>" : '';
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guermaï Informatique — Connexion</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="programe/css/bootstrap/bootstrap.min.css">

    <style>
        html, body {
            height: 100%;
            font-family: 'Inter', Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #10161d;
            display: flex;
            flex-direction: column;
        }

        .page {
            flex: 1 0 auto;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            padding: 40px 15px;
        }

  .page::before {
    content: '';
    position: absolute;
    inset: 0;
    background:
        linear-gradient(rgba(12,18,24,0.65), rgba(12,18,24,0.65)),
        url("programe/img/hotel.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    z-index: 0;
}

        

        .auth-card-wrap {
    position: relative;
    z-index: 1;
    max-width: 900px;
    margin: 0 auto;
    width: 100%;
}

        .auth-card {
            background: rgba(12, 18, 24, 0.35);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 80px rgba(0,0,0,0.45);
            border: 1px solid rgba(16,185,129,0.14);
        }

        .auth-card .row {
            margin: 0;
            display: flex;
            flex-wrap: wrap;
        }

        .brand-panel {
    position: relative;
    padding: 40px 35px;
    color: #e8edf2;
    min-height: 480px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    justify-content: center;
    float: none;
}

        .login-panel {
    background: #ffffff;
    padding: 40px 35px 30px;
    position: relative;
    min-height: 480px;
}

        .brand-panel .brand-inner {
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .brand-panel .crest-watermark {
            position: absolute;
            right: -60px;
            bottom: -60px;
            width: 340px;
            max-width: 60%;
            opacity: 0.06;
            filter: grayscale(1) brightness(2);
            pointer-events: none;
        }

        .brand-eyebrow {
            display: inline-block;
            font-size: 12px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #10b981;
            font-weight: 600;
            margin-bottom: 18px;
            padding-left: 30px;
            position: relative;
        }

        .brand-eyebrow::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 22px;
            height: 2px;
            background: #10b981;
        }

        .brand-panel h1 {
    font-size: 28px;
    line-height: 1.2;
    font-weight: 800;
    color: #f4f6f8;
    margin: 0;
}

        .brand-panel h1 span {
            color: #10b981;
        }

        .brand-panel p.lead-text {
    margin-top: 14px;
    font-size: 14px;
    line-height: 1.6;
    color: #a9b4bf;
    max-width: 330px;
}

        .feature-list {
    list-style: none;
    margin: 24px 0 0;
    padding: 0;
}

        .feature-list li {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    font-weight: 500;
    color: #dbe2e8;
    margin-bottom: 12px;
}

        .feature-list .icon-circle {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 1.5px solid rgba(16,185,129,0.5);
            background: rgba(16,185,129,0.08);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-right: 14px;
            color: #10b981;
            font-size: 15px;
        }

        /* ---------- Right login panel ---------- */
        .login-panel {
            background: #ffffff;
            padding: 52px 54px 40px;
            position: relative;
        }

        .login-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #10b981, #395468);
        }

        .header-area {
            text-align: center;
            margin-bottom: 24px;
        }

        .image_gi {
            max-width: 70px;
            height: auto;
            display: block;
            margin: 0 auto 14px auto;
        }

        .header-area h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1e2732;
            margin: 0;
        }

        .header-area .subtitle {
    margin-top: 4px;
    color: #64748b;
    font-size: 13px;
}

        .login-panel .form-group {
            margin-bottom: 18px;
        }

        .input-group-addon.icon-addon {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-right: none;
            color: #94a3b8;
        }

        .login-panel .form-control {
           height: 44px;
            border: 1.5px solid #e2e8f0;
            border-left: none;
            background: #f8fafc;
            font-size: 15px;
            color: #334155;
            box-shadow: none;
        }

        .login-panel .form-control:focus {
            border-color: #10b981;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(16,185,129, 0.18);
        }

        .login-panel .form-control:focus + .input-group-addon,
        .input-group.focused .icon-addon {
            border-color: #10b981;
        }

        .toggle-eye-addon {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-left: none;
            color: #94a3b8;
            cursor: pointer;
        }

        .row-between {
            margin-bottom: 22px;
            font-size: 13.5px;
        }

        .row-between .checkbox {
            margin: 0;
            display: inline-block;
        }

        .row-between label {
            font-weight: 400;
            color: #475569;
        }

        .row-between input[type="checkbox"] {
            margin-right: 6px;
        }

        .row-between a {
            color: #395468;
            text-decoration: none;
            font-weight: 600;
        }

        .row-between a:hover {
            color: #10b981;
            text-decoration: underline;
        }

        .btn-gold {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #10b981, #0f9c73);
            color: #1e2732;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.3px;
            box-shadow: 0 8px 18px rgba(15,156,115, 0.3);
            transition: all 0.3s ease;
        }

        .btn-gold:hover,
        .btn-gold:focus {
            color: #1e2732;
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(15,156,115, 0.4);
        }

        .btn-gold:active {
            transform: translateY(1px);
        }

        .btn-gold .glyphicon {
            margin-right: 6px;
        }

        .footer-line {
            text-align: center;
            margin-top: 22px;
            color: #64748b;
            font-size: 13.5px;
        }

        .footer-line a {
            color: #10b981;
            font-weight: 600;
            text-decoration: none;
        }

        .footer-line a:hover {
            text-decoration: underline;
        }

        .login-alert {
            padding: 13px;
            border-radius: 10px;
            font-weight: 500;
            font-size: 13.5px;
        }

        .site-footer {
            flex-shrink: 0;
            position: relative;
            z-index: 1;
            text-align: center;
            color: #6b7684;
            font-size: 12.5px;
            padding: 18px 0 22px;
        }

        @media (max-width: 991px) {
            .brand-panel {
                min-height: auto;
                padding: 40px 34px 32px;
                text-align: center;
            }
            .brand-panel .brand-inner {
                position: static;
                transform: none;
            }
            .brand-eyebrow {
                padding-left: 0;
            }
            .brand-eyebrow::before {
                display: none;
            }
            .brand-panel p.lead-text {
                max-width: none;
                margin-left: auto;
                margin-right: auto;
            }
            .feature-list li {
                justify-content: center;
            }
            .login-panel {
                padding: 44px 34px 34px;
            }
        }

        @media (max-width: 480px) {
            .brand-panel,
            .login-panel {
                padding: 34px 22px 26px;
            }
            .brand-panel h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>

    <div class="page">
        <div class="container-fluid auth-card-wrap">
            <div class="auth-card">
                <div class="row">

                    <div class="col-xs-12 col-md-6 brand-panel">
                        <img src="programe/img/image_gi.png" alt="" class="crest-watermark">
                        <div class="brand-inner">
                            <span class="brand-eyebrow">Guermaï Informatique</span>
                            <h1>Gestion des<br><span>Objets Oubliés</span></h1>

                            <ul class="feature-list">
                                <li>
                                    <span class="icon-circle"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                    Sécurisé
                                </li>
                                <li>
                                    <span class="icon-circle"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></span>
                                    Rapide
                                </li>
                                <li>
                                    <span class="icon-circle"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span></span>
                                    Fiable
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6 login-panel">
                        <div class="header-area">
                            <img src="programe/img/image_gi.png" alt="Logo" class="image_gi">
                            <h2>Bienvenue</h2>
                            <p class="subtitle">Connectez-vous à votre compte</p>
                        </div>

                        <form action="auth_process.php" method="post">
                            <?= showError($errors['login']); ?>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon icon-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control" placeholder="Nom d'utilisateur" name="User_name" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon icon-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
                                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" id="passwordField" required>
                                    <span class="input-group-addon toggle-eye-addon" onclick="togglePassword()" role="button" aria-label="Afficher le mot de passe">
                                        <span class="glyphicon glyphicon-eye-open" id="eyeIcon" aria-hidden="true"></span>
                                    </span>
                                </div>
                            </div>


                            <button type="submit" name="login" class="btn btn-gold">
                                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                Se connecter
                            </button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-footer">© 2026 Guermaï Informatique</div>

    <script>
        function togglePassword() {
            var field = document.getElementById('passwordField');
            var eye = document.getElementById('eyeIcon');
            if (field.type === 'password') {
                field.type = 'text';
                eye.className = 'glyphicon glyphicon-eye-close';
            } else {
                field.type = 'password';
                eye.className = 'glyphicon glyphicon-eye-open';
            }
        }
    </script>
</body>
</html>
