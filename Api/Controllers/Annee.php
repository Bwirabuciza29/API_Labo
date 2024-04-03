<?php
require_once("./Models/Annee.php");

//enregistrement
$retour = array();

function enregistrer() // Modifier le nom de la fonction pour correspondre au modèle
{
    $anneeAc = isset($_POST["anneeAc"]) ? $_POST["anneeAc"] = htmlspecialchars($_POST["anneeAc"]) : $_POST["anneeAc"] = trim($_POST["anneeAc"]);
    //appel model enregistrement option
    return Annee::enregistrer($anneeAc);
}

//suppression
function Supprimer_Annee()
{
    $id = $_POST["id"];
    return Annee::Supprimer_Annee($id);
}

//modification
function Modifier_Annee() // Vous devez implémenter cette fonction dans le modèle si elle est utilisée
{
    $anneeAc = isset($_POST["anneeAc"]) ? $_POST["anneeAc"] = htmlspecialchars($_POST["anneeAc"]) : $_POST["anneeAc"] = trim($_POST["anneeAc"]);

    //appel model modification option
    return Annee::Modifier_Annee($anneeAc);
}

function get_all_annee()
{
    return Annee::get_all_annee();
}

function compter_annee()
{
    return Annee::compter_annee();
}

function get_one_annee()
{
    $id = isset($_GET["id"]) ? $_GET["id"] = htmlspecialchars($_GET["id"]) : $_GET["id"] = trim($_GET["id"]);

    return Annee::get_one_annee($id);
}
