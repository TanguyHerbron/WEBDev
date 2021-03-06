<?php

include('php-riot-api-master/php-riot-api.php');
include('php-riot-api-master/FileSystemCache.php');
require_once 'bdd.php';
define("NOMBASE", "lol");

$riot = new riotapi('euw');

$riotCache = new riotapi('euw', new FileSystemCache('cache/'));

try {
    $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
} catch (Excpetion $ex) {
    die('Pb connexion serveur BD' . $ex->getMessage());
}

/*
$req = $bdd->prepare("SELECT name FROM users");
$req->execute() or die(print_r($req->errorInfo()));

//maj des sumid
while ($ligne = $req->fetch())
{
    $name = strtolower($ligne['name']);
    try {
        $riotRequest = $riot->getSummonerByName($name);
        //print_r($riotRequest);
        //echo "<br/>";
    } catch(Exception $e) {
        echo "Error 1 : " . $e->getMessage();
    };
    $sumid = $riotRequest[$name]['id'];
    
    //echo $sumid;
    
    $reqID = $bdd->prepare("UPDATE users SET sumid = :sumid WHERE name = :name");
    $reqID->bindParam(':name', $name);
    $reqID->bindParam(':sumid', $sumid);
    $reqID->execute() or die(print_r($reqID->errorInfo()));
}*/

$req = $bdd->prepare("SELECT sumid FROM users");
$req->execute() or die(print_r($req->errorInfo()));

while ($ligne = $req->fetch())
{
    $sumid = $ligne['sumid'];
    
    try {
        $riotRequest = $riot->getLeague($sumid, "entry");
        echo "<pre>";
        print_r($riotRequest);
        echo "</pre>";
        echo "<br/>";
    } catch(Exception $e) {
        echo "Error 2 : " . $e->getMessage();
    };
    
    $multiplieur = 0;
    $score = 0;
    $points = 0;
    $leagueName = $riotRequest[$sumid][0]['name'];
    $tier = $riotRequest[$sumid][0]['tier'];
    $division = $riotRequest[$sumid][0]['entries'][0]['division'];
    
    switch($tier)
    {
        case "BRONZE":
            $multiplieur = 1;
            break;
            
        case "SILVER":
            $multiplieur = 10;
            break;
            
        case "GOLD":
            $multiplieur = 100;
            break;
            
        case "PLATINIUM":
            $multiplieur = 1000;
            break;
            
        case "DIAMOND":
            $multiplieur = 10000;
            break;
            
        case "MASTER":
            $multiplieur = 100000;
            break;
            
        case "CHALLENGER":
            $multiplieur = 1000000;
            break;
            
        default:
            $multiplieur = 0;
            break;
    }
    
    switch($division)
    {
        case "I":
            $score = 5;
            break;
            
        case "II":
            $score = 4;
            break;
            
        case "III":
            $score = 3;
            break;
            
        case "IV":
            $score = 2;
            break;
            
        case "V":
            $score = 1;
            break;
            
        default:
            $score = 25;
            break;
    }
    
    echo $score;
    
    $points = intval($score) * intval($multiplieur);
    
    $rank = $tier . " " . $division;
    
    $reqID = $bdd->prepare("UPDATE users SET rank = :rank, points = :points WHERE sumid = :sumid");
    $reqID->bindParam(':rank', $rank);
    $reqID->bindParam(':points', $points);
    $reqID->bindParam(':sumid', $sumid);
    $reqID->execute() or die(print_r($reqID->errorInfo()));
    
}
