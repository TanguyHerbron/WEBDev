<?php 

require_once 'bdd.php';

define("NOMBASE", "games");

$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];
$mdp = sha1($mdp);
$server = $_SERVER['HTTP_REFERER'];

if($server == 'http://raspbiyou.ddns.net/raspsnir/tetris.php' || $server == 'http://192.168.1.45/raspsnir/tetris.php')
{
    try {
        $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
    } catch (Excpetion $ex) {
        die('Pb connexion serveur BD' . $ex->getMessage());
    }
    
    $req = $bdd->prepare("SELECT mdp FROM pseudo WHERE pseudo like :pseudo LIMIT 1");
    $req->bindParam(":pseudo", $pseudo);
    $req->execute() or die(print_r($requete->errorInfo()));
}


