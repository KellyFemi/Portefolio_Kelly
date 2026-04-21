<?php
/**
 * rss_fetcher.php
 * ─────────────────────────────────────────────────────────────
 * Récupère et met en cache les articles RSS depuis plusieurs sources.
 * Compatible InfinityFree (utilise cURL, pas file_get_contents).
 * 
 * UTILISATION : include('includes/rss_fetcher.php');
 * puis appeler : $articles = get_veille_articles();
 * ─────────────────────────────────────────────────────────────
 */

// ── CONFIGURATION ────────────────────────────────────────────

/**
 * Flux RSS à surveiller.
 * Remplace l'URL Google Alertes par la tienne (voir README ci-dessous).
 * 
 * COMMENT CRÉER TON FLUX GOOGLE ALERTES :
 *  1. Va sur https://www.google.fr/alerts
 *  2. Tape "CI/CD DevOps" ou "intégration continue déploiement"
 *  3. Clique "Afficher les options" → Livrer à → "Flux RSS"
 *  4. Clique "Créer l'alerte"
 *  5. Dans "Mes alertes", clique sur l'icône RSS → copie l'URL
 *  6. Colle-la dans $RSS_SOURCES ci-dessous
 */
$RSS_SOURCES = [
    [
        'nom'  => 'Google Alertes — CI/CD',
        'url'  => 'https://www.google.com/alerts/feeds/00009545252344223537/12485788112706886604',
        'tag'  => 'tools',
    ],
    [
        'nom'  => 'Dev.to — CI/CD',
        'url'  => 'https://dev.to/feed/tag/cicd',
        'tag'  => 'ci',
    ],
    [
        'nom'  => 'Dev.to — DevOps',
        'url'  => 'https://dev.to/feed/tag/devops',
        'tag'  => 'cloud',
    ],
    [
        'nom'  => 'GitHub Blog',
        'url'  => 'https://github.blog/feed/',
        'tag'  => 'tools',
    ],
    [
        'nom'  => 'Docker Blog',
        'url'  => 'https://www.docker.com/blog/feed/',
        'tag'  => 'tools',
    ],
];

// Durée du cache en secondes (3600 = 1 heure)
define('RSS_CACHE_DURATION', 3600);

// Dossier cache — doit être accessible en écriture
define('RSS_CACHE_DIR', __DIR__ . '/../cache/');

// Nombre max d'articles récents affichés en haut
define('RSS_MAX_RECENTS', 10);

// ── FONCTIONS ────────────────────────────────────────────────

/**
 * Récupère le contenu d'une URL via cURL.
 * Compatible InfinityFree (pas de file_get_contents sur URL externe).
 */
function rss_curl_get(string $url): string|false
{
    if (!function_exists('curl_init')) {
        error_log('cURL non disponible sur ce serveur.');
        return false;
    }

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_USERAGENT      => 'Mozilla/5.0 (compatible; PortfolioRSS/1.0)',
        CURLOPT_SSL_VERIFYPEER => false, // Nécessaire sur certains hébergements mutualisés
    ]);
    $result = curl_exec($ch);
    $error  = curl_error($ch);
    curl_close($ch);

    if ($error) {
        error_log("cURL error pour $url : $error");
        return false;
    }

    return $result;
}

/**
 * Lit et parse un flux RSS/Atom, retourne un tableau d'articles.
 */
