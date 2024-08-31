document.addEventListener("DOMContentLoaded", function() {
    // Fonction pour obtenir le message de bienvenue approprié selon l'heure
    function getGreetingMessage() {
        const hours = new Date().getHours();
        if (hours < 12) {
            return [
                "Bonjour!",
                "Guten Morgen!",
                "Good morning!",
                "¡Buenos días!",
                "صباح الخير!",
                "Доброе утро!",
                "Buongiorno!",
                "Bom dia!",
                "おはようございます!",
                "안녕하세요!",
                "早安!",
                "Bonjour!",
                "Selam!",
                "Merhaba!",
                "Xin chào!"
            ];
        } else if (hours < 19) {
            return [
                "Bon après-midi!",
                "Guten Tag!",
                "Good afternoon!",
                "¡Buenas tardes!",
                "مساء الخير!",
                "Добрый день!",
                "Buon pomeriggio!",
                "Boa tarde!",
                "こんにちは!",
                "안녕하세요!",
                "下午好!",
                "Guten Tag!",
                "Habari!",
                "Sawubona!",
                "Xin chào!"
            ];
        } else {
            return [
                "Bonsoir!",
                "Guten Abend!",
                "Good evening!",
                "¡Buenas noches!",
                "مساء الخير!",
                "Добрый вечер!",
                "Buona sera!",
                "Boa noite!",
                "こんばんは!",
                "안녕하세요!",
                "晚安!",
                "Guten Abend!",
                "Selam!",
                "Merhaba!",
                "Chúc buổi tối tốt lành!"
            ];
        }
    }

    const messages = getGreetingMessage();
    
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
