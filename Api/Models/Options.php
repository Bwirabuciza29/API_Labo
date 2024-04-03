<?php

require_once("./Config.php");

class Options
{
    public $response = array();

    public static function Enregistrer_Option($desOption)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO options_prom (desOption) VALUES ('$desOption')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    public static function Supprimer_Option($id)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("DELETE FROM options_prom WHERE id = '$id'")) {
            $response["message"] = "Suppression réussie";
            return $response;
        } else {
            $response["message"] = "Échec de suppression";
            return $response;
        }
    }

    public static function Modifier_Option ($id, $desOption)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("UPDATE options_prom SET desOption = '$desOption' WHERE id = '$id'")) {
            $response["message"] = "Modification réussie";
            return $response;
        } else {
            $response["message"] = "Échec de modification";
            return $response;
        }
    }

    public static function get_all_Option()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM options_prom ORDER BY id DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function compter_option()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM options_prom")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    public static function get_one_option($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM options_prom WHERE id='$id'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM options_prom ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
