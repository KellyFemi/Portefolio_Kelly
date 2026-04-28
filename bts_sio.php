<?php
$pageTitle = "bts_sio - Portfolio";
// include('includes/header.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS_SIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <style>
        .card-img-container {
            height: 250px;
            overflow: hidden;
        }

        .card-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .col-md-6 {
            text-align: center;
        }
    </style>

</head>

<body>
    <?php include('includes/header.php'); ?>

    <main>

        <!-- HERO -->


        <!-- PRESENTATION -->
        <section class="py-5">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-md-6">
                        <h2 class="fw-bold mb-3">Présentation du BTS SIO</h2>
                        <p>
                            Le <strong>BTS Services Informatiques aux Organisations</strong> est un diplôme
                            reconnu par l'État (RNCP – Bac +2). Il prépare aux métiers du numérique
                            en entreprise, avec une forte dimension technique et professionnelle.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475"
                            class="img-fluid rounded-4 shadow"
                            alt="informatique">
                    </div>
                </div>
            </div>
        </section>

        <!-- OPTIONS -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center fw-bold mb-5 text-black">
                    Les options du <span style="color:#c32257;">BTS SIO</span>
                </h2>

                <div class="row g-4">
                    <!-- SLAM -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-img-container">
                                <img src="assets/images/option_slam.jpg"
                                    class="card-img-top" alt="SLAM">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fw-bold">Option SLAM</h3>
                                <span class="text-uppercase small fw-semibold" style="color:#c32257;">
                                    Solutions Logicielles et Applications Métiers
                                </span>
                                <ul class="mt-3">
                                    <li>Développement web et applicatif</li>
                                    <li>PHP, JavaScript, SQL</li>
                                    <li>Gestion des bases de données</li>
                                    <li>Maintenance logicielle</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- SISR -->
                    <div class="col-md-6">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-img-container">
                                <img src="assets/images/option_sisr.jpg"
                                    class="card-img-top" alt="SISR">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title fw-bold">Option SISR</h3>
                                <span class="text-uppercase small fw-semibold" style="color:#c32257;">
                                    Solutions d’Infrastructure, Systèmes et Réseaux
                                </span>
                                <ul class="mt-3">
                                    <li>Administration réseaux et serveurs</li>
                                    <li>Cybersécurité</li>
                                    <li>Virtualisation</li>
                                    <li>Support informatique</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- COMPETENCES -->
        <section class="py-5">
            <div class="container ">
                <h2 class="fw-bold mb-4">Compétences développées</h2>
                <div class="row g-3 text-white">
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white">Développement d'applications</div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white">Bases de données</div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white ">Cybersécurité</div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white">Systèmes & réseaux</div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white">Analyse des besoins</div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 shadow-sm rounded bg-transparent border border-white">Gestion de projet</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DEBOUCHES -->
        <section class="py-5 text-white" style="background-color:#c32257;">
            <div class="container">
                <h2 class="fw-bold mb-4 text-center">Débouchés professionnels</h2>
                <div class="row is-justify-content-center g-3 ">
                    <div class="col-md-6">• Technicien d’infrastructure</div>
                    <div class="col-md-6">• Administrateur Support systèmes et réseaux</div>
                    <div class="col-md-6">• Technicien support et développement</div>
                    <div class="col-md-6">• Analyste programmeur</div>
                    <div class="col-md-6">• Programmeur d’applications</div>
                    <div class="col-md-6">• Développeur d’applications informatiques/mobiles</div>

                </div>
            </div>
        </section>

    </main>


    <?php include('includes/back-to-top.php'); ?>
    <?php include('includes/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

    </script>
</body>

</html>