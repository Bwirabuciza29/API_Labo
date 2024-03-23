<?php

require_once("./Config.php");

class Etudiant
{
    public $response = array();
    public static function enregistrer_Etudiant ($noms, $genre, $lieu, $datenaissance, $adresse)
    {
        $data = get_connection();
        $ps = $data->prepare("INSERT INTO compteur_id(sexe) VALUES(?)");
        $params = array( $genre);
        $ps->execute($params);
        $LastId = $data->prepare("SELECT * FROM compteur_id ORDER BY id DESC LIMIT 1");
        $LastId->execute();
        $result = $LastId->fetch(PDO::FETCH_OBJ);
        $idEtudiant = "I00SO0C00G00M" . $result->sexe . $result->id;

        if ($data->query("INSERT INTO etudiant(matricule,noms,genre,lieu,datenaissance,adresse) VALUES ('$idEtudiant','$noms', '$genre', '$lieu', '$datenaissance', '$adresse')")) {
            $response["message"] = "Enregistrement reussi";
            $response["Dernier_Enregistrement"] = self::get_last();
            return $response;
        } else {
            $response["message"] = "Echec d'enregistrement";
            return $response;
        }
    }
    // SUPPRIMER ETUDIANT
    public static function Supprimer_Etudiant($id)
    {
        $data = get_connection();
        if ($data->query("DELETE FROM etudiant WHERE matricule = '$id'")) {
            $response["message"] = "Suppression reussie";
            return $response;
        } else {
            $response["message"] = "Echec de suppression";
            return $response;
        }
    }
// MODIFIER ETUDIANT
    public static function Modifier_Etudiant($idEtudiant,$noms, $genre, $lieu, $datenaissance, $adresse)
    {
        $data = get_connection();
        if ($data->query("UPDATE etudiant SET noms = '$noms', genre='$genre', lieu='$lieu',datenaissance='$datenaissance',adresse='$adresse' WHERE matricule=$idEtudiant'$'")) {
            $response["reussite"] = "Modification reussie";
            return $response;
        } else {
            $response["message"] = "Echec d'enregisrement";
            return $response;
        }
    }
// AFFICHER TOUT LES ETUDIANTS
    public static function get_all_Etudiant()
    {
        $data = get_connection();
        $donnees = $data->query("select * from etudiant order by id desc")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }
    // COMPTER LES ETUDIANTS SE TROUVANT DANS LA BASE DE DONNEES
    public static function compter_etudiant()
    {
        $data = get_connection();
        $donnees = $data->query(" SELECT count(id) as total from etudiant")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        } else {
            $response["message"] = "Aucune donnée disponible";
            return $response;
        }
    }
    // SELECTIONNER UN SEUL ETUDIANT
    public static function get_one_etudiant($id)
    {
        $data = get_connection();
        $donnees = $data->query("select * from etudiant where matricule='$id'")->fetchAll();
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
        $donnees = $data->query("SELECT * from etudiant ORDER by id DESC LIMIT 1")->fetchAll();
        if (count($donnees) > 0) {
            return $donnees;
        }
    }
}
