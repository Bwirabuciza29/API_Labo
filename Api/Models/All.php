<?php

require_once("./Config.php");
class All
{
    public $response = array();

    // AFFICHER TOUT
    public static function get_all_All()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM InscViewer")->fetchAll();
        // ORDER BY Promotion DESC
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // COMPTER TOUTES LES INSCRIPTIONS SE TROUVANT DANS LA BASE DE DONNEES
    public static function compter_All()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM InscViewer")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // SELECTIONNER UN 
    public static function get_one_All($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM InscViewer WHERE Nom_Etudiant='$id'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // DENIER ENREGISTREMENT
    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM InscViewer ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
