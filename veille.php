<?php
// ── Toute la logique AVANT le header ─────────────────────────
$pageTitle = "Veille Technologique — CI/CD & DevOps";

include('includes/rss_fetcher.php');

$data     = get_veille_articles();
$recents  = $data['recents'];
$archives = $data['archives'];
$total    = $data['total'];
$maj      = $data['derniere_maj'];

// ── Articles manuels par thème (4 par bloc) ───────────────────
$articles_cicd = [
    [
        'titre'  => 'L\'approche CI/CD, qu\'est-ce que c\'est ?',
        'date'   => '15/05/2024',
        'source' => 'Red Hat',
        'lien'   => 'https://www.redhat.com/en/topics/devops/what-is-ci-cd',
        'resume' => 'La référence sur le sujet. Red Hat explique en détail les concepts d\'intégration continue, de livraison continue et de déploiement continu, ainsi que leur place dans une approche DevOps.',
    ],
    [
        'titre'  => 'Intégration continue et déploiement continu (CI/CD) dans DevOps',
        'date'   => '30/05/2024',
        'source' => 'QRP International',
        'lien'   => 'https://www.qrpinternational.fr/blog/gestion-des-services-informatiques/integration-continue-et-deploiement-continu-ci-cd-dans-devops/',
        'resume' => 'Article en français qui explique simplement les deux concepts : l\'intégration continue teste automatiquement les modifications de code, et le déploiement continu les publie automatiquement.',
    ],
    [
        'titre'  => 'Mettre en place une CI GitHub Actions',
        'date'   => '18/09/2024',
        'source' => 'Apprendre-la-programmation.net',
        'lien'   => 'https://apprendre-la-programmation.net/configurer-ci-github-actions/',
        'resume' => 'Tutoriel pas à pas en français pour configurer une intégration continue avec GitHub Actions. L\'article couvre la création d\'un fichier YAML, le lancement des tests et l\'analyse du coverage.',
    ],
    [
        'titre'  => 'Comment utiliser les GitHub Actions',
        'date'   => '16/06/2025',
        'source' => 'Docstring.fr',
        'lien'   => 'https://www.docstring.fr/blog/comment-utiliser-les-github-actions/',
        'resume' => 'Guide concret basé sur un projet Python/Django. L\'article montre comment configurer un workflow GitHub Actions, gérer les secrets et automatiser les tests à chaque push.',
    ],
];

$articles_devops = [
    [
        'titre'  => 'Intégration continue, livraison continue et déploiement continu',
        'date'   => '12/03/2024',
        'source' => 'Atlassian',
        'lien'   => 'https://www.atlassian.com/fr/continuous-delivery/principles/continuous-integration-vs-delivery-vs-deployment',
        'resume' => 'Atlassian démêle les trois concepts souvent confondus : CI, livraison continue et déploiement continu. L\'article explique leurs différences, leurs avantages et comment les combiner efficacement.',
    ],
    [
        'titre'  => 'Les cinq meilleurs outils CI/CD dont chaque DevOps a besoin',
        'date'   => '27/01/2026',
        'source' => 'Atlassian',
        'lien'   => 'https://www.atlassian.com/fr/devops/devops-tools/cicd-tools',
        'resume' => 'Tour d\'horizon des principaux outils CI/CD du marché (Bitbucket Pipelines, Bamboo, Jenkins...). L\'article explique leurs forces, leurs cas d\'usage et comment choisir selon la taille du projet.',
    ],
    [
        'titre'  => 'CI/CD : intégration et déploiement continu décryptés',
        'date'   => '09/04/2025',
        'source' => 'Ewolve',
        'lien'   => 'https://ewolve.fr/blog/ci-cd-integration-deploiement-continu',
        'resume' => 'Article récent qui explique comment le CI/CD permet d\'automatiser les tests, les builds et les déploiements pour améliorer la qualité logicielle et accélérer les livraisons.',
    ],
    [
        'titre'  => 'GitHub Actions : construire, tester et déployer sans effort',
        'date'   => '16/02/2023',
        'source' => 'Les Enovateurs',
        'lien'   => 'https://les-enovateurs.com/github-actions-construire-tester-et-deployer-sans-effort-ci-cd',
        'resume' => 'Vue d\'ensemble accessible de GitHub Actions : workflows YAML, runners Linux/Windows/macOS, marketplace d\'actions. Un bon point de départ pour comprendre le CI/CD appliqué à un projet réel.',
    ],
];
function render_manual_card(array $article, int $index): string
{
    $titre  = htmlspecialchars($article['titre']);
    $date   = htmlspecialchars($article['date']);
    $source = htmlspecialchars($article['source']);
    $lien   = htmlspecialchars($article['lien']);
    $resume = htmlspecialchars($article['resume']);
    $num    = sprintf('%02d', $index + 1);

    return <<<HTML
    <article class="manuel-card">
      <div class="manuel-card-num">{$num}</div>
      <div class="manuel-card-body">
        <div class="manuel-card-meta">
          <span class="mc-date">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            {$date}
          </span>
          <span class="mc-source">{$source}</span>
        </div>
        <h3 class="manuel-card-titre">{$titre}</h3>
        <p class="manuel-card-resume">{$resume}</p>
        <a href="{$lien}" target="_blank" rel="noopener" class="mc-link">
          Lire l'article
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/>
          </svg>
        </a>
      </div>
    </article>
    HTML;
}