function rss_parse_feed(string $xml_string, string $source_nom, string $tag): array
{
    $articles = [];

    // Supprime les namespaces problématiques pour SimpleXML
    $xml_string = preg_replace('/(<\/?)(\w+):([^>]*>)/', '$1$2_$3', $xml_string);

    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($xml_string);

    if ($xml === false) {
        error_log("Impossible de parser le flux RSS : $source_nom");
        return [];
    }

    // ── Format RSS 2.0 ──
    if (isset($xml->channel->item)) {
        foreach ($xml->channel->item as $item) {
            $titre  = html_entity_decode((string)$item->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            $lien   = (string)$item->link;
            $date   = (string)$item->pubDate;
            $resume = strip_tags(html_entity_decode((string)$item->description, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $resume = mb_substr($resume, 0, 280) . (mb_strlen($resume) > 280 ? '…' : '');

            $timestamp = strtotime($date) ?: time();

            if (empty($titre) || empty($lien)) continue;

            $articles[] = [
                'titre'     => $titre,
                'lien'      => $lien,
                'date'      => date('d/m/Y', $timestamp),
                'timestamp' => $timestamp,
                'resume'    => $resume,
                'source'    => $source_nom,
                'tag'       => $tag,
            ];
        }
    }

    // ── Format Atom (Google Alertes utilise Atom) ──
    elseif (isset($xml->entry)) {
        foreach ($xml->entry as $entry) {
            $titre  = html_entity_decode((string)$entry->title, ENT_QUOTES | ENT_HTML5, 'UTF-8');

            // Google Alertes : le lien est dans l'attribut href
            $lien = '';
            if (isset($entry->link)) {
                $attrs = $entry->link->attributes();
                $lien  = (string)($attrs['href'] ?? $entry->link);
            }

            $date      = (string)($entry->published ?? $entry->updated ?? '');
            $timestamp = strtotime($date) ?: time();
            $resume    = strip_tags(html_entity_decode((string)($entry->summary ?? $entry->content ?? ''), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
            $resume    = mb_substr($resume, 0, 280) . (mb_strlen($resume) > 280 ? '…' : '');

            if (empty($titre) || empty($lien)) continue;

            $articles[] = [
                'titre'     => $titre,
                'lien'      => $lien,
                'date'      => date('d/m/Y', $timestamp),
                'timestamp' => $timestamp,
                'resume'    => $resume,
                'source'    => $source_nom,
                'tag'       => $tag,
            ];
        }
    }

    return $articles;
}

/**
 * Fonction principale : retourne tous les articles triés.
 * Utilise un cache fichier pour éviter de surcharger les sources.
 * 
 * @return array ['recents' => [...], 'archives' => [...]]
 */
function get_veille_articles(): array
{
    global $RSS_SOURCES;

    $cache_file = RSS_CACHE_DIR . 'rss_cache.json';

    // ── Lire le cache si encore valide ──
    if (
        file_exists($cache_file) &&
        (time() - filemtime($cache_file)) < RSS_CACHE_DURATION
    ) {
        $cached = json_decode(file_get_contents($cache_file), true);
        if ($cached !== null) {
            return $cached;
        }
    }

    // ── Récupérer les flux ──
    $tous_articles = [];

    foreach ($RSS_SOURCES as $source) {
        // Sauter les URLs placeholder non configurées
        if (str_contains($source['url'], 'REMPLACE_PAR')) {
            continue;
        }

        $xml = rss_curl_get($source['url']);
        if ($xml === false) continue;

        $articles = rss_parse_feed($xml, $source['nom'], $source['tag']);
        $tous_articles = array_merge($tous_articles, $articles);
    }

    // ── Dédoublonner par lien ──
    $liens_vus = [];
    $tous_articles = array_filter($tous_articles, function ($a) use (&$liens_vus) {
        if (in_array($a['lien'], $liens_vus)) return false;
        $liens_vus[] = $a['lien'];
        return true;
    });

    // ── Trier par date décroissante ──
    usort($tous_articles, fn($a, $b) => $b['timestamp'] - $a['timestamp']);
    $tous_articles = array_values($tous_articles);

    // ── Séparer récents / archives ──
    $recents  = array_slice($tous_articles, 0, RSS_MAX_RECENTS);
    $archives = array_slice($tous_articles, RSS_MAX_RECENTS);

    $result = [
        'recents'       => $recents,
        'archives'      => $archives,
        'total'         => count($tous_articles),
        'derniere_maj'  => date('d/m/Y à H:i'),
    ];

    // ── Sauvegarder le cache ──
    if (!is_dir(RSS_CACHE_DIR)) {
        mkdir(RSS_CACHE_DIR, 0755, true);
    }
    file_put_contents($cache_file, json_encode($result, JSON_UNESCAPED_UNICODE));

    return $result;
}