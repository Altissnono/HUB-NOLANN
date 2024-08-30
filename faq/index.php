<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="style/home.css">
</head>
<body>
    <header>
        <h1>FAQ</h1>
        <a href="https://hub.nolannthuillier.fr/" class="btn-back">Retour au Hub</a>
    </header>
    
    <div class="faq-container">
        <div class="tabs">
            <button class="tab-button active" onclick="openTab(event, 'general')">Général</button>
            <button class="tab-button" onclick="openTab(event, 'technical')">Qui suis-je ?</button>
        </div>
        
        <div id="general" class="tab-content active">
            <h2>Questions Générales</h2>
            <div class="faq-item">
                <button class="accordion">Q1 : En matière d'écologie, ce que je fais ?</button>
                <div class="accordion-content">
                    <p>L'hébergement de mes services et serveurs est entièrement alimenté par de l'électricité renouvelable à 100 %.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q2 : En ce qui concerne la sécurité des données utilisateurs sur mes sites, que fais-je ?</button>
                <div class="accordion-content">
                    <p>Je ne collecte que les informations essentielles à des fins statistiques, telles que le pays de localisation, l'heure de visionnage et le temps de visite.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q3 : Quels types de projets informatiques est-ce que je peux trouver sur mon hub ?</button>
                <div class="accordion-content">
                    <p>Sur mon hub informatique, vous trouverez une variété de projets allant de la programmation de logiciels et développement web à la gestion de réseaux et à la cybersécurité. J'aime particulièrement partager des projets qui combinent différentes compétences, comme des applications qui nécessitent à la fois du développement backend et frontend. Si vous avez des questions spécifiques ou des domaines particuliers que vous souhaitez explorer, n'hésitez pas à me le faire savoir !</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q4 : Pourquoi ai-je créé un service e-mail et un drive personnel ?</button>
                <div class="accordion-content">
                    <p>Avec l'évolution constante des systèmes en ligne et du cloud, j'ai souhaité me détacher des grandes entreprises telles que GAFAM (Google, Apple, Microsoft, etc.) pour avoir un contrôle total sur mes données. Cela me permet de mieux gérer mes besoins professionnels et personnels de manière indépendante.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q5 : Mon service email est-il en amélioration continue ?</button>
                <div class="accordion-content">
                    <p>Oui, mon service email est en amélioration constante. Il se divise en deux grandes parties : « my-email.space » et « vodmail.fr ». Chacune de ces zones d'email a ses propres spécificités en raison de son ancienneté et de sa fonction. En plus, le domaine « .space » ajoute une touche originale et amusante à l'ensemble.</p>
                </div>
            </div>
        </div>

        
       
        <div id="technical" class="tab-content">
            <h2>Qui suis-je ?</h2>
            <div class="faq-item">
                <button class="accordion">Q1 : Quel âge ai-je ?</button>
                <div class="accordion-content">
                    <p>J'ai 21 ans.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q2 : Où est-ce que j'habite ?</button>
                <div class="accordion-content">
                    <p>Je vis en Hauts-de-France, à Rinxent (62720).</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q3 : Pourquoi ai-je choisi l'informatique ?</button>
                <div class="accordion-content">
                    <p>L'informatique a toujours fait partie de ma vie. J'ai toujours été passionné par la découverte et l'apprentissage de nouvelles technologies.</p>
                </div>
            </div>

            <div class="faq-item">
                <button class="accordion">Q4 : Quels sont mes projets pour l'avenir ?</button>
                <div class="accordion-content">
                    <p>Dans les années à venir, je souhaite continuer à me perfectionner professionnellement tout en développant mes projets personnels.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openTab(event, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";  
            }
            tablinks = document.getElementsByClassName("tab-button");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";  
            event.currentTarget.className += " active";
        }

        // Open the default tab
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".tab-button.active").click();
        });

        // Accordion functionality
        var acc = document.getElementsByClassName("accordion");
        for (var i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
        }
    </script>
</body>
</html>
