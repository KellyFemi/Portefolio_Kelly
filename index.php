<?php
$pageTitle = "Accueil - Portfolio";
// include('includes/header.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Oluwa Femi - Portfolio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
</head>

<body>
  <?php include('includes/header.php'); ?>

  <main>
    <section class="hero-section">
      <div class="container ">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-12 order-2 order-lg-1">
            <p class="greeting">Je me présente,</p>
            <h1 class="hero-title">Kelly AKPO <span class="highlight">Développeuse Informatique</span></h1>
            <p class="hero-description">
            <p class="hero-description">
              Depuis toujours fascinée par la technologie, j’ai choisi le développement comme moyen de créer des outils utiles et inspirants.
              Aujourd’hui, j’allie passion et compétences pour concevoir des projets qui ont du sens.
            </p>
            </p>
            <div class="hero-buttons d-grid gap-3 d-lg-flex justify-content-lg-start">
              <a href="about.php" class="btn btn-primary btn-sm">About Me</a>
              <a href="#contact" class="btn btn-secondary btn-sm">Contact Me</a>
            </div>

          </div>

          <div class=" col-lg-6 col-md-12 text-center text-lg-end mt-5 mt-lg-0 order-1 order-lg-2">
            <img src="assets/images/Profil_noir (2).png" alt="Kelly" class="img-fluid hero-image">
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include('includes/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.addEventListener("scroll", function() {
      const navbar = document.querySelector(".navbar");
      if (window.scrollY > 0) {
        navbar.classList.add("scrolled");
      } else {
        navbar.classList.remove("scrolled");
      }
    });
  </script>
</body>

</html>