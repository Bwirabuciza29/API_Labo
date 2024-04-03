<?php

require_once("./Config.php");

class Inscription
{
    public $response = array();
    public static function enregistrer_Inscription($idOpt, $idProm, $idEt, $idAnnee, $desInscription)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("INSERT INTO inscription(idOpt, idProm, idEt, idAnnee, desInscription) VALUES ('$idOpt', '$idProm', '$idEt', '$idAnnee', '$desInscription')")) {
            $response["message"] = "Enregistrement réussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Échec d'enregistrement";
            return $response;
        }
    }

    // SUPPRIMER INSCRIPTION
    public static function Supprimer_Inscription($idOpt, $idProm, $idEt, $idAnnee)
    {
        $data = get_connection();
        $response = array(); // Initialisez $response
        if ($data->query("DELETE FROM inscription WHERE idOpt = '$idOpt' AND idProm = '$idProm' AND idEt = '$idEt' AND idAnnee = '$idAnnee'")) {
            $response["message"] = "Suppression reussie";
            return $response;
        } else {
            $response["message"] = "Echec de suppression";
            return $response;
        }
    }

    // MODIFIER INSC
    public static function Modifier_Inscription($idOpt, $idProm, $idEt, $idAnnee, $desInscription)
    {
        $data = get_connection();
        $response = array(); // Définir $response comme un tableau
        if ($data->query("UPDATE inscription SET idOpt = '$idOpt', idProm='$idProm', idEt='$idEt',idAnnee='$idAnnee',desInscription='$desInscription' WHERE idOpt = '$idOpt' AND idProm = '$idProm' AND idEt = '$idEt' AND idAnnee = '$idAnnee'")) {
            $response["reussite"] = "Modification reussie";
            return $response;
        } else {
            $response["message"] = "Echec d'enregisrement";
            return $response;
        }
    }

    // AFFICHER TOUTES LES INSCRIPTIONS
    public static function get_all_Inscriptions()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM inscription ORDER BY idOpt DESC")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // COMPTER LES INSCRIPTIONS SE TROUVANT DANS LA BASE DE DONNEES
    public static function compter_inscription()
    {
        $data = get_connection();
        $donnees = $data->query("SELECT COUNT(id) as total FROM inscription")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }

    // SELECTIONNER UN SEUL ETUDIANT
    public static function get_one_inscription($id)
    {
        $data = get_connection();
        $donnees = $data->query("SELECT * FROM inscription WHERE idOpt='$id'")->fetchAll();
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
        $donnees = $data->query("SELECT * FROM inscription ORDER BY id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
