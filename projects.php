<?php
$pageTitle = "bts_sio - Projets";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Projects</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card-img-container {
      height: 250px;
      overflow: hidden;
    }

    .card-img-container img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      object-position: center;
    }
  </style>

</head>

<body>
  <?php include('includes/header.php'); ?>

  <main class="proj-main">

    <!-- ══ HERO ══ -->
    <section class="proj-hero">
      <div class="proj-hero-grid"></div>
      <div class="container">
        <div class="proj-hero-inner">
          <h1 class="proj-hero-title">Ce que j'ai <span class="acc">construit</span></h1>
          <p class="proj-hero-desc">
            J'ai réalisé plusieurs projets en formation BTS SIO et en autonomie. Du développement web aux applications
            full stack, chaque projet reflète une compétence acquise et une problématique résolue.
          </p>

        </div>
      </div>
    </section>

    <section class="proj-section" id="section-pro">
      <div class="container">

        <div class="proj-section-header">
          <div class="proj-section-header-left">
            <!-- <span class="proj-section-num">01</span> -->
            <div>
              <h2 class="proj-section-titre">Projets personnels & scolaires</h2>
              <p class="proj-section-sous">BTS SIO — Réalisations en équipe et personnelles</p>
            </div>
          </div>

        </div>
        <!-- Projet Prestalia leger -->
        <div class="proj-card proj-card--reverse">
          <div class="proj-card-img">
            <img src="assets/images/prestalialeger.png" alt="Prestalia" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">01</span> -->
              <div class="proj-tags">
                <span class="proj-tag">JavaScript</span>
                <span class="proj-tag">TypeScript</span>
                <span class="proj-tag">HTML</span>
                <span class="proj-tag">CSS</span>
              </div>
            </div>
            <h3 class="proj-card-titre">Prestalia (Client léger)</h3>
            <p class="proj-card-desc">
              Application web de mise en relation entre clients et prestataires de services,
              réalisée en équipe dans le cadre du BTS SIO. Plateforme complète avec gestion des comptes,
              des profils et des réservations.
            </p>
            <div class="proj-card-infos">
              <div class="proj-info-item">
                <span class="proj-info-label">Contexte</span>
                <span class="proj-info-val">Projet E6 </span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Modalité</span>
                <span class="proj-info-val">Travail en équipe</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Back-end</span>
                <span class="proj-info-val">Node.js (API REST)</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Outils</span>
                <span class="proj-info-val">VS Code, Git, GitHub, Figma, EJS</span>
              </div>
            </div>
            <div class="proj-features">
              <span class="proj-feature">Gestion des comptes utilisateurs</span>
              <span class="proj-feature">Profils clients & prestataires</span>
              <span class="proj-feature">Système de réservation</span>
              <span class="proj-feature">API REST</span>
            </div>
            <div class="proj-card-links">
              <a href="#" target="_blank" class="proj-btn proj-btn--primary">
                Voir le projet
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="7" y1="17" x2="17" y2="7" />
                  <polyline points="7 7 17 7 17 17" />
                </svg>
              </a>
              <a href="https://github.com/Nathan94600/Prestalia" target="_blank" class="proj-btn proj-btn--ghost">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Projet Prestalia Lourd -->
        <div class="proj-card">
          <div class="proj-card-img">
            <img src="assets/images/prestaliadesktop.png" alt="Prestalia" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">02</span> -->
              <div class="proj-tags">
                <span class="proj-tag">C#</span>
                <span class="proj-tag">XAML</span>
                <span class="proj-tag">WinUI 3</span>
                <span class="proj-tag">SQLite</span>
              </div>
            </div>
            <h3 class="proj-card-titre">Prestalia (Client Lourd)</h3>
            <p class="proj-card-desc">
              Application desktop Windows permettant
              l’administration de la plateforme Prestalia, réalisée en C# dans le cadre du BTS SIO.
            </p>
            <div class="proj-card-infos">
              <div class="proj-info-item">
                <span class="proj-info-label">Contexte</span>
                <span class="proj-info-val">Projet E6 </span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Modalité</span>
                <span class="proj-info-val">Travail en équipe</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Back-end</span>
                <span class="proj-info-val">Node.js (API REST)</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Outils</span>
                <span class="proj-info-val">VS Code, Git, GitHub, Figma, Trello</span>
              </div>
            </div>
            <div class="proj-features">
              <span class="proj-feature">Gestion des comptes utilisateurs</span>
              <span class="proj-feature">Profils clients & prestataires</span>
              <span class="proj-feature">Système de réservation</span>
              <span class="proj-feature">API REST</span>
            </div>
            <div class="proj-card-links">
              <a href="#" target="_blank" class="proj-btn proj-btn--primary">
                Voir le projet
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="7" y1="17" x2="17" y2="7" />
                  <polyline points="7 7 17 7 17 17" />
                </svg>
              </a>
              <a href="https://github.com/Nathan94600/Prestalia" target="_blank" class="proj-btn proj-btn--ghost">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                GitHub
              </a>
            </div>
          </div>
        </div>

        <!-- Projet E-Learning -->
        <div class="proj-card proj-card--reverse">
          <div class="proj-card-img">
            <img src="assets/images/e-learning.png" alt="E-Learning" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">03</span> -->
              <div class="proj-tags">
                <span class="proj-tag">WordPress</span>
                <span class="proj-tag">CSS</span>
              </div>
            </div>
            <h3 class="proj-card-titre">Site E-Learning</h3>
            <p class="proj-card-desc">
              Site web de présentation d'une formation, réalisé avec WordPress et personnalisé en CSS.
              Projet de cours réalisé en équipe, incluant la présentation de l'équipe et de la formation.
            </p>
            <div class="proj-card-infos">
              <div class="proj-info-item">
                <span class="proj-info-label">Contexte</span>
                <span class="proj-info-val">Projet scolaire BTS SIO</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Modalité</span>
                <span class="proj-info-val">Travail en équipe</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">CMS</span>
                <span class="proj-info-val">WordPress + personnalisation CSS</span>
              </div>
            </div>
            <div class="proj-features">
              <span class="proj-feature">Présentation de l'équipe</span>
              <span class="proj-feature">Présentation de la formation</span>
              <span class="proj-feature">Design personnalisé</span>
            </div>
            <div class="proj-card-links">
              <a href="assets/docs/Documentation_e-E-learning.pdf" target="_blank" class="proj-btn proj-btn--primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                </svg>
                Documentation
              </a>
              <a href="#" target="_blank" class="proj-btn proj-btn--ghost">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                GitHub
              </a>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ══ SECTION PERSO (cachée par défaut) ══ -->
    <section class="proj-section proj-section--alt" id="section-perso">
      <div class="container">

        <div class="proj-section-header">
          <div class="proj-section-header-left">
            <!-- <span class="proj-section-num">02</span> -->
            <div>
              <h2 class="proj-section-titre">Projets personnels</h2>
              <p class="proj-section-sous">Initiatives personnelles — développement & créativité</p>
            </div>
          </div>

        </div>

        <!-- Civilipédia -->
        <div class="proj-card">
          <div class="proj-card-img">
            <img src="assets/images/Civilipedia.PNG" alt="Civilipédia" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">03</span> -->
              <div class="proj-tags">
                <span class="proj-tag">PHP</span>
                <span class="proj-tag">HTML</span>
                <span class="proj-tag">CSS</span>
                <span class="proj-tag">MySQL</span>


              </div>
            </div>
            <h3 class="proj-card-titre">Civilipédia</h3>
            <p class="proj-card-desc">
              L'objectif de ce projet était de concevoir et de développer un wiki
              collaboratif sur le thème des civilisations. Il permettra à différents types d'utilisateurs d'interagir avec le contenu, de créer,
              modifier et consulter des articles de manière intuitive et accessible.
            </p>
            <div class="proj-card-infos">
              <div class="proj-info-item">
                <span class="proj-info-label">Contexte</span>
                <span class="proj-info-val">Projet personnel </span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Technologies</span>
                <span class="proj-info-val">PHP, HTML, CSS, MySQL</span>
              </div>
            </div>
            <div class="proj-features">
              <span class="proj-feature">Inscription et connexion</span>
              <span class="proj-feature">Gestion des utilisateurs</span>
              <span class="proj-feature">Responsive design</span>
            </div>
            <div class="proj-card-links">
              <a href="https://civilipedia.kelly-akpo.fr" target="_blank" class="proj-btn proj-btn--primary">
                Voir le projet
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <line x1="7" y1="17" x2="17" y2="7" />
                  <polyline points="7 7 17 7 17 17" />
                </svg>
              </a>
              <a href="https://github.com/JessyFra/SIOP1_Wiki" target="_blank" class="proj-btn proj-btn--ghost">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                GitHub
              </a>
              <div class="proj-card-links">
                <a href="assets/docs/Documentation_Officielle_Wiki.pdf" target="_blank" class="proj-btn proj-btn--primary">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="16" y1="13" x2="8" y2="13" />
                    <line x1="16" y1="17" x2="8" y2="17" />
                  </svg>
                  Documentation
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- My Event Mate -->
        <div class="proj-card proj-card--reverse">
          <div class="proj-card-img">
            <img src="assets/images/myeventmate.png" alt="My Event Mate" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">04</span> -->
              <div class="proj-tags">
                <span class="proj-tag">Nuxt.js </span>
                <span class="proj-tag">Laravel </span>
                <span class="proj-tag">MySQL </span>
                <span class="proj-tag">PhpMyAdmin </span>

              </div>
            </div>
            <h3 class="proj-card-titre">My Event Mate</h3>
            <p class="proj-card-desc">
              Conception d'une plateforme web novatrice permettant de promouvoir des événements et de digitaliser les
              participants. Son objectif principal est de fournir une solution numérique complète et engageante
              tant pour les organisateurs d'événements que pour les participants.
            </p>
            <div class="proj-card-infos">
              <div class="proj-info-item">
                <span class="proj-info-label">Contexte</span>
                <span class="proj-info-val">Projet personnel</span>
              </div>
              <div class="proj-info-item">
                <span class="proj-info-label">Technologies</span>
                <span class="proj-info-val">Nuxt.js, Laravel, MySQL, PhpMyAdmin</span>
              </div>
            </div>
            <div class="proj-features">
              <span class="proj-feature">Création de compte </span>
              <span class="proj-feature">Automatisation de la génération de ticket</span>
              <span class="proj-feature">Gestion des événements</span>
            </div>
            <div class="proj-card-links">
               <a href="assets/docs/Documentation_My_Event_Mate.pdf" target="_blank" class="proj-btn proj-btn--primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                </svg>
                Documentation
              </a>
              
              <a href="https://github.com/KellyFemi/MyEventMate" target="_blank" class="proj-btn proj-btn--ghost">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                </svg>
                GitHub
              </a>
            </div>
          </div>
        </div>

        <div class="proj-card">
          <div class="proj-card-img">
            <img src="assets/images/glpi.png" alt="GLPI" onerror="this.parentElement.classList.add('proj-card-img--empty')">
            <div class="proj-card-img-placeholder">
              <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
            </div>
          </div>
          <div class="proj-card-body">
            <div class="proj-card-top">
              <!-- <span class="proj-card-num">05</span> -->
              <div class="proj-tags">
                <span class="proj-tag">GLPI</span>
                <span class="proj-tag">Linux</span>
                <span class="proj-tag">Apache</span>
                <span class="proj-tag">MariaDB</span>
              </div>
            </div>
            <h3 class="proj-card-titre">GLPI — Gestion de parc informatique</h3>
            <p class="proj-card-desc">
              Prise en main de GLPI (Gestion Libre de Parc Informatique), solution open source de gestion du parc informatique.
              Installation complète sur VM, configuration du virtual host, inventaire des machines via l'agent GLPI et
              découverte des modules (tickets, parc, administration).
            </p>
            <div class="proj-card-infos">
              
              <div class="proj-info-item">
                <span class="proj-info-label">Environnement</span>
                <span class="proj-info-val">VM Debian, Windows</span>
              </div>

            </div>
            <div class="proj-features">
              <span class="proj-feature">Installation serveur Linux</span>
              <span class="proj-feature">Inventaire du parc</span>
              <span class="proj-feature">Gestion des tickets</span>
            </div>
            <div class="proj-card-links">
              <a href="assets/docs/glpi_documentation.pdf" target="_blank" class="proj-btn proj-btn--primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                  <polyline points="14 2 14 8 20 8" />
                  <line x1="16" y1="13" x2="8" y2="13" />
                  <line x1="16" y1="17" x2="8" y2="17" />
                </svg>
                Documentation
              </a>
            </div>
          </div>
        </div>



      </div>
    </section>
    <?php include('includes/footer.php'); ?>
  </main>

  <?php include('includes/back-to-top.php'); ?>
  <style>
    :root {
      --acc: #c32257;
      --acc-glow: rgba(195, 34, 87, 0.2);
      --acc-dim: rgba(195, 34, 87, 0.08);
      --bg: #000;
      --bg1: #080808;
      --bg2: #0d0d0d;
      --bg3: #111;
      --border: rgba(255, 255, 255, 0.06);
      --muted: #555;
      --dim: #888;
      --mono: 'Courier New', monospace;
    }

    .proj-main {
      background: var(--bg);
      min-height: 100vh;
    }

    /* ── HERO ── */
    .proj-hero {
      position: relative;
      padding: 110px 0 80px;
      overflow: hidden;
      border-bottom: 1px solid var(--border);
    }

    .proj-hero-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(195, 34, 87, 0.035) 1px, transparent 1px),
        linear-gradient(90deg, rgba(195, 34, 87, 0.035) 1px, transparent 1px);
      background-size: 56px 56px;
      mask-image: radial-gradient(ellipse 70% 80% at 70% 50%, #000 30%, transparent 100%);
    }

    .proj-hero-inner {
      max-width: 100%;
      position: relative;
      z-index: 1;
    }

    .proj-label {
      font-family: var(--mono);
      font-size: 0.7rem;
      color: var(--acc);
      letter-spacing: 0.18em;
      text-transform: uppercase;
      display: block;
      margin-bottom: 18px;
    }

    .proj-hero-title {
      font-size: clamp(2.8rem, 7vw, 5.5rem);
      font-weight: 900;
      color: #fff;
      letter-spacing: -0.04em;
      line-height: 1;
      margin-bottom: 28px;
    }

    .proj-hero-title .acc {
      color: var(--acc);
    }

    .proj-hero-desc {
      font-size: 0.96rem;
      color: var(--dim);
      line-height: 1.8;
      margin-bottom: 32px;
      max-width: 560px;
    }

    .proj-hero-nav-label {
      font-family: var(--mono);
      font-size: 0.72rem;
      color: white;
      ;
      letter-spacing: 0.06em;
      margin-bottom: 16px;
    }

    .proj-hero-links {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .proj-hero-link {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      font-size: 0.95rem;
      font-weight: 600;
      color: #fff;
      background: transparent;
      border: none;
      cursor: pointer;
      padding: 0;
      transition: color 0.2s;
    }

    .proj-hero-link:hover {
      color: var(--acc);
    }

    .proj-hero-link.is-open {
      color: var(--acc);
    }

    .phl-dot {
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: var(--acc);
      flex-shrink: 0;
      box-shadow: 0 0 8px var(--acc-glow);
      transition: transform 0.3s;
    }

    .proj-hero-link.is-open .phl-dot {
      transform: scale(1.4);
    }

    .phl-chevron {
      margin-left: 4px;
      transition: transform 0.3s;
      opacity: 0.5;
    }

    .proj-hero-link.is-open .phl-chevron {
      transform: rotate(180deg);
      opacity: 1;
    }

    /* ── SECTIONS ── */
    .proj-section {
      border-bottom: 1px solid var(--border);
    }

    .proj-section--alt {
      background: var(--bg1);
    }

    .proj-section.is-animating {
      animation: slideDown 0.35s cubic-bezier(0.22, 1, 0.36, 1) both;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-12px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideUp {
      from {
        opacity: 1;
        transform: translateY(0);
      }

      to {
        opacity: 0;
        transform: translateY(-12px);
      }
    }

    .proj-section-header {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 16px;
      margin-bottom: 48px;
    }

    .proj-section-header-left {
      display: flex;
      align-items: flex-start;
      gap: 20px;
    }

    .proj-section-num {
      font-family: var(--mono);
      font-size: 3rem;
      font-weight: 900;
      color: rgba(195, 34, 87, 0.12);
      line-height: 1;
      flex-shrink: 0;
    }

    .proj-section-titre {
      font-size: 1.5rem;
      font-weight: 800;
      color: #c32257;
      letter-spacing: -0.02em;
      margin-bottom: 4px;
    }

    .proj-section-sous {
      font-family: var(--mono);
      font-size: 0.72rem;
      color: white;
      ;
      letter-spacing: 0.05em;
    }

    .proj-section-close {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      flex-shrink: 0;
      background: transparent;
      border: 1px solid var(--border);
      border-radius: 2px;
      cursor: pointer;
      color: white;
      ;
      transition: all 0.2s;
    }

    .proj-section-close:hover {
      border-color: var(--acc);
      color: var(--acc);
    }

    /* ── CARD PROJET ── */
    .proj-card {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0;
      border: 1px solid var(--border);
      border-radius: 2px;
      overflow: hidden;
      margin-bottom: 24px;
      transition: border-color 0.3s;
    }

    .proj-card:hover {
      border-color: rgba(195, 34, 87, 0.25);
    }

    .proj-card--reverse {
      direction: rtl;
    }

    .proj-card--reverse>* {
      direction: ltr;
    }

    @media (max-width: 860px) {

      .proj-card,
      .proj-card--reverse {
        grid-template-columns: 1fr;
        direction: ltr;
      }
    }

    /* Image */
    .proj-card-img {
      position: relative;
      background: var(--bg2);
      min-height: 280px;
      overflow: hidden;
    }

    .proj-card-img img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      object-position: center;
      display: block;
      transition: transform 0.4s;
    }

    .proj-card:hover .proj-card-img img {
      transform: scale(1.03);
    }

    /* Placeholder si pas d'image */
    .proj-card-img-placeholder {
      position: absolute;
      inset: 0;
      display: none;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
      color: white;
      ;
      font-family: var(--mono);
      font-size: 0.72rem;
      letter-spacing: 0.06em;
    }

    .proj-card-img--empty img {
      display: none;
    }

    .proj-card-img--empty .proj-card-img-placeholder {
      display: flex;
    }

    /* Body */
    .proj-card-body {
      background: var(--bg2);
      padding: 32px;
      display: flex;
      flex-direction: column;
      gap: 16px;
      border-left: 1px solid var(--border);
    }

    .proj-card--reverse .proj-card-body {
      border-left: none;
      border-right: 1px solid var(--border);
    }

    @media (max-width: 860px) {

      .proj-card-body,
      .proj-card--reverse .proj-card-body {
        border: none;
        border-top: 1px solid var(--border);
      }
    }

    .proj-card-top {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: wrap;
    }

    .proj-card-num {
      font-family: var(--mono);
      font-size: 0.65rem;
      color: var(--acc);
      opacity: 0.6;
      letter-spacing: 0.12em;
    }

    .proj-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }

    .proj-tag {
      font-family: var(--mono);
      font-size: 0.62rem;
      color: var(--dim);
      border: 1px solid var(--border);
      padding: 3px 8px;
      border-radius: 2px;
      letter-spacing: 0.05em;
      transition: border-color 0.2s, color 0.2s;
    }

    .proj-card:hover .proj-tag {
      border-color: rgba(195, 34, 87, 0.25);
      color: #bbb;
    }

    .proj-card-titre {
      font-size: 1.4rem;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.02em;
      line-height: 1.2;
    }

    .proj-card-desc {
      font-size: 0.88rem;
      color: var(--dim);
      line-height: 1.75;
    }

    /* Infos */
    .proj-card-infos {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .proj-info-item {
      display: flex;
      gap: 10px;
      align-items: baseline;
    }

    .proj-info-label {
      font-family: var(--mono);
      font-size: 0.65rem;
      color: var(--acc);
      letter-spacing: 0.08em;
      text-transform: uppercase;
      flex-shrink: 0;
      min-width: 80px;
    }

    .proj-info-val {
      font-size: 0.82rem;
      color: var(--dim);
    }

    /* Features */
    .proj-features {
      display: flex;
      flex-wrap: wrap;
      gap: 6px;
    }

    .proj-feature {
      font-size: 0.75rem;
      color: var(--dim);
      padding: 4px 10px;
      border-radius: 2px;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--border);
    }

    .proj-feature::before {
      content: '▸ ';
      color: var(--acc);
      font-size: 0.6rem;
    }

    /* Boutons */
    .proj-card-links {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: auto;
      padding-top: 4px;
    }

    .proj-btn {
      display: inline-flex;
      align-items: center;
      gap: 7px;
      font-family: var(--mono);
      font-size: 0.72rem;
      letter-spacing: 0.06em;
      padding: 9px 16px;
      border-radius: 2px;
      text-decoration: none;
      transition: all 0.2s;
      border: 1px solid transparent;
      cursor: pointer;
    }

    .proj-btn--primary {
      background: var(--acc);
      color: #fff;
      border-color: var(--acc);
    }

    .proj-btn--primary:hover {
      background: transparent;
      color: var(--acc);
    }

    .proj-btn--ghost {
      background: transparent;
      color: var(--dim);
      border-color: var(--border);
    }

    .proj-btn--ghost:hover {
      border-color: var(--acc);
      color: var(--acc);
    }

    @media (max-width: 576px) {
      .proj-hero {
        padding: 80px 0 60px;
      }

      .proj-section {
        padding: 50px 0;
      }

      .proj-card-body {
        padding: 20px;
      }

      .proj-section-header {
        flex-direction: column;
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>