<?php
// Déterminer le nom du fichier PHP courant
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? 'Portfolio' ?></title>
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
  <!-- CSS communs à toutes les pages -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/veille.css">
  <link rel="stylesheet" href="assets/css/projects.css">
  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/footer.css">

  <!-- CSS spécifique à la page -->
  <?php if (isset($pageCSS)) : ?>
    <link rel="stylesheet" href="assets/css/<?= $pageCSS ?>">
  <?php endif; ?>
</head>

<body>
  <header class="main-header">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand logo" href="index.php">AK</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav nav-menu">
              <!-- <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Home</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'index.php') ? 'active' : '' ?>" href="index.php">Accueil</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'bts_sio.php') ? 'active' : '' ?>" href="bts_sio.php">BTS SIO</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'tableau_synthese.php') ? 'active' : '' ?>" href="tableau_synthese.php">Tableau de Synthèse</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'projects.php') ? 'active' : '' ?>" href="projects.php">Projets</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= ($currentPage == 'veille.php') ? 'active' : '' ?>" href="veille.php">Veille Technologique</a>
              </li>

            </ul>
          </div>
          <div>
            <button class="nav-button">
              <a class="nav-link"
                href="<?= ($currentPage == 'index.php') ? '#contact' : 'index.php#contact' ?>">
                Contact
              </a>
            </button>
          </div>
        </div>
      </nav>
    </div>
  </header>