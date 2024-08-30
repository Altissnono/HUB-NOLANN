<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une musique</title>
    <link rel="stylesheet" href="style/admin.css">
</head>
<body>
    <div class="container">
        <h1>Ajouter une musique</h1>
        <form id="upload-form" enctype="multipart/form-data">
            <label for="title">Titre:</label>
            <input type="text" id="title" name="title" required>

            <label for="artist">Artiste:</label>
            <input type="text" id="artist" name="artist" required>

            <label for="album-art">Image de l'album:</label>
            <input type="file" id="album-art" name="album-art" accept="image/*" required>

            <label for="audio-file">Fichier audio:</label>
            <input type="file" id="audio-file" name="audio-file" accept="audio/*" required>

            <label for="date">Date de sortie:</label>
            <input type="date" id="date" name="date" required>

            <label for="style">Style:</label>
            <input type="text" id="style" name="style" required>

            <label for="creator">Créateur:</label>
            <input type="text" id="creator" name="creator" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="category">Catégorie:</label>
            <select id="category" name="category" required>
                <option value="instrumental">Instrumental</option>
                <option value="vocal">Vocal</option>
            </select>

            <button type="submit">Ajouter la musique</button>
        </form>
    </div>
    <script src="js/admin.js"></script>
</body>
</html>