function render_rss_card(array $article, bool $archive = false): string
{
    $tag_labels = ['ci' => 'Intégration Continue', 'cd' => 'Déploiement Continu', 'tools' => 'Outils', 'cloud' => 'Cloud'];
    $tag        = htmlspecialchars($article['tag'] ?? 'tools');
    $tag_label  = $tag_labels[$article['tag']] ?? 'Outils';
    $titre      = htmlspecialchars($article['titre'] ?? '');
    $resume     = htmlspecialchars($article['resume'] ?? '');
    $date       = htmlspecialchars($article['date'] ?? '');
    $source     = htmlspecialchars($article['source'] ?? '');
    $lien       = htmlspecialchars($article['lien'] ?? '#');
    $cls        = $archive ? ' rss-card--archive' : '';

    return <<<HTML
    <article class="rss-card{$cls}" data-category="{$tag}">
      <div class="rss-card-inner">
        <div class="rss-card-top">
          <div class="rss-meta">
            <span class="rss-date">
              <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
              {$date}
            </span>
            <span class="rss-source">{$source}</span>
          </div>
          <span class="rss-badge {$tag}">{$tag_label}</span>
        </div>
        <h3 class="rss-titre">{$titre}</h3>
        <p class="rss-resume">{$resume}</p>
        <a href="{$lien}" target="_blank" rel="noopener" class="mc-link">
          Lire l'article
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/>
          </svg>
        </a>
      </div>
    </article>
    HTML;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTS_SIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>

</head>

<body>
    <?php include('includes/header.php'); ?>

    <main class="veille-main">

        <!-- ══ HERO ══ -->
        <section class="v-hero">
            <div class="v-hero-grid"></div>
            <div class="container">
                <div class="v-hero-inner">
                    <h1 class="v-hero-title">CI/CD <span class="acc">&</span> DevOps</h1>
                    <p class="v-hero-desc">
                        Sur cette page, vous trouverez des articles sélectionnés autour des deux thèmes que j'ai choisi d'explorer :
                        <strong>l'Intégration Continue (CI)</strong> et le <strong>Déploiement Continu (CD / DevOps)</strong>.
                        <br><br>
                        Cette veille est régulièrement mise à jour afin de vous proposer les informations et actualités les plus
                        pertinentes sur ces sujets. Le flux RSS en bas de page est actualisé automatiquement.

                    </p>
                    <div>
                        <p>
                            - L' <span class="tittle">Intégration Continue (CI)</span> est une pratique qui consiste à fusionner régulièrement
                            les modifications de code dans un dépôt partagé. Chaque fusion déclenche automatiquement
                            des tests et une compilation, permettant de détecter les erreurs rapidement.
                        </p>
                        <p>
                            - Le <span class="tittle">Déploiement Continu (CD)</span> est une extension de la CI qui automatise le déploiement
                            des applications en production. Il permet de livrer rapidement les nouvelles fonctionnalités
                            aux utilisateurs tout en assurant la stabilité du système.</p>
                        <p>
                            - Le <span class="tittle">DevOps</span> est une culture qui rapproche les équipes de développement (Dev) et
                            d'exploitation (Ops). L'objectif est de livrer des logiciels plus rapidement,
                            de manière fiable, grâce à l'automatisation et la collaboration.
                        </p>
                        <p >
                            - Le <span class="tittle">Cloud</span>  permet d'accéder à des ressources informatiques (serveurs, stockage,
                            bases de données) à la demande via Internet. Il est au cœur des pratiques DevOps
                            modernes grâce à son élasticité et sa scalabilité.
                        </p>
                    </div>

                    <div class="v-hero-links">
                        <button class="v-hero-link" onclick="toggleBloc('bloc-cicd', this)">
                            <span class="vhl-dot"></span>
                            Intégration Continue (CI/CD)
                            <svg class="vhl-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                        <button class="v-hero-link" onclick="toggleBloc('bloc-devops', this)">
                            <span class="vhl-dot"></span>
                            Cloud & DevOps
                            <svg class="vhl-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- ══ BLOC 1 — CI/CD (caché par défaut) ══ -->
        <section class="v-bloc v-bloc--collapsible" id="bloc-cicd" style="display:none;">
            <div class="container">
                <div class="v-bloc-header">
                    <div class="v-bloc-header-left">
                        <span class="v-bloc-num">01</span>
                        <div>
                            <h2 class="v-bloc-titre">Intégration Continue — CI/CD</h2>
                            <p class="v-bloc-sous">Pipelines, automatisation, tests et déploiement</p>
                        </div>
                    </div>
                    <div class="v-bloc-header-right">
                        <span class="v-bloc-count">4 articles sélectionnés</span>
                        <button class="v-bloc-close" onclick="toggleBloc('bloc-cicd')" title="Fermer">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="v-articles-grid">
                    <?php foreach ($articles_cicd as $i => $article): ?>
                        <?= render_manual_card($article, $i) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ══ BLOC 2 — DevOps / Cloud (caché par défaut) ══ -->
        <section class="v-bloc v-bloc--alt v-bloc--collapsible" id="bloc-devops" style="display:none;">
            <div class="container">
                <div class="v-bloc-header">
                    <div class="v-bloc-header-left">
                        <span class="v-bloc-num">02</span>
                        <div>
                            <h2 class="v-bloc-titre">Cloud & DevOps</h2>
                            <p class="v-bloc-sous">Déploiement, infrastructure, orchestration</p>
                        </div>
                    </div>
                    <div class="v-bloc-header-right">
                        <span class="v-bloc-count">4 articles sélectionnés</span>
                        <button class="v-bloc-close" onclick="toggleBloc('bloc-devops')" title="Fermer">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="v-articles-grid">
                    <?php foreach ($articles_devops as $i => $article): ?>
                        <?= render_manual_card($article, $i) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- ══ FLUX RSS EN DIRECT ══ -->
        <section class="v-rss-section">
            <div class="container">
                <div class="v-section-header">
                    <div>
                        <h2 class="v-section-titre">Articles — flux en direct</h2>
                    </div>
                    <div class="v-rss-stats">
                        <div class="rss-stat">
                            <span class="rss-stat-num"><?= count($archives) ?></span>
                            <span class="rss-stat-label">en archive</span>
                        </div>
                        <div class="rss-stat-div"></div>
                        <div class="rss-stat">
                            <span class="rss-stat-num"><?= count($recents) ?></span>
                            <span class="rss-stat-label">nouveaux</span>
                        </div>
                        <div class="rss-stat-div"></div>
                        <div class="rss-stat rss-maj">
                            <span class="rss-maj-label">Mise à jour :</span>
                            <span class="rss-maj-val"><?= htmlspecialchars($maj) ?></span>
                        </div>
                    </div>
                </div>

                <div class="v-rss-filters">
                    <button class="vf-btn active" data-filter="all">Tous</button>
                    <button class="vf-btn" data-filter="ci">Intégration Continue</button>
                    <button class="vf-btn" data-filter="cd">Déploiement Continu</button>
                    <button class="vf-btn" data-filter="tools">Outils</button>
                    <button class="vf-btn" data-filter="cloud">Cloud</button>
                </div>

                <?php if (empty($recents)): ?>
                    <div class="v-rss-empty">
                        <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M4 11a9 9 0 0 1 9 9" />
                            <path d="M4 4a16 16 0 0 1 16 16" />
                            <circle cx="5" cy="19" r="1" />
                        </svg>
                        <p>Flux RSS en cours de configuration —<br>les articles apparaîtront ici automatiquement.</p>
                    </div>
                <?php else: ?>
                    <div class="v-rss-grid" id="rss-container">
                        <?php foreach ($recents as $article): ?>
                            <?= render_rss_card($article) ?>
                        <?php endforeach; ?>
                    </div>
                    <?php if (!empty($archives)): ?>
                        <div class="v-archives-bar">
                            <button class="v-archives-btn" id="archivesToggle" onclick="toggleArchives()">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="21 15 21 21 3 21 3 15" />
                                    <polyline points="7 10 12 15 17 10" />
                                    <line x1="12" y1="15" x2="12" y2="3" />
                                </svg>
                                Afficher les <?= count($archives) ?> articles archivés
                            </button>
                        </div>
                        <div id="archivesContainer" style="display:none;">
                            <div class="v-rss-grid v-rss-grid--archives">
                                <?php foreach ($archives as $article): ?>
                                    <?= render_rss_card($article, true) ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </section>

       <!-- ══ OUTILS DE VEILLE ══ -->
