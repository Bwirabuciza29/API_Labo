<?php
require_once("./Models/All.php");

// Enregistrement
$retour = array();

function get_all_All() {
    return All::get_all_All();
}

function compter_all() {
    return All::compter_all();
}

function get_one_all() {
    $Nom_Etudiant = isset($_GET["Nom_Etudiant"]) ? $_GET["Nom_Etudiant"] : "";
    $Nom_Etudiant = htmlspecialchars($Nom_Etudiant);
    return All::get_one_all($Nom_Etudiant);
}
?>
