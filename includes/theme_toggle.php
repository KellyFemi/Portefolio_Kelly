<!-- Bouton Toggle Theme -->
<button id="themeToggle" class="theme-toggle" aria-label="Changer de thème">
    <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="5"></circle>
        <line x1="12" y1="1" x2="12" y2="3"></line>
        <line x1="12" y1="21" x2="12" y2="23"></line>
        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
        <line x1="1" y1="12" x2="3" y2="12"></line>
        <line x1="21" y1="12" x2="23" y2="12"></line>
        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
    </svg>
    <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
    </svg>
</button>

<style>
/* Variables de couleurs */
:root {
    --bg-primary: #0a0a0a;
    --bg-secondary: #1a1a1a;
    --text-primary: #ffffff;
    --text-secondary: #cccccc;
    --border-color: rgba(255, 255, 255, 0.2);
    --pink: #c32257;
}

body.light-mode {
    --bg-primary: #ffffff;
    --bg-secondary: #f8f9fa;
    --text-primary: #000000;
    --text-secondary: #666666;
    --border-color: rgba(0, 0, 0, 0.1);
    --pink: #c32257; /* Le rose reste identique */
}

/* Application des variables sur le body */
body {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Sections */
.competences-section,
.bg-light,
section.py-5.bg-light {
    background-color: var(--bg-secondary) !important;
}

/* Textes */
.text-black,
h1, h2, h3, h4, h5, h6 {
    color: var(--text-primary) !important;
}

.competence-name,
.text-secondary {
    color: var(--text-secondary) !important;
}

/* Bordures */
.border-white,
.competence-item {
    border-color: var(--border-color) !important;
}

/* Cartes */
.card,
.competence-item {
    background-color: var(--bg-secondary) !important;
}

/* Le rose reste toujours #c32257 */
.theme-toggle {
    background: var(--pink) !important;
}

.competences-title,
.competence-item:hover .competence-name,
[style*="color:#c32257"],
[style*="color: #c32257"] {
    color: var(--pink) !important;
    background: linear-gradient(135deg, var(--pink) 0%, #ff6b9d 100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    background-clip: text !important;
}

/* Bouton toggle */
.theme-toggle {
    position: fixed;
    top: 20px;
    right: 20px;
    width: 45px;
    height: 45px;
    background: var(--pink);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(195, 34, 87, 0.4);
    transition: all 0.3s ease;
    z-index: 1000;
}

.theme-toggle:hover {
    background: #a01d47;
    transform: scale(1.1);
}

.theme-toggle svg {
    position: absolute;
    transition: all 0.3s ease;
}

.sun-icon {
    opacity: 0;
    transform: rotate(90deg) scale(0);
}

.moon-icon {
    opacity: 1;
    transform: rotate(0deg) scale(1);
}

body.light-mode .sun-icon {
    opacity: 1;
    transform: rotate(0deg) scale(1);
}

body.light-mode .moon-icon {
    opacity: 0;
    transform: rotate(-90deg) scale(0);
}
</style>

<script>
// Gestion du thème
const themeToggle = document.getElementById('themeToggle');
const body = document.body;

// Récupérer le thème sauvegardé
const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'light') {
    body.classList.add('light-mode');
}

// Toggle au clic
themeToggle.addEventListener('click', () => {
    body.classList.toggle('light-mode');
    
    if (body.classList.contains('light-mode')) {
        localStorage.setItem('theme', 'light');
    } else {
        localStorage.setItem('theme', 'dark');
    }
});
</script>