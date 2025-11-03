document.addEventListener('DOMContentLoaded', () => {
    const welcomeMessage = document.querySelector('.hero__greeting-message');

    if (!welcomeMessage) {
        return;
    }

    const greetings = (() => {
        const hour = new Date().getHours();

        if (hour < 12) {
            return [
                'Bonjour !',
                'Good morning !',
                'Buenos días !',
                'Guten Morgen !',
                'Buongiorno !',
                'おはようございます！',
                'Bom dia !'
            ];
        }

        if (hour < 19) {
            return [
                'Bon après-midi !',
                'Good afternoon !',
                'Buenas tardes !',
                'Guten Tag !',
                'Boa tarde !',
                'Buon pomeriggio !',
                'こんにちは！'
            ];
        }

        return [
            'Bonsoir !',
            'Good evening !',
            'Buenas noches !',
            'Guten Abend !',
            'Boa noite !',
            'Buona sera !',
            'こんばんは！'
        ];
    })();

    let messageIndex = 0;
    let charIndex = 0;

    welcomeMessage.textContent = '';

    const typeMessage = () => {
        const current = greetings[messageIndex];

        if (charIndex < current.length) {
            welcomeMessage.textContent += current.charAt(charIndex);
            charIndex += 1;
            setTimeout(typeMessage, 90);
        } else {
            setTimeout(deleteMessage, 2200);
        }
    };

    const deleteMessage = () => {
        if (charIndex > 0) {
            welcomeMessage.textContent = welcomeMessage.textContent.slice(0, -1);
            charIndex -= 1;
            setTimeout(deleteMessage, 45);
        } else {
            messageIndex = (messageIndex + 1) % greetings.length;
            setTimeout(typeMessage, 600);
        }
    };

    typeMessage();
});