<section class="v-outils-section">
    <div class="container">
        <div class="v-section-header">
            <div>
                <h2 class="v-section-titre">Outils de veille</h2>
            </div>
        </div>
        <div class="v-outils-grid">

            <div class="v-outil-card">
                <div class="v-outil-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                </div>
                <h3 class="v-outil-titre">Google Alertes</h3>
                <p class="v-outil-desc">Alertes configurées sur les mots-clés "CI/CD", "intégration continue", "GitHub Actions" et "DevOps" pour recevoir les nouvelles publications directement par e-mail.</p>
            </div>

            <div class="v-outil-card">
                <div class="v-outil-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 11a9 9 0 0 1 9 9"/><path d="M4 4a16 16 0 0 1 16 16"/><circle cx="5" cy="19" r="1"/>
                    </svg>
                </div>
                <h3 class="v-outil-titre">Flux RSS automatisés</h3>
                <p class="v-outil-desc">Agrégation automatique des flux RSS de Dev.to, GitHub Blog et Docker Blog via un script PHP avec mise en cache toutes les heures.</p>
            </div>

            <div class="v-outil-card">
                <div class="v-outil-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                </div>
                <h3 class="v-outil-titre">Sites spécialisés</h3>
                <p class="v-outil-desc">Lecture régulière de Red Hat, Atlassian, Ewolve et QRP International pour leurs articles de fond sur le CI/CD et le DevOps, disponibles en français.</p>
            </div>

            <div class="v-outil-card">
                <div class="v-outil-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                </div>
                <h3 class="v-outil-titre">Blogs & tutoriels dev</h3>
                <p class="v-outil-desc">Docstring.fr, Apprendre-la-programmation.net et Les Enovateurs pour des tutoriels pratiques en français avec des exemples de code concrets.</p>
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

        .veille-main {
            background: var(--bg);
            min-height: 100vh;
        }

        /* ── HERO ── */
        .v-hero {
            position: relative;
            padding: 110px 0 80px;
            overflow: hidden;
            border-bottom: 1px solid var(--border);
        }

        .v-hero-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(195, 34, 87, 0.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(195, 34, 87, 0.035) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(ellipse 70% 80% at 30% 50%, #000 30%, transparent 100%);
        }

        .v-hero-inner {
            position: relative;
            z-index: 1;
        }

        .v-label {
            font-family: var(--mono);
            font-size: 0.7rem;
            color: var(--acc);
            letter-spacing: 0.18em;
            text-transform: uppercase;
            display: block;
            margin-bottom: 18px;
        }

        .v-hero-title {
            font-size: clamp(2.8rem, 7vw, 5.5rem);
            font-weight: 900;
            color: #fff;
            letter-spacing: -0.04em;
            line-height: 1;
            margin-bottom: 28px;
        }

        .v-hero-title .acc {
            color: var(--acc);
        }

        .v-hero-desc {
            font-size: 0.96rem;
            color: white;
            line-height: 1.8;
            margin-bottom: 32px;
            max-width: 580px;
        }

        .v-hero-desc strong {
            color: #bbb;
            font-weight: 600;
        }

        .v-hero-nav-label {
            font-family: var(--mono);
            font-size: 0.72rem;
            color: white;
            letter-spacing: 0.06em;
            margin-bottom: 16px;
        }

        .v-hero-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        /* Boutons hero — remplacent les <a> */
        .v-hero-link {
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
            text-align: left;
            transition: color 0.2s;
        }

        .v-hero-link:hover {
            color: var(--acc);
        }

        .v-hero-link.is-open {
            color: var(--acc);
        }

        .vhl-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--acc);
            flex-shrink: 0;
            box-shadow: 0 0 8px var(--acc-glow);
            transition: transform 0.3s;
        }

        .v-hero-link.is-open .vhl-dot {
            transform: scale(1.4);
        }

        .vhl-chevron {
            margin-left: auto;
            transition: transform 0.3s;
            opacity: 0.5;
        }

        .v-hero-link.is-open .vhl-chevron {
            transform: rotate(180deg);
            opacity: 1;
        }

        /* ── BLOCS ARTICLES ── */
        .v-bloc {
            padding: 60px 0;
            border-bottom: 1px solid var(--border);
            /* Animation d'ouverture */
            overflow: hidden;
        }

        .v-bloc--alt {
            background: var(--bg1);
        }

        /* Animation slide-down */
        .v-bloc--collapsible {
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

        .v-bloc-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 36px;
            flex-wrap: wrap;
        }

        .v-bloc-header-left {
            display: flex;
            align-items: flex-start;
            gap: 20px;
        }

        .v-bloc-header-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .v-bloc-num {
            font-family: var(--mono);
            font-size: 3rem;
            font-weight: 900;
            color: rgba(195, 34, 87, 0.12);
            line-height: 1;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .v-bloc-titre {
            font-size: 1.5rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.02em;
            margin-bottom: 4px;
        }

        .v-bloc-sous {
            font-family: var(--mono);
            font-size: 0.72rem;
            color: white;
            letter-spacing: 0.05em;
        }

        .v-bloc-count {
            font-family: var(--mono);
            font-size: 0.68rem;
            color: var(--acc);
            border: 1px solid rgba(195, 34, 87, 0.25);
            padding: 5px 12px;
            border-radius: 2px;
            letter-spacing: 0.08em;
            white-space: nowrap;
        }

        .v-bloc-close {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: transparent;
            border: 1px solid var(--border);
            border-radius: 2px;
            cursor: pointer;
            color: white;
            transition: all 0.2s;
            flex-shrink: 0;
        }

        .v-bloc-close:hover {
            border-color: var(--acc);
            color: var(--acc);
        }

        /* Grille 2×2 */
        .v-articles-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }
        .tittle{
            color:#c32257;
            font-weight:bold;
        }

        @media (max-width: 700px) {
            .v-articles-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Card article manuel */
        .manuel-card {
            display: flex;
            background: var(--bg2);
            border: 1px solid var(--border);
            border-radius: 2px;
            overflow: hidden;
            transition: border-color 0.25s, transform 0.25s;
        }

        .manuel-card:hover {
            border-color: rgba(195, 34, 87, 0.3);
            transform: translateY(-3px);
        }

        .manuel-card-num {
            width: 44px;
            flex-shrink: 0;
            background: var(--acc-dim);
            border-right: 1px solid var(--border);
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 18px;
            font-family: var(--mono);
            font-size: 0.62rem;
            color: var(--acc);
            opacity: 0.7;
            letter-spacing: 0.06em;
        }

        .manuel-card-body {
            padding: 18px 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .manuel-card-meta {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .mc-date,
        .mc-source {
            display: flex;
            align-items: center;
            gap: 5px;
            font-family: var(--mono);
            font-size: 0.68rem;
            color: white;
        }

        .mc-date svg {
            color: var(--acc);
            opacity: 0.6;
        }

        .manuel-card-titre {
            font-size: 0.95rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.35;
            letter-spacing: -0.01em;
        }

        .manuel-card-resume {
            font-size: 0.82rem;
            color: white;
            line-height: 1.65;
            flex: 1;
        }

        .mc-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-top: 4px;
            font-family: var(--mono);
            font-size: 0.72rem;
            color: var(--acc);
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: gap 0.2s;
        }

        .mc-link:hover {
            gap: 8px;
        }

        /* ── SECTION RSS ── */
        .v-rss-section {
            border-bottom: 1px solid var(--border);
            background: var(--bg1);
        }

        .v-section-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .v-section-titre {
            font-size: 1.6rem;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.02em;
            margin-top: 8px;
        }

        .v-rss-stats {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .rss-stat {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .rss-stat-num {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--acc);
            line-height: 1;
        }

        .rss-stat-label {
            font-family: var(--mono);
            font-size: 0.6rem;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .rss-stat-div {
            width: 1px;
            height: 32px;
            background: var(--border);
        }

        .rss-maj {
            flex-direction: row;
            gap: 6px;
            align-items: center;
        }

        .rss-maj-label,
        .rss-maj-val {
            font-family: var(--mono);
            font-size: 0.68rem;
            color: white;
        }

        .rss-maj-val {
            color: white;
        }

        .v-rss-filters {
            display: flex;
            gap: 8px;
            margin-bottom: 28px;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .v-rss-filters::-webkit-scrollbar {
            display: none;
        }

        .vf-btn {
            padding: 7px 16px;
            border-radius: 2px;
            border: 1px solid var(--border);
            background: transparent;
            color: white;
            font-size: 0.75rem;
            font-family: var(--mono);
            cursor: pointer;
            transition: all 0.2s;
            white-space: nowrap;
            letter-spacing: 0.05em;
        }

        .vf-btn:hover {
            border-color: var(--acc);
            color: var(--acc);
        }

        .vf-btn.active {
            background: var(--acc);
            border-color: var(--acc);
            color: #fff;
        }

        .v-rss-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (max-width: 700px) {
            .v-rss-grid {
                grid-template-columns: 1fr;
            }
        }

        .v-rss-grid--archives {
            margin-top: 12px;
            opacity: 0.7;
        }

        .rss-card {
            transition: opacity 0.3s;
        }

        .rss-card.hidden {
            display: none;
        }

        .rss-card-inner {
            background: var(--bg2);
            border: 1px solid var(--border);
            border-left: 3px solid transparent;
            padding: 18px 22px;
            border-radius: 2px;
            transition: all 0.22s;
            height: 100%;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .rss-card:hover .rss-card-inner {
            border-left-color: var(--acc);
            background: var(--bg3);
            transform: translateX(3px);
        }

        .rss-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            flex-wrap: wrap;
        }

        .rss-meta {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .rss-date,
        .rss-source {
            display: flex;
            align-items: center;
            gap: 4px;
            font-family: var(--mono);
            font-size: 0.67rem;
            color: white;
        }

        .rss-date svg {
            color: var(--acc);
            opacity: 0.6;
        }

        .rss-badge {
            font-family: var(--mono);
            font-size: 0.58rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding: 2px 8px;
            border-radius: 2px;
            font-weight: 600;
            flex-shrink: 0;
        }

        .rss-badge.ci {
            background: rgba(195, 34, 87, 0.12);
            color: #e05585;
            border: 1px solid rgba(195, 34, 87, 0.25);
        }

        .rss-badge.cd {
            background: rgba(87, 34, 195, 0.12);
            color: #9b6ee0;
            border: 1px solid rgba(87, 34, 195, 0.25);
        }

        .rss-badge.tools {
            background: rgba(34, 150, 195, 0.12);
            color: #5ab4d6;
            border: 1px solid rgba(34, 150, 195, 0.25);
        }

        .rss-badge.cloud {
            background: rgba(34, 195, 120, 0.12);
            color: #4dd49a;
            border: 1px solid rgba(34, 195, 120, 0.25);
        }

        .rss-titre {
            font-size: 0.92rem;
            font-weight: 700;
            color: #e0447a;
            line-height: 1.35;
        }

        .rss-resume {
            font-size: 0.8rem;
            color: white;
            line-height: 1.65;
            flex: 1;
        }

        .rss-card--archive .rss-titre {
            font-size: 0.87rem;
        }

        .rss-card--archive .rss-resume {
            display: none;
        }

        .v-archives-bar {
            text-align: center;
            margin: 24px 0 0;
        }

        .v-archives-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--mono);
            font-size: 0.72rem;
            color: var(--dim);
            background: transparent;
            border: 1px solid var(--border);
            padding: 9px 20px;
            border-radius: 2px;
            cursor: pointer;
            transition: all 0.2s;
            letter-spacing: 0.06em;
        }

        .v-archives-btn:hover {
            border-color: var(--acc);
            color: var(--acc);
        }

        .v-rss-empty {
            text-align: center;
            padding: 60px 20px;
            border: 1px dashed rgba(255, 255, 255, 0.07);
            border-radius: 2px;
            color: white;
        }

        .v-rss-empty svg {
            margin: 0 auto 16px;
            display: block;
            opacity: 0.3;
        }

        .v-rss-empty p {
            font-size: 0.88rem;
            line-height: 1.7;
        }

        /* ── OUTILS ── */
        .v-outils-section {
            padding: 70px 0 100px;
        }

        .v-outils-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        @media (max-width: 900px) {
            .v-outils-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 560px) {
            .v-outils-grid {
                grid-template-columns: 1fr;
            }
        }

        .v-outil-card {
            background: var(--bg2);
            border: 1px solid var(--border);
            padding: 24px 20px;
            border-radius: 2px;
            transition: border-color 0.2s, transform 0.2s;
        }

        .v-outil-card:hover {
            border-color: rgba(195, 34, 87, 0.25);
            transform: translateY(-3px);
        }

        .v-outil-icon {
            color: var(--acc);
            margin-bottom: 16px;
            opacity: 0.85;
        }

        .v-outil-titre {
            font-size: 0.95rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .v-outil-desc {
            font-size: 0.8rem;
            color: white;
            line-height: 1.65;
        }

        @media (max-width: 576px) {
            .v-hero {
                padding: 80px 0 60px;
            }

            .v-bloc {
                padding: 50px 0;
            }

            .v-bloc-header,
            .v-section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .v-rss-stats {
                gap: 12px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ── Toggle bloc articles ──────────────────────────────────────
        function toggleBloc(id, btn) {
            const bloc = document.getElementById(id);
            const isOpen = bloc.style.display !== 'none';

            // Trouver le bouton correspondant si appelé depuis le X
            if (!btn) {
                btn = document.querySelector(`[onclick="toggleBloc('${id}', this)"]`);
            }

            if (isOpen) {
                // Fermer avec animation
                bloc.style.animation = 'slideUp 0.25s ease both';
                bloc.addEventListener('animationend', () => {
                    bloc.style.display = 'none';
                    bloc.style.animation = '';
                }, {
                    once: true
                });
                if (btn) btn.classList.remove('is-open');
            } else {
                // Ouvrir avec animation
                bloc.style.display = 'block';
                bloc.style.animation = 'slideDown 0.35s cubic-bezier(0.22, 1, 0.36, 1) both';
                if (btn) btn.classList.add('is-open');

                // Scroll doux vers le bloc
                setTimeout(() => {
                    bloc.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 50);
            }
        }

        // Ajouter l'animation de fermeture en CSS
        const style = document.createElement('style');
        style.textContent = `
  @keyframes slideUp {
    from { opacity: 1; transform: translateY(0); }
    to   { opacity: 0; transform: translateY(-12px); }
  }
`;
        document.head.appendChild(style);

        // ── Filtres RSS ───────────────────────────────────────────────
        document.querySelectorAll('.vf-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.vf-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const f = btn.dataset.filter;
                document.querySelectorAll('.rss-card').forEach(c => {
                    c.classList.toggle('hidden', f !== 'all' && c.dataset.category !== f);
                });
            });
        });

        // ── Toggle archives ───────────────────────────────────────────
        function toggleArchives() {
            const box = document.getElementById('archivesContainer');
            const btn = document.getElementById('archivesToggle');
            const open = box.style.display === 'none';
            box.style.display = open ? 'block' : 'none';
            btn.firstChild.nextSibling.textContent = open ?
                ' Masquer les archives' :
                ' Afficher les <?= count($archives) ?> articles archivés';
        }

        // ── Animation scroll cards RSS ────────────────────────────────
        const obs = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                    obs.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.06
        });

        document.querySelectorAll('.rss-card').forEach((c, i) => {
            c.style.opacity = '0';
            c.style.transform = 'translateY(16px)';
            c.style.transition = `opacity .4s ease ${i * .04}s, transform .4s ease ${i * .04}s`;
            obs.observe(c);
        });
    </script>


</body>

</html>