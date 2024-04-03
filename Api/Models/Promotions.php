<?php

require_once("./Config.php");

class Promotions
{
    public $response = array();

    public static function Enregistrer_Promotions($desProm)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO promotion (desProm) VALUES ('$desProm')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    public static function Supprimer_Promotions($id)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("DELETE FROM promotion WHERE id = '$id'")) {
            $response["message"] = "Suppression réussie";
            return $response;
        } else {
            $response["message"] = "Échec de suppression";
            return $response;
        }
    }

    public static function Modifier_Promotions($id, $desProm)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("UPDATE promotion SET desProm = '$desProm' WHERE id = '$id'")) {
            $response["message"] = "Modification réussie";
            return $response;
        } else {
            $response["message"] = "Échec de modification";
            return $response;
        }
    }

    public static function get_all_Promotions()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM promotion ORDER BY id DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function compter_promotions()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM promotion")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_one_promotions($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM promotion WHERE id='$id'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM promotion ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
