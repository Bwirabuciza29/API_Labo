<?php
require_once("./Models/Options.php");

//enregistrement
$retour = array();

function Enregistrer_Option()
{
    $desOption = isset($_POST["desOption"]) ? $_POST["desOption"] = htmlspecialchars($_POST["desOption"]) : $_POST["desOption"] = trim($_POST["desOption"]);
    //appel model enregistrement option
    return Options::Enregistrer_Option($desOption);
}

//suppression
function Supprimer_Option()
{
    $id = $_POST["id"];
    return Options::Supprimer_Option($id);
}

//modification
function Modifier_Option()
{
    $desOption = isset($_POST["desOption"]) ? $_POST["desOption"] = htmlspecialchars($_POST["desOption"]) : $_POST["desOption"] = trim($_POST["desOption"]);

    //appel model modification option
    return Options::Modifier_Option($desOption);
}

function get_all_option()
{
    return Options::get_all_Option();
}

function compter_option()
{
    return Options::compter_option();
}

function get_one_option()
{
    $id = isset($_GET["id"]) ? $_GET["id"] = htmlspecialchars($_GET["id"]) : $_GET["id"] = trim($_GET["id"]);

    return Options::get_one_option($id);
}
