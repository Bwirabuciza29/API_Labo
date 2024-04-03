<?php
require_once("./Models/Inscription.php");
//enregistrement
$retour = array();
function Enregistrer_Inscription()
{
    $idOpt = isset($_POST["idOpt"]) ? $_POST["idOpt"] = htmlspecialchars($_POST["idOpt"]) : $_POST["idOpt"] = trim($_POST["idOpt"]);
    $idProm = isset($_POST["idProm"]) ? $_POST["idProm"] = htmlspecialchars($_POST["idProm"]) : $_POST["idProm"] = trim($_POST["idProm"]);
    $idEt = isset($_POST["idEt"]) ? $_POST["idEt"] = htmlspecialchars($_POST["idEt"]) : $_POST["idEt"] = trim($_POST["idEt"]);
    $idAnnee = isset($_POST["idAnnee"]) ? $_POST["idAnnee"] = htmlspecialchars($_POST["idAnnee"]) : $_POST["idAnnee"] = trim($_POST["idAnnee"]);
    $desInscription = isset($_POST["desInscription"]) ? $_POST["desInscription"] = htmlspecialchars($_POST["desInscription"]) : $_POST["desInscription"] = trim($_POST["desInscription"]);

    //appel model nregistrement agent
    return Inscription::Enregistrer_Inscription($idOpt, $idProm, $idEt, $idAnnee, $desInscription);
}
//suppression
function Supprimer_Inscription()
{
    $idOpt = $_POST["idOpt"];
    $idProm = $_POST["idProm"];
    $idEt = $_POST["idEt"];
    $idAnnee = $_POST["idAnnee"];
    return Inscription::Supprimer_Inscription($idOpt, $idProm, $idEt, $idAnnee);
}
//modification
function Modifier_Inscription()
{
     $idOpt = isset($_POST["idOpt"]) ? $_POST["idOpt"] = htmlspecialchars($_POST["idOpt"]) : $_POST["idOpt"] = trim($_POST["idOpt"]);
    $idProm = isset($_POST["idProm"]) ? $_POST["idProm"] = htmlspecialchars($_POST["idProm"]) : $_POST["idProm"] = trim($_POST["idProm"]);
    $idEt = isset($_POST["idEt"]) ? $_POST["idEt"] = htmlspecialchars($_POST["idEt"]) : $_POST["idEt"] = trim($_POST["idEt"]);
    $idAnnee = isset($_POST["idAnnee"]) ? $_POST["idAnnee"] = htmlspecialchars($_POST["idAnnee"]) : $_POST["idAnnee"] = trim($_POST["idAnnee"]);
    $desInscription = isset($_POST["desInscription"]) ? $_POST["desInscription"] = htmlspecialchars($_POST["desInscription"]) : $_POST["desInscription"] = trim($_POST["desInscription"]);

    return Inscription::Modifier_Inscription($idOpt, $idProm, $idEt, $idAnnee, $desInscription);
}
function get_all_inscription()
{
    return Inscription::get_all_inscriptions();
}
function compter_inscription()
{
    return Inscription::compter_inscription();
}
function get_one_inscription()
{
    $idOpt = isset($_GET["idOpt"]) ? $_POST["idOpt"] = htmlspecialchars($_POST["idOpt"]) : $_POST["idOpt"] = trim($_POST["idOpt"]);

    return Inscription::get_one_inscription($idOpt);
}
