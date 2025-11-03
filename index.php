<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hub Nolann Thuillier</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DT+OQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1wS0XwS0Jp6t5wjvG7C01Jw4b2+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <div class="background-layer"></div>
    <header class="site-header">
        <div class="site-header__brand">
            <span class="site-header__logo" aria-hidden="true">NT</span>
            <div>
                <p class="site-header__title">Nolann Thuillier</p>
                <p class="site-header__subtitle">Créateur d'expériences numériques</p>
            </div>
        </div>
        <nav class="site-header__nav" aria-label="Navigation principale">
            <a href="#univers">Univers</a>
            <a href="#experiences">Expériences</a>
            <a href="#contact">Contact</a>
        </nav>
    </header>

    <main>
        <section class="hero" aria-labelledby="hero-title">
            <div class="hero__content">
                <p class="hero__eyebrow">Bienvenue sur le hub</p>
                <h1 id="hero-title">Toutes mes créations à portée de clic</h1>
                <p class="hero__lead">Explore des outils audacieux, des expériences interactives et mes univers favoris dans une interface claire et moderne.</p>
                <div class="hero__cta">
                    <a class="btn btn--primary" href="#univers">Découvrir le hub</a>
                    <a class="btn btn--ghost" href="https://cv.nolannthuillier.fr/" target="_blank" rel="noopener">Voir mon parcours</a>
                </div>
                <div class="hero__greeting" aria-live="polite">
                    <span class="hero__greeting-label">Le hub vous accueille :</span>
                    <span class="hero__greeting-message" role="status"></span>
                </div>
            </div>
            <div class="hero__visual" aria-hidden="true">
                <div class="hero-card">
                    <p class="hero-card__title">Un hub ludique & productif</p>
                    <ul class="hero-card__list">
                        <li><i class="fa-solid fa-sparkles"></i> Interfaces soignées et réactives</li>
                        <li><i class="fa-solid fa-compass"></i> Parcours simple & intuitif</li>
                        <li><i class="fa-solid fa-headphones"></i> Musiques, vidéos et plus encore</li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="univers" class="univers" aria-labelledby="univers-title">
            <div class="section-heading">
                <p class="section-heading__eyebrow">Mes univers</p>
                <h2 id="univers-title">Des espaces pensés pour explorer</h2>
                <p class="section-heading__description">Retrouve mes projets, outils et contenus dans des cartes accessibles. Chaque espace s'ouvre dans un nouvel onglet pour garder le hub à portée de main.</p>
            </div>
            <div class="univers__grid">
                <a class="card" href="https://lecture.nolannthuillier.fr/" target="_blank" rel="noopener" aria-label="Lecture, ouvre dans un nouvel onglet">
                    <span class="card__icon"><i class="fa-solid fa-book-open"></i></span>
                    <div>
                        <h3>Lecture</h3>
                        <p>Mes notes, résumés et ressources pour nourrir l'inspiration.</p>
                    </div>
                    <span class="card__action">Feuilleter</span>
                </a>
                <a class="card" href="https://agent.nolannthuillier.fr/" target="_blank" rel="noopener" aria-label="Agent IA, ouvre dans un nouvel onglet">
                    <span class="card__icon"><i class="fa-solid fa-robot"></i></span>
                    <div>
                        <h3>Agent IA</h3>
                        <p>Discute avec mon agent intelligent pour découvrir mes projets autrement.</p>
                    </div>
                    <span class="card__action">Tester</span>
                </a>
                <a class="card" href="/musique/">
                    <span class="card__icon"><i class="fa-solid fa-headphones"></i></span>
                    <div>
                        <h3>Musique</h3>
                        <p>Des playlists et compositions pour accompagner ton quotidien.</p>
                    </div>
                    <span class="card__action">Écouter</span>
                </a>
                <a class="card" href="/Game/">
                    <span class="card__icon"><i class="fa-solid fa-gamepad"></i></span>
                    <div>
                        <h3>Game Lab</h3>
                        <p>Une sélection de mini-jeux créés pour expérimenter et s'amuser.</p>
                    </div>
                    <span class="card__action">Jouer</span>
                </a>
                <a class="card" href="/photo/">
                    <span class="card__icon"><i class="fa-solid fa-camera-retro"></i></span>
                    <div>
                        <h3>Galerie photo</h3>
                        <p>Instants capturés, portraits et coulisses des projets.</p>
                    </div>
                    <span class="card__action">Explorer</span>
                </a>
                <a class="card" href="/video/">
                    <span class="card__icon"><i class="fa-solid fa-clapperboard"></i></span>
                    <div>
                        <h3>Vidéos</h3>
                        <p>Clips, formats courts et expériences audiovisuelles.</p>
                    </div>
                    <span class="card__action">Regarder</span>
                </a>
                <a class="card" href="/faq/">
                    <span class="card__icon"><i class="fa-solid fa-circle-question"></i></span>
                    <div>
                        <h3>FAQ</h3>
                        <p>Les réponses aux questions techniques, pratiques ou insolites.</p>
                    </div>
                    <span class="card__action">Consulter</span>
                </a>
                <a class="card" href="https://cv.nolannthuillier.fr/" target="_blank" rel="noopener">
                    <span class="card__icon"><i class="fa-solid fa-id-card"></i></span>
                    <div>
                        <h3>CV interactif</h3>
                        <p>Mon parcours, mes compétences et mes collaborations.</p>
                    </div>
                    <span class="card__action">Voir</span>
                </a>
            </div>
        </section>

        <section id="experiences" class="experiences" aria-labelledby="experiences-title">
            <div class="section-heading">
                <p class="section-heading__eyebrow">Expériences proposées</p>
                <h2 id="experiences-title">Un hub pensé pour le confort</h2>
                <p class="section-heading__description">Le design reste léger pour charger vite, les parcours sont clairs et chaque détail a été soigné pour rester agréable sur mobile comme sur grand écran.</p>
            </div>
            <div class="experience-grid">
                <article class="experience-card">
                    <span class="experience-card__icon"><i class="fa-solid fa-gauge-high"></i></span>
                    <h3>Rapide et fluide</h3>
                    <p>Structure optimisée, typographie lisible et animations limitées pour conserver d'excellentes performances.</p>
                </article>
                <article class="experience-card">
                    <span class="experience-card__icon"><i class="fa-solid fa-layer-group"></i></span>
                    <h3>Identité harmonieuse</h3>
                    <p>Palette moderne aux tons bleutés, effets subtils de profondeur et cartes glassmorphiques lisibles.</p>
                </article>
                <article class="experience-card">
                    <span class="experience-card__icon"><i class="fa-solid fa-mobile-screen-button"></i></span>
                    <h3>Mobile friendly</h3>
                    <p>Mise en page responsive avec navigation accessible et boutons larges pour les interactions tactiles.</p>
                </article>
            </div>
        </section>
    </main>

    <footer id="contact" class="site-footer">
        <div class="site-footer__content">
            <div>
                <p class="site-footer__title">Envie de collaborer&nbsp;?</p>
                <p>Écris-moi à <a href="mailto:hello@nolannthuillier.fr">hello@nolannthuillier.fr</a> ou retrouve-moi sur mes différents univers.</p>
            </div>
            <div class="site-footer__links">
                <a href="/legal/mentions-legales.php">Mentions légales</a>
                <a href="/legal/conditions_generales.php">Conditions générales</a>
            </div>
            <p class="site-footer__note">© <?php echo date('Y'); ?> Nolann Thuillier – Créativité & technologie avec le sourire.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
