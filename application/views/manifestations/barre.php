<?php
$une = $uneseule[0];
// Récupération du nombre total de réservation de la manifestation
$nb = $une->totalresa;
// Récupération du nombre total de place disponible dans la salle
$max = $une->salle_place_max;
// On calcul le pourcentage de réservation en fonction du nombre de réservation et le nombre de places disponible
$pourcentage = round($nb / $max * 100);
$longueur = $pourcentage * 2;
// Si il y a plus de réservation que de place on affiche "Complet"
if ($pourcentage >= 100)
{
    $pourcent = 'Complet';
// Sinon on affiche le pourcentage
}else{
    $pourcent = $pourcentage."%";
}
// On crée l'image à partir de la libraire GD de PHP
header ("Content-type: image/png");
// On définit la taille de l'image
$image = imageCreate (400, 40);
// On définit la couleur de fond
$couleur_fond = imageColorAllocate ($image, 0, 0, 0);
// On définit la couleur du 1er plan
$couleur_bar = imageColorAllocate ($image, 255, 255, 255);
// On crée l'image
imagefilledrectangle ( $image, 10, 10, $longueur, 30, $couleur_bar);
// On définit le texte à afficher
$couleur_text = imageColorAllocate ($image, 50, 50, 50);
imagestring($image, 5, 30, 15, $pourcent, $couleur_text);
// On finalise la création de l'image en PNG
ImagePng ($image);
?>