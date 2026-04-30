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
    :root {
      --acc: #c32257;
      --bg: #000;
      --border: rgba(255, 255, 255, 0.06);
      --mono: 'Courier New', monospace;
    }

    .tableau-main {
      background: var(--bg);
      min-height: 100vh;
      padding: 80px 0 100px;
    }

    .tb-title {
      font-size: clamp(1.8rem, 4vw, 3rem);
      font-weight: 900;
      color: #fff;
      letter-spacing: -0.03em;
      text-align: center;
      margin-bottom: 40px;
    }

    .tb-title .acc {
      color: var(--acc);
    }

    /* Wrapper PDF */
    .tb-pdf-wrapper {
      width: 100%;
      max-width: 900px;
      margin: 0 auto 32px;
      border: 1px solid var(--border);
      border-radius: 2px;
      overflow: hidden;
      background: #fff;
    }

    .tb-iframe {
      width: 100%;
      height: 75vh;
      min-height: 500px;
      border: none;
      display: block;
    }

    /* Bouton */
    .tb-actions {
      text-align: center;
    }

    .tb-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: var(--mono);
      font-size: 0.8rem;
      letter-spacing: 0.06em;
      color: #fff;
      background: var(--acc);
      border: 1px solid var(--acc);
      padding: 12px 28px;
      border-radius: 2px;
      text-decoration: none;
      transition: all 0.2s;
    }

    .tb-btn:hover {
      background: transparent;
      color: var(--acc);
    }

    @media (max-width: 576px) {
      .tableau-main {
        padding: 60px 0 80px;
      }

      .tb-iframe {
        height: 60vh;
      }
    }
  </style>


</head>

<body>
  <?php include('includes/header.php'); ?>

  <main>
    <main class="tableau-main">

      <section class="tb-section">
        <div class="container">

          <h1 class="tb-title">Tableau de <span class="acc">Synthèse</span></h1>

          <!-- PDF affiché en iframe -->
          <div class="tb-pdf-wrapper">
            <iframe
              src="assets/docs/tableau_synthese.pdf"
              class="tb-iframe"
              title="Tableau de synthèse BTS SIO">
              <p>Votre navigateur ne supporte pas l'affichage des PDF.
                <a href="assets/docs/Tableau_Synthese.pdf" target="_blank">Télécharger le document</a>
              </p>
            </iframe>
          </div>

          <!-- Bouton -->
          <div class="tb-actions">
            <a href="https://drive.google.com/file/d/1WMWEi5nfmXUEh7hNLFNLvv4IOyHe9xqZ/view?usp=drive_link" target="_blank" class="tb-btn">
              Ouvrir le document complet
            </a>
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