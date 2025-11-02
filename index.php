<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub de Projets - Nolann Thuillier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1wS0XwS0Jp6t5wjvG7C01Jw4b2+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <div class="background-accent"></div>
    <header class="top-bar">
        <div class="brand">
            <span class="logo">NT</span>
            <div class="brand-text">
                <p class="brand-title">Nolann Thuillier</p>
                <p class="brand-subtitle">Créateur de projets numériques</p>
            </div>
        </div>
        <nav class="main-nav" aria-label="Navigation principale">
            <ul>
                <li><a href="#projects">Projets</a></li>
                <li><a href="#highlights">Fonctionnalités</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero-text">
                <h1 id="hero-title">Bienvenue sur le hub créatif</h1>
                <p class="hero-subtitle">Un espace vivant pour découvrir mes expériences interactives, outils audacieux et idées musicales.</p>
                <div class="hero-greeting" aria-live="polite">
                    <span class="greeting-label">Aujourd'hui on se dit&nbsp;:</span>
                    <span class="welcome-message" role="status"></span>
                </div>
                <div class="hero-actions">
                    <a class="button primary" href="#projects">Explorer les projets</a>
                    <a class="button secondary" href="https://cv.nolannthuillier.fr/">Voir mon parcours</a>
                </div>
            </div>
            <div class="hero-media" aria-hidden="true">
                <div class="hero-card">
                    <p class="hero-highlight">Des expériences immersives, des outils utiles et une touche de fun à chaque coin du site.</p>
                    <ul>
                        <li><i class="fa-solid fa-sparkles"></i> Interfaces modernes et fluides</li>
                        <li><i class="fa-solid fa-compass"></i> Navigation claire et intuitive</li>
                        <li><i class="fa-solid fa-music"></i> Créations sonores à explorer</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="projects" class="projects" aria-labelledby="projects-title">
            <div class="section-header">
                <h2 id="projects-title">Mes espaces numériques</h2>
                <p>Retrouvez mes univers favoris, des expériences interactives aux ressources pratiques.</p>
            </div>
            <div class="project-grid">
                <a href="/musique/" class="project-card" aria-label="Musique, pour danser en pyjama ou en public">
                    <div class="card-icon"><i class="fa-solid fa-headphones"></i></div>
                    <h3>Musique</h3>
                    <p>Pour danser en pyjama ou partager des vibes en soirée.</p>
                    <span class="card-link">Découvrir</span>
                </a>
                <a href="https://cv.nolannthuillier.fr/" class="project-card" aria-label="CV, ma carrière en un clin d'œil">
                    <div class="card-icon"><i class="fa-solid fa-id-card"></i></div>
                    <h3>CV interactif</h3>
                    <p>Parcourez mon parcours et mes projets en un clin d'œil.</p>
                    <span class="card-link">Consulter</span>
                </a>
                <a href="/faq/" class="project-card" aria-label="FAQ, réponses aux questions que vous n'avez jamais osé poser">
                    <div class="card-icon"><i class="fa-solid fa-circle-question"></i></div>
                    <h3>FAQ</h3>
                    <p>Réponses aux questions sérieuses (et moins sérieuses).</p>
                    <span class="card-link">Lire</span>
                </a>
                <a href="/photo/" class="project-card" aria-label="Photo, explorez la créativité en action">
                    <div class="card-icon"><i class="fa-solid fa-camera-retro"></i></div>
                    <h3>Galerie Photo</h3>
                    <p>Captures de moments forts, portraits et souvenirs.</p>
                    <span class="card-link">Explorer</span>
                </a>
                <a href="/Game/" class="project-card" aria-label="Game, explorez des jeux captivants">
                    <div class="card-icon"><i class="fa-solid fa-gamepad"></i></div>
                    <h3>Game Lab</h3>
                    <p>Des jeux ludiques créés pour se challenger et sourire.</p>
                    <span class="card-link">Jouer</span>
                </a>
                <a href="/video/" class="project-card" aria-label="Vidéos, un concentré de créations audio et visuelles">
                    <div class="card-icon"><i class="fa-solid fa-clapperboard"></i></div>
                    <h3>Vidéos</h3>
                    <p>Clips, expériences et coulisses de mes créations.</p>
                    <span class="card-link">Regarder</span>
                </a>
                <a href="https://lecture.nolannthuillier.fr/" class="project-card" aria-label="Lecture, ressources et notes de lecture">
                    <div class="card-icon"><i class="fa-solid fa-book-open"></i></div>
                    <h3>Lecture</h3>
                    <p>Mes lectures inspirantes et annotations partagées.</p>
                    <span class="card-link">Feuilleter</span>
                </a>
                <a href="https://agent.nolannthuillier.fr/" class="project-card" aria-label="Agent IA, expérience conversationnelle">
                    <div class="card-icon"><i class="fa-solid fa-robot"></i></div>
                    <h3>Agent IA</h3>
                    <p>Discutez avec mon agent intelligent et explorez ses talents.</p>
                    <span class="card-link">Tester</span>
                </a>
            </div>
        </section>

        <section id="highlights" class="highlights" aria-labelledby="highlights-title">
            <div class="section-header">
                <h2 id="highlights-title">Ce qui rend le hub unique</h2>
                <p>Une navigation fluide, des expériences créatives et un soupçon de personnalité.</p>
            </div>
            <div class="highlight-grid">
                <article class="highlight-card">
                    <h3><i class="fa-solid fa-bolt"></i> Performance instantanée</h3>
                    <p>Des pages légères et optimisées pour parcourir les projets sans attente.</p>
                </article>
                <article class="highlight-card">
                    <h3><i class="fa-solid fa-earth-europe"></i> Ouverture internationale</h3>
                    <p>Messages dynamiques multilingues pour accueillir tout le monde en un clin d'œil.</p>
                </article>
                <article class="highlight-card">
                    <h3><i class="fa-solid fa-palette"></i> Style affirmé</h3>
                    <p>Identité moderne avec effets glassmorphiques et contrastes soignés.</p>
                </article>
            </div>
        </section>
    </main>

    <footer id="contact" class="site-footer">
        <div class="footer-content">
            <div>
                <p class="footer-title">Restons en contact</p>
                <p>Envie de collaborer ou d'en savoir plus ? Écrivez-moi à <a href="mailto:hello@nolannthuillier.fr">hello@nolannthuillier.fr</a>.</p>
            </div>
            <div class="footer-links">
                <a href="https://hub.nolannthuillier.fr/legal/mentions-legales.php" class="footer-link">Mentions légales</a>
                <a href="https://hub.nolannthuillier.fr/legal/conditions_generales.php" class="footer-link">Conditions générales</a>
            </div>
            <p class="footer-note">© <?php echo date('Y'); ?> Nolann Thuillier — Créativité, technologie &amp; bonne humeur.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
