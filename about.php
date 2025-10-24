<?php
$pageTitle = "À propos - Portfolio";
$pageCSS = "about.css"; // CSS spécifique à la page "À propos"
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
  <section class="about-section" style="padding: 80px 20px; text-align:center;">
    <div class="container">
      <h2 class="pop">À propos de moi</h2>
      <p class="poppara">
        Bonjour ! Je suis Kelly AKPO, développeuse informatique passionnée par la création d’applications web modernes et performantes. 
        J’aime transformer des idées en solutions concrètes, en combinant esthétique et fonctionnalités. 
        Mon objectif est de concevoir des projets utiles et intuitifs pour les utilisateurs.
      </p>
      
    </div>
  </section>
</main>


  <?php include('includes/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>