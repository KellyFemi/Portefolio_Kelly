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
          <div class="col-lg-6 col-md-12 order-2 order-lg-1 ">
            <h1 class="hero-title"> <span>
                < </span> Kelly AKPO <span> /> </span> </h1>
            <div style="margin-left:100px;">
              <div class="typing-container">
                <span class="text-display"></span>
                <span class="cursor"></span>
              </div>
              </p class="text-description1">
              Le talent dont votre entreprise a besoin.
              </p>
              <button class="btn-cv" onclick="openCVModal()">
                Voir mon CV
              </button>
            </div>
          </div>



          <div class=" col-lg-6 col-md-12 text-center text-lg-end mt-5 mt-lg-0 order-1 order-lg-2">
            <img src="assets/images/d9925bac-5ea9-4659-a3c9-224fab460fc9.png" alt="Kelly" class="img-fluid hero-image">
          </div>
        </div>



        <div class="text-description2">
          <p class="text-description2-content">
            Je bâtis des produits numériques pensés jusqu'au détail. Une pratique
            où la logique nourrit la vision et créativité, conçue pour performer.
          </p>
        </div>
      </div>
    </section>


    <!-- Section Parcours -->
    <section id="parcours" class="parcours-section">
      <div class="container">
        <h2 class="parcours-title">Mon Parcours</h2>
        <p class="parcours-subtitle">
          Une évolution constante guidée par la recherche d'impact et d'efficacité.
        </p>

        <div class="timeline">
          <!-- Item 1 - Gauche -->
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <div class="timeline-date">Mai 2025 - Decembre 2025</div>
              <h3 class="timeline-title">Developpeuse web</h3>
              <p class="timeline-company">IFFP — Nanterre, France</p>
              <p class="timeline-description">
                Conception et développement de sites web dynamiques en respectant les besoins des
                utilisateurs. Intégration d’interfaces responsives,
                optimisation de l’expérience utilisateur et maintenance des fonctionnalités existantes.
              </p>
            </div>
          </div>

          <!-- Item 2 - Droite -->
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <div class="timeline-date">Août 2023 - Août 2024</div>
              <h3 class="timeline-title">Developpeuse Full Stack</h3>
              <p class="timeline-company">MALAIKA GAMES — Cotonou, Bénin</p>
              <p class="timeline-description">
                Développement complet d’applications web, côté front-end et back-end.
                Gestion des bases de données, création d’API, intégration des interfaces
                et participation à toutes les étapes du projet, de l’analyse au déploiement.
              </p>
            </div>
          </div>

          <!-- Item 3 - Gauche -->
          <div class="timeline-item">
            <div class="timeline-dot"></div>
            <div class="timeline-content">
              <div class="timeline-date">Avril 2023 - Juillet 2023</div>
              <h3 class="timeline-title">Chef de Projet Digital IT</h3>
              <p class="timeline-company">Nextmux — Cotonou, Bénin</p>
              <p class="timeline-description">
                Pilotage de projets digitaux et informatiques de la phase de conception à la mise
                en production. Coordination des équipes, suivi des délais,
                gestion des priorités et assurance de la qualité des livrables selon les besoins du client. </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Compétences -->
    <section id="" class="competences-section">
      <div class="container">
        <h2 class="competences-title">Mes compétences</h2>

        <!-- Langages de programmation -->
        <h3 class="competences-subtitle">Langages de programmation</h3>
        <div class="competences-grid">
          <!-- HTML5 -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/html5.svg" alt="HTML5">
            </div>
            <span class="competence-name">HTML5</span>
          </div>

          <!-- CSS3 -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/css.svg" alt="CSS3">
            </div>
            <span class="competence-name">CSS3</span>
          </div>

          <!-- JavaScript -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/javascript.svg" alt="JavaScript">
            </div>
            <span class="competence-name">JavaScript</span>
          </div>

          <!-- PHP -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/php.svg" alt="PHP">
            </div>
            <span class="competence-name">PHP</span>
          </div>

          <!-- Python -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/python.svg" alt="Python">
            </div>
            <span class="competence-name">Python</span>
          </div>
        </div>

        <!-- Frameworks -->
        <h3 class="competences-subtitle">Frameworks</h3>
        <div class="competences-grid">
          <!-- React -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/react.svg" alt="React">
            </div>
            <span class="competence-name">React</span>
          </div>

          <!-- Vue.js / Nuxt.js -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/nuxt.svg" alt="Nuxt.js">
            </div>
            <span class="competence-name">Nuxt.js</span>
          </div>

          <!-- Tailwind CSS -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/tailwindcss.svg" alt="Tailwind CSS">
            </div>
            <span class="competence-name">Tailwind CSS</span>
          </div>

          <!-- Laravel -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/laravel.svg" alt="Laravel">
            </div>
            <span class="competence-name">Laravel</span>
          </div>
        </div>

        <!-- Bases de données -->
        <h3 class="competences-subtitle">Bases de données</h3>
        <div class="competences-grid">
          <!-- MySQL -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/mysql.svg" alt="MySQL">
            </div>
            <span class="competence-name">MySQL</span>
          </div>

          <!-- PostgreSQL -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/postgresql.svg" alt="PostgreSQL">
            </div>
            <span class="competence-name">PostgreSQL</span>
          </div>
        </div>

        <!-- Outils -->
        <h3 class="competences-subtitle">Outils</h3>
        <div class="competences-grid">
          <!-- Git -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/github.svg" alt="Github">
            </div>
            <span class="competence-name">Github</span>
          </div>

          <!-- Figma -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/figma.svg" alt="Figma">
            </div>
            <span class="competence-name">Figma</span>
          </div>

          <!-- VS Code -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/vmware.svg" alt="VM Ware">
            </div>
            <span class="competence-name">VM Ware</span>
          </div>

          <!-- WordPress -->
          <div class="competence-item">
            <div class="competence-icon">
              <img src="assets/skills/wordpress.svg" alt="WordPress">
            </div>
            <span class="competence-name">WordPress</span>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="contact-section">

      <a href="#" class="btn-book">
        PRENDRE UN RENDEZ-VOUS
      </a>

      <a href="mailto:akpokelly1@gmail.com" class="contact-item">
        akpokelly1@gmail.com
      </a>

      <div class="social-links">
        <a href="https://www.linkedin.com/in/kelly-akpo-573793297?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" class="social-icon linkedin" aria-label="LinkedIn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
          </svg>
        </a>

        <a href="https://github.com/KellyFemi" target="_blank" class="social-icon github" aria-label="GitHub">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
          </svg>
        </a>
      </div>
    </section>


  </main>
  <!-- Modal CV avec Image Preview -->
  <div id="cvModal" class="cv-modal">
    <div class="cv-modal-content">
      <div class="cv-modal-header">
        <h3>Mon Curriculum Vitae</h3>
        <button class="cv-close" onclick="closeCVModal()">&times;</button>
      </div>

      <div class="cv-modal-body">
        <!-- Aperçu du CV en image -->
        <div class="cv-preview">
          <img src="assets/cv/cv-preview.jpg" alt="Mon CV" class="cv-image">
        </div>
      </div>

      <div class="cv-modal-footer">
        <a href="assets/cv/mon-cv.pdf" download="CV-Kelly-AKPO.pdf" class="btn-download">
          <span>⬇️</span> Télécharger le CV (PDF)
        </a>

        <button class="btn-close-modal" onclick="closeCVModal()">Fermer</button>
      </div>
    </div>
  </div>
  <?php include('includes/back-to-top.php'); ?>
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

    const texts = [
      "Chef de Projet Digital",
      "Développeuse Frontend",
      "Développeuse Backend"
    ];

    const textDisplay = document.querySelector('.text-display');
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    let isPaused = false;

    function type() {
      const currentText = texts[textIndex];

      if (isPaused) {
        setTimeout(type, 1000); // Pause de 2 secondes après avoir fini d'écrire
        isPaused = false;
        isDeleting = true;
        return;
      }

      if (isDeleting) {
        // Effacement
        textDisplay.textContent = currentText.substring(0, charIndex - 1);
        charIndex--;

        if (charIndex === 0) {
          isDeleting = false;
          textIndex = (textIndex + 1) % texts.length; // Passe au texte suivant
          setTimeout(type, 100); // Petite pause avant de commencer à écrire
          return;
        }
      } else {
        // Écriture
        textDisplay.textContent = currentText.substring(0, charIndex + 1);
        charIndex++;

        if (charIndex === currentText.length) {
          isPaused = true;
        }
      }

      // Vitesse d'écriture/effacement
      const speed = isDeleting ? 50 : 100;
      setTimeout(type, speed);
    }

    // Démarrer l'animation
    type();

    // Animation timeline au scroll avec progression de la ligne
    const timeline = document.querySelector('.timeline');
    const timelineItems = document.querySelectorAll('.timeline-item');

    // Options pour l'observateur
    const observerOptions = {
      threshold: 0.3,
      rootMargin: '0px 0px -100px 0px'
    };

    // Observer pour les items
    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('show');
        }
      });
    }, observerOptions);

    timelineItems.forEach(item => {
      observer.observe(item);
    });

    // Animation de la ligne qui se remplit au scroll
    function updateTimelineProgress() {
      if (!timeline) return;

      const timelineRect = timeline.getBoundingClientRect();
      const timelineTop = timelineRect.top;
      const timelineHeight = timelineRect.height;
      const windowHeight = window.innerHeight;

      // Calculer le pourcentage de progression
      let progress = 0;
      if (timelineTop < windowHeight) {
        progress = Math.min(
          ((windowHeight - timelineTop) / (timelineHeight + windowHeight)) * 100,
          100
        );
      }

      // Appliquer la progression à la ligne
      timeline.style.setProperty('--timeline-progress', `${progress}%`);

      // Mise à jour du pseudo-élément via une variable CSS
      const style = document.createElement('style');
      style.textContent = `.timeline::after { height: ${progress}% !important; }`;

      // Remplacer l'ancien style s'il existe
      const oldStyle = document.getElementById('timeline-progress-style');
      if (oldStyle) {
        oldStyle.remove();
      }
      style.id = 'timeline-progress-style';
      document.head.appendChild(style);
    }

    // Écouter le scroll
    window.addEventListener('scroll', updateTimelineProgress);
    window.addEventListener('resize', updateTimelineProgress);

    // Initialiser
    updateTimelineProgress();
    // Ouvrir le modal
    function openCVModal() {
      const modal = document.getElementById('cvModal');
      modal.classList.add('show');
      document.body.style.overflow = 'hidden';
    }

    // Fermer le modal
    function closeCVModal() {
      const modal = document.getElementById('cvModal');
      modal.classList.remove('show');
      document.body.style.overflow = 'auto';
    }

    // Fermer avec Echap
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        closeCVModal();
      }
    });

    // Fermer en cliquant en dehors
    document.getElementById('cvModal')?.addEventListener('click', function(e) {
      if (e.target === this) {
        closeCVModal();
      }
    });
  </script>


</body>

</html>