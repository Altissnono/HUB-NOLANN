document.addEventListener("DOMContentLoaded", function() {
    const messages = [
        "Bienvenue au Hub de Projets!",
        "Willkommen im Projektzentrum!",
        "Welcome to the Project Hub!",
        "¡Bienvenido al Centro de Proyectos!",
        "أهلاً بك في مركز المشاريع!",
        "Добро пожаловать в центр проектов!"
    ];

    let index = 0;
    let charIndex = 0;
    const welcomeMessage = document.querySelector(".welcome-message");

    function typeMessage() {
        if (charIndex < messages[index].length) {
            welcomeMessage.textContent += messages[index].charAt(charIndex);
            charIndex++;
            setTimeout(typeMessage, 100);
        } else {
            setTimeout(deleteMessage, 2000); // Pause avant suppression
        }
    }

    function deleteMessage() {
        if (charIndex > 0) {
            welcomeMessage.textContent = messages[index].substring(0, charIndex - 1);
            charIndex--;
            setTimeout(deleteMessage, 50);
        } else {
            index = (index + 1) % messages.length;
            setTimeout(typeMessage, 500); // Pause avant le prochain message
        }
    }

    typeMessage();
});
