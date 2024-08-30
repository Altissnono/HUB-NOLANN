<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page non trouvée</title>
    <link rel="stylesheet" href="404.css">
</head>
<body>
    <div class="container">
        <div class="error">
            4<span>0</span>4
        </div>
        <div class="message">
            <div class="error-text">
                <span id="typed-text"></span><span class="cursor">|</span>
            </div>
            <p class="humor">Oops! Il semblerait que cette page se soit perdue dans la matrice...</p>
        </div>
        <a href="/" class="home-button">Retour à l'accueil avant qu'une autre erreur n'arrive!</a>
        <div class="animation">
            <div class="ball"></div>
            <div class="shadow"></div>
        </div>
    </div>

    <script>
        const texts = ["Error", "Fehler", "Erreur", "خطأ", "Ошибка"];
        let currentTextIndex = 0;
        let currentCharIndex = 0;
        const typingSpeed = 150; // Vitesse de frappe
        const erasingSpeed = 100; // Vitesse de suppression
        const newTextDelay = 1000; // Délai avant de commencer à taper le texte suivant

        const typedTextSpan = document.getElementById("typed-text");
        const cursorSpan = document.querySelector(".cursor");

        function type() {
            if (currentCharIndex < texts[currentTextIndex].length) {
                typedTextSpan.textContent += texts[currentTextIndex].charAt(currentCharIndex);
                currentCharIndex++;
                setTimeout(type, typingSpeed);
            } else {
                setTimeout(erase, newTextDelay);
            }
        }

        function erase() {
            if (currentCharIndex > 0) {
                typedTextSpan.textContent = texts[currentTextIndex].substring(0, currentCharIndex - 1);
                currentCharIndex--;
                setTimeout(erase, erasingSpeed);
            } else {
                currentTextIndex = (currentTextIndex + 1) % texts.length;
                setTimeout(type, typingSpeed + 500);
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(type, newTextDelay + 250);
        });
    </script>
</body>
</html>
