<?php
// Inclure le fichier de configuration
$config = require('config.php');

// Dossier contenant les photos
$photoDir = 'photos/';

// Fonction pour supprimer les métadonnées EXIF des fichiers JPEG
function stripExif($filePath) {
    $info = getimagesize($filePath);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($filePath);
        if ($image) {
            imagejpeg($image, $filePath, 100); // Écrase l'image d'origine avec une qualité de 100 (sans métadonnées)
            imagedestroy($image);
        }
    }
}

// Fonction pour vérifier le format d'image et appliquer les opérations nécessaires
function processImage($filePath) {
    $info = getimagesize($filePath);
    switch ($info['mime']) {
        case 'image/jpeg':
            stripExif($filePath);
            break;
        case 'image/png':
            // Pour les PNG, vous pourriez ajouter du code ici pour d'autres opérations si nécessaire
            break;
        case 'image/gif':
            // Pour les GIF, vous pourriez ajouter du code ici pour d'autres opérations si nécessaire
            break;
        default:
            // Pour les formats non pris en charge, ne rien faire
            break;
    }
}

// Authentification HTTP Basic avec cURL
function authenticateBasic($url, $username, $password) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt'); // Stocke les cookies de session
    curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt'); // Utilise les cookies de session
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Suit les redirections

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Erreur cURL : ' . curl_error($ch);
    }
    curl_close($ch);

    return $response;
}

// URL de la zone protégée
$protectedUrl = 'https://hub.nolannthuillier.fr/photo/photos/'; // Remplacez par l'URL correcte

// Authentifier et vérifier la réponse
$response = authenticateBasic($protectedUrl, $config['username'], $config['password']);
if (strpos($response, 'Unauthorized') !== false) {
    die('Échec de l\'authentification');
}

// Récupérer tous les fichiers du dossier
$files = array_diff(scandir($photoDir, SCANDIR_SORT_DESCENDING), array('.', '..'));

// Filtrer les fichiers pour ne garder que les images (extensions JPEG, PNG, GIF)
$images = array_filter($files, function($file) use ($photoDir) {
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, $extensions);
});

// Traiter les images (supprimer les métadonnées pour les JPEG)
foreach ($images as $image) {
    processImage($photoDir . $image);
}

// Nombre d'images à charger par lot
$imagesPerLoad = 9; // Modifier ce nombre selon les besoins
$initialImages = array_slice($images, 0, $imagesPerLoad);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galerie Photo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #000;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        .header {
            width: 100%;
            background: #333;
            padding: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.3);
            z-index: 1000;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header a {
            color: #00bcd4;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border: 2px solid #00bcd4;
            border-radius: 5px;
            margin-left: auto;
            transition: background 0.3s, color 0.3s;
        }
        .header a:hover {
            background: #00bcd4;
            color: #fff;
        }
        .gallery {
            margin-top: 60px; /* Pour accommoder l'en-tête fixe */
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 images par rangée */
            gap: 10px;
        }
        .gallery img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            object-fit: cover;
            display: block;
            loading: lazy; /* Lazy loading */
        }
        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0,0,0,0.4);
        }
    </style>
    <script>
        let page = 1;
        const imagesPerLoad = <?php echo $imagesPerLoad; ?>;
        const totalImages = <?php echo count($images); ?>;

        // Charger plus d'images lorsque l'utilisateur fait défiler la page
        window.addEventListener('scroll', function() {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                loadMoreImages();
            }
        });

        function loadMoreImages() {
            if ((page * imagesPerLoad) >= totalImages) return;

            page++;
            fetch(`load_images.php?page=${page}&imagesPerLoad=${imagesPerLoad}`)
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.gallery').insertAdjacentHTML('beforeend', data);
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <div class="header">
        <h1>Galerie Photo</h1>
        <a href="index.php">Retour au Hub</a>
    </div>
    <div class="gallery">
        <?php foreach ($initialImages as $image): ?>
            <img src="<?php echo htmlspecialchars($photoDir . $image); ?>" alt="<?php echo htmlspecialchars($image); ?>" loading="lazy">
        <?php endforeach; ?>
    </div>
</body>
</html>
