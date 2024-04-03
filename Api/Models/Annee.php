<?php

require_once("./Config.php");

class Annee
{
    public $response = array();

    public static function Enregistrer_Annee($anneeAc)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO annee_academ (anneeAc) VALUES ('$anneeAc')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    public static function Supprimer_Annee($id)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("DELETE FROM annee_academ WHERE id = '$id'")) {
            $response["message"] = "Suppression réussie";
            return $response;
        } else {
            $response["message"] = "Échec de suppression";
            return $response;
        }
    }


    public static function get_all_Annee()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM annee_academ ORDER BY id DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function compter_annee()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM annee_academ")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_one_annee($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM annee_academ WHERE id='$id'")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_last()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM annee_academ ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
