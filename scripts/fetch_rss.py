#!/usr/bin/env python3
"""
scripts/fetch_rss.py
────────────────────────────────────────────────────────────────
Script appelé par GitHub Actions chaque nuit.
Lit les flux RSS définis dans SOURCES, génère cache/articles.json.

Tu n'as pas besoin de toucher à ce fichier sauf pour :
  - Ajouter/supprimer des sources dans SOURCES
  - Changer MAX_ARTICLES
────────────────────────────────────────────────────────────────
"""

import feedparser
import json
import os
from datetime import datetime, timezone
from email.utils import parsedate_to_datetime

# ── CONFIGURATION ────────────────────────────────────────────

SOURCES = [
    {
        "nom": "Google Alertes — CI/CD",
        # Remplace par ton URL Google Alertes RSS
        "url": "https://www.google.com/alerts/feeds/00009545252344223537/12485788112706886604",
        "tag": "tools",
    },
    {
        "nom": "Dev.to — CI/CD",
        "url": "https://dev.to/feed/tag/cicd",
        "tag": "ci",
    },
    {
        "nom": "Dev.to — DevOps",
        "url": "https://dev.to/feed/tag/devops",
        "tag": "cloud",
    },
    {
        "nom": "GitHub Blog",
        "url": "https://github.blog/feed/",
        "tag": "tools",
    },
    {
        "nom": "Docker Blog",
        "url": "https://www.docker.com/blog/feed/",
        "tag": "tools",
    },
]

MAX_ARTICLES    = 25   # Nombre max d'articles à conserver au total
MAX_RECENTS     = 6   # Les N premiers seront "récents", le reste = archives
OUTPUT_FILE     = "cache/articles.json"

# ── FONCTIONS ────────────────────────────────────────────────

def parse_date(entry) -> datetime:
    """Extrait et convertit la date d'un article en datetime UTC."""
    for attr in ("published", "updated"):
        val = getattr(entry, attr, None)
        if val:
            try:
                return parsedate_to_datetime(val).astimezone(timezone.utc)
            except Exception:
                try:
                    return datetime(*entry.get(attr + "_parsed", [2000,1,1,0,0,0])[:6], tzinfo=timezone.utc)
                except Exception:
                    pass
    return datetime(2000, 1, 1, tzinfo=timezone.utc)


def clean_text(text: str, max_len: int = 280) -> str:
    """Nettoie le HTML et tronque le texte."""
    import re
    text = re.sub(r'<[^>]+>', '', text or '')
    text = text.replace('&amp;', '&').replace('&lt;', '<').replace('&gt;', '>').replace('&quot;', '"').replace('&#39;', "'")
    text = ' '.join(text.split())
    if len(text) > max_len:
        text = text[:max_len].rsplit(' ', 1)[0] + '…'
    return text


def fetch_feed(source: dict) -> list:
    """Récupère et parse un flux RSS/Atom."""
    url = source["url"]
    
    # Sauter les URLs non configurées
    if "REMPLACE_PAR" in url:
        print(f"  ⏭  Source non configurée : {source['nom']}")
        return []

    print(f"  📡 Récupération : {source['nom']}")
    try:
        feed = feedparser.parse(url)
    except Exception as e:
        print(f"  ❌ Erreur : {e}")
        return []

    if feed.bozo and not feed.entries:
        print(f"  ⚠️  Flux invalide ou inaccessible : {source['nom']}")
        return []

    articles = []
    for entry in feed.entries:
        titre  = clean_text(getattr(entry, 'title', ''), 200)
        lien   = getattr(entry, 'link', '')
        resume = clean_text(getattr(entry, 'summary', '') or getattr(entry, 'description', ''))
        date   = parse_date(entry)

        if not titre or not lien:
            continue

        articles.append({
            "titre":     titre,
            "lien":      lien,
            "resume":    resume,
            "date":      date.strftime("%d/%m/%Y"),
            "timestamp": int(date.timestamp()),
            "source":    source["nom"],
            "tag":       source["tag"],
        })

    print(f"  ✅ {len(articles)} articles trouvés")
    return articles


# ── MAIN ────────────────────────────────────────────────────

def main():
    print("\n🚀 Démarrage du fetch RSS…\n")
    
    tous = []
    liens_vus = set()

    for source in SOURCES:
        articles = fetch_feed(source)
        for a in articles:
            if a["lien"] not in liens_vus:
                tous.append(a)
                liens_vus.add(a["lien"])

    # Trier par date décroissante
    tous.sort(key=lambda x: x["timestamp"], reverse=True)
    tous = tous[:MAX_ARTICLES]

    recents  = tous[:MAX_RECENTS]
    archives = tous[MAX_RECENTS:]

    result = {
        "recents":      recents,
        "archives":     archives,
        "total":        len(tous),
        "derniere_maj": datetime.now().strftime("%d/%m/%Y à %H:%M"),
    }

    # Créer le dossier cache si besoin
    os.makedirs(os.path.dirname(OUTPUT_FILE), exist_ok=True)

    with open(OUTPUT_FILE, "w", encoding="utf-8") as f:
        json.dump(result, f, ensure_ascii=False, indent=2)

    print(f"\n✅ {len(tous)} articles sauvegardés dans {OUTPUT_FILE}")
    print(f"   → {len(recents)} récents / {len(archives)} archives\n")


if __name__ == "__main__":
    main()