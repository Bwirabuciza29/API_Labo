<?php
require_once("./Models/Promotions.php");

//enregistrement
$retour = array();

function Enregistrer_Promotions()
{
    $desProm = isset($_POST["desProm"]) ? $_POST["desProm"] : '';
    $desProm = htmlspecialchars($desProm);
    $desProm = trim($desProm);

    // Vérifier si $desProm est vide après le nettoyage
    if (!empty($desProm)) {
        // Appel du modèle pour enregistrer la promotion
        return Promotions::Enregistrer_Promotions($desProm);
    } else {
        // Retourner une erreur si $desProm est vide
        return array("message" => "Le champ desProm ne peut pas être vide");
    }
}

//suppression
function Supprimer_Promotions()
{
    $id = $_POST["id"];
    return Promotions::Supprimer_Promotions($id);
}

//modification
function Modifier_Promotions()
{
    $desProm = isset($_POST["desProm"]) ? $_POST["desProm"] : '';
    $desProm = htmlspecialchars($desProm);
    $desProm = trim($desProm);

    // Vérifier si $desProm est vide après le nettoyage
    if (!empty($desProm)) {
        // Appel du modèle pour modifier la promotion
        return Promotions::Modifier_Promotions($desProm);
    } else {
        // Retourner une erreur si $desProm est vide
        return array("message" => "Le champ desProm ne peut pas être vide");
    }
}

function get_all_promotions()
{
    return Promotions::get_all_Promotions();
}

function compter_promotions()
{
    return Promotions::compter_promotions();
}

function get_one_promotions()
{
    $id = isset($_GET["id"]) ? $_GET["id"] : '';
    $id = htmlspecialchars($id);
    $id = trim($id);

    // Appel du modèle pour obtenir une promotion spécifique
    return Promotions::get_one_promotions($id);
}
