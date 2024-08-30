<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

$request = Request::createFromGlobals();

if ($request->isMethod('POST')) {
    $title = $request->request->get('title');
    $artist = $request->request->get('artist');
    $date = $request->request->get('date');
    $style = $request->request->get('style');
    $creator = $request->request->get('creator');
    $description = $request->request->get('description');
    $category = $request->request->get('category');

    // Vérifier si les fichiers sont présents
    $albumArt = $request->files->get('album-art');
    $audioFile = $request->files->get('audio-file');

    if ($albumArt instanceof UploadedFile && $audioFile instanceof UploadedFile) {
        $albumArtPath = 'musique/images/' . uniqid() . '.' . $albumArt->guessExtension();
        $audioFilePath = 'musique/musics/' . uniqid() . '.' . $audioFile->guessExtension();

        // Déplacer les fichiers vers les répertoires appropriés
        try {
            $albumArt->move('musique/images', $albumArtPath);
            $audioFile->move('musique/musics', $audioFilePath);

            // Connexion à la base de données
            $pdo = new PDO(
                'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_DATABASE'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD']
            );

            // Préparer et exécuter la requête SQL
            $stmt = $pdo->prepare('
                INSERT INTO music (title, artist, album_art, audio_file, date, style, creator, description, category) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ');
            $stmt->execute([
                $title, 
                $artist, 
                $albumArtPath, 
                $audioFilePath, 
                $date, 
                $style, 
                $creator, 
                $description, 
                $category
            ]);

            echo json_encode(['success' => true]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => 'Erreur lors de l\'enregistrement des fichiers : ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Fichiers manquants ou invalides.']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Méthode non autorisée.']);
}
?>
