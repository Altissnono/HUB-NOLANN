document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('upload-form');

    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        // Afficher les données pour débogage
        formData.forEach((value, key) => {
            console.log(key, value);
        });

        const response = await fetch('upload.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (result.success) {
            alert('Musique ajoutée avec succès !');
            form.reset();
        } else {
            alert('Erreur : ' + result.error);
        }
    });
});
