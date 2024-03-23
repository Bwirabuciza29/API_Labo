<?php
require_once("./Models/Etudiant.php");
//enregistrement
$retour = array();
function Enregistrer_Etudiant()
{
    $noms = isset($_POST["noms"]) ? $_POST["noms"] = htmlspecialchars($_POST["noms"]) : $_POST["noms"] = trim($_POST["noms"]);
    $genre = isset($_POST["genre"]) ? $_POST["genre"] = htmlspecialchars($_POST["genre"]) : $_POST["genre"] = trim($_POST["genre"]);
    $lieu = isset($_POST["lieu"]) ? $_POST["lieu"] = htmlspecialchars($_POST["lieu"]) : $_POST["lieu"] = trim($_POST["lieu"]);
    $datenaissance = isset($_POST["datenaissance"]) ? $_POST["datenaissance"] = htmlspecialchars($_POST["datenaissance"]) : $_POST["datenaissance"] = trim($_POST["datenaissance"]);
    $adresse = isset($_POST["adresse"]) ? $_POST["adresse"] = htmlspecialchars($_POST["adresse"]) : $_POST["adresse"] = trim($_POST["adresse"]);

    //appel model nregistrement agent
    return Etudiant::enregistrer_Etudiant($noms, $genre, $lieu, $datenaissance, $adresse);
}
//suppression
function Supprimer_Etudiant()
{
    $id = $_POST["matricule"];
    return Etudiant::Supprimer_Etudiant($id);
}
//modification
function Modifier_Etudiant()
{
    $id = isset($_POST["matricule"]) ? $_POST["matricule"] = htmlspecialchars($_POST["matricule"]) : $_POST["matricule"] = trim($_POST["matricule"]);
    $noms = isset($_POST["noms"]) ? $_POST["noms"] = htmlspecialchars($_POST["noms"]) : $_POST["noms"] = trim($_POST["noms"]);
    $genre = isset($_POST["genre"]) ? $_POST["genre"] = htmlspecialchars($_POST["genre"]) : $_POST["genre"] = trim($_POST["genre"]);
    $lieu = isset($_POST["lieu"]) ? $_POST["lieu"] = htmlspecialchars($_POST["lieu"]) : $_POST["lieu"] = trim($_POST["lieu"]);
    $datenaissance = isset($_POST["datenaissance"]) ? $_POST["datenaissance"] = htmlspecialchars($_POST["datenaissance"]) : $_POST["datenaissance"] = trim($_POST["datenaissance"]);
    $adresse = isset($_POST["adresse"]) ? $_POST["adresse"] = htmlspecialchars($_POST["adresse"]) : $_POST["adresse"] = trim($_POST["adresse"]);

    return Etudiant::Modifier_Etudiant($id, $matricule, $noms, $genre, $lieu, $datenaissance, $adresse);
}
function get_all_etudiant()
{
    return Etudiant::get_all_Etudiant();
}
function compter_etudiant()
{
    return Etudiant::compter_etudiant();
}
function get_one_etudiant()
{
    $id = isset($_GET["matricule"]) ? $_POST["matricule"] = htmlspecialchars($_POST["matricule"]) : $_POST["matricule"] = trim($_POST["matricule"]);

    return Etudiant::get_one_etudiant($id);
}
