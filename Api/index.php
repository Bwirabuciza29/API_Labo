<?php
header('Content-Type: Application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: *');
header('Access-Control-Allow-Headers: *');
$user = md5('tplabo');
$mdp = md5('12345');
if ((isset($_GET['user']) && $_GET['user'] == 'tplabo' || isset($_GET['user']) && $_GET['user'] == $user)
    && (isset($_GET['mdp']) && $_GET['mdp'] == "12345" || isset($_GET['mdp']) && $_GET['mdp'] == $mdp)
) {
    require "./Routes/etudiant.php";
    require "./Routes/promotion.php";
    require "./Routes/options.php";
     require "./Routes/inscription.php";
     require "./Routes/annee.php";
     require "./Routes/all.php";
  
} else {

    $retour["message"] = "accès réfusé";
    echo json_encode($retour);
    exit;
}
