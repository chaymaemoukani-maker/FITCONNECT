<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FitConnect Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fa;
        }

        .hero{
            background: linear-gradient(135deg,#0d6efd,#0dcaf0);
            color:white;
            padding:60px;
            border-radius:20px;
        }

        .card{
            transition:.3s;
        }

        .card:hover{
            transform:translateY(-5px);
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <div class="hero text-center mb-5">
        <h1>🏋️ FitConnect</h1>
        <p class="lead">
            Système de gestion des adhérents, abonnements et séances
        </p>
    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>👤 Adhérents</h3>
                    <p>Gestion complète des adhérents</p>

                    <a href="index.php?module=adherent"
                       class="btn btn-primary">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>💳 Abonnements</h3>
                    <p>Gestion des abonnements</p>

                    <a href="index.php?module=abonnement"
                       class="btn btn-success">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <h3>🏃 Séances</h3>
                    <p>Gestion des séances</p>

                    <a href="index.php?module=seance"
                       class="btn btn-warning">
                        Accéder
                    </a>
                </div>
            </div>
        </div>

    </div>

</div>

</body>
</html>