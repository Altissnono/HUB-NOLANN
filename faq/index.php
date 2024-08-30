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
            <!--<button class="tab-button" onclick="openTab(event, 'technical')">Technique</button>
            <button class="tab-button" onclick="openTab(event, 'account')">Compte</button>-->
        </div>
        
        <div id="general" class="tab-content active">
            <h2>Questions Générales</h2>
            <p><strong>Q1 :</strong> En matière d'écologie, ce que je fais ? </p>
            <p><strong>R1 :</strong> L'hébergement de mes services et serveurs est entièrement alimenté par de l'électricité renouvelable à 100 %.</p> <br>
            <p><strong>Q2 :</strong> En ce qui concerne la sécurité des données utilisateurs sur mes sites, que fais-je ?</p>
            <p><strong>R2 :</strong> Je ne collecte que les informations essentielles à des fins statistiques, telles que le pays de localisation, l'heure de visionnage et le temps de visite.</p> <br>
      
        </div>
       <!--
        <div id="technical" class="tab-content">
            <h2>Questions Techniques</h2>
            <p><strong>Q1 :</strong> Quels sont les navigateurs supportés ?</p>
            <p><strong>R1 :</strong> Nous supportons les navigateurs les plus courants comme Chrome, Firefox, et Safari.</p>
            <p><strong>Q2 :</strong> Comment réinitialiser mon mot de passe ?</p>
            <p><strong>R2 :</strong> Utilisez le lien 'Mot de passe oublié' sur la page de connexion.</p>
        </div>
        
        <div id="account" class="tab-content">
            <h2>Questions sur le Compte</h2>
            <p><strong>Q1 :</strong> Comment mettre à jour mes informations personnelles ?</p>
            <p><strong>R1 :</strong> Connectez-vous à votre compte et accédez à la section 'Mon Profil'.</p>
            <p><strong>Q2 :</strong> Puis-je supprimer mon compte ?</p>
            <p><strong>R2 :</strong> Oui, vous pouvez le faire en envoyant une demande à notre support.</p>
        </div>
        -->
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
    </script>
</body>
</html>
