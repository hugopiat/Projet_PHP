<?php
// ~/php/tp1/public/Streamers.php
//include database
include __DIR__ . '/../Database/db.php';
// include model
include __DIR__ . '/../Model/Streamers.php';

$Streamer_id = htmlspecialchars($_GET["id"]);

if( array_key_exists($Streamer_id-1, $Streamers)) {
    $Streamer = $Streamers[$Streamer_id-1];
}
else{
    page_not_found();
}

function page_not_found()
{
    header("HTTP/1.0 404 Not Found "); //On définit la page comme étant une page 404 au sein de l’entête
    include __DIR__ . '/../view/404.php'; // On ajoute la vue de la page 404
    die(); // arrête l’exécution du script
};

// include view
include __DIR__ . '/../View/StreamersStats.php';
?>