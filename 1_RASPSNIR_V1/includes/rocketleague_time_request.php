<?php

require_once 'bdd.php';
define("NOMBASE", "rocketleague");

$steamID[0] = "76561198067600018";
$steamID[1] = "76561198016425144";
$steamID[2] = "76561198020428089";
$steamID[3] = "76561198000314532";
$steamID[4] = "76561198192042329";
$steamID[5] = "76561198149485142";
$steamID[6] = "76561198107178129";
$steamID[7] = "76561198047498514";
$steamID[8] = "76561198070454596";

$tab[0] = "https://rocketleaguestats.com/profile/steam/".$steamID[0];
$tab[1] = "https://rocketleaguestats.com/profile/steam/".$steamID[1];
$tab[2] = "https://rocketleaguestats.com/profile/steam/".$steamID[2];
$tab[3] = "https://rocketleaguestats.com/profile/steam/".$steamID[3];
$tab[4] = "https://rocketleaguestats.com/profile/steam/".$steamID[4];
$tab[5] = "https://rocketleaguestats.com/profile/steam/".$steamID[5];
$tab[6] = "https://rocketleaguestats.com/profile/steam/".$steamID[6];
$tab[7] = "https://rocketleaguestats.com/profile/steam/".$steamID[7];
$tab[8] = "https://rocketleaguestats.com/profile/steam/".$steamID[8];



for ($i=0; $i <9; $i++)
{
    $url = $tab[$i];
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $html = curl_exec($ch);
    curl_close($ch);

    $dom = new DOMDocument();
    $dom->loadHTML($html);

    $strong = $dom->getElementsByTagName('strong');

    $solo = $strong->item(8)->nodeValue;
    $double =  $strong->item(9)->nodeValue;
    $solostandard = $strong->item(10)->nodeValue;
    $standard = $strong->item(11)->nodeValue;
    $id = $i+1;

    $sid = $steamID[$i];

    try {
        $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
    } catch (Excpetion $ex) {
        die('Pb connexion serveur BD' . $ex->getMessage());
    }
    
    $req = $bdd->prepare("UPDATE classement SET solo = :solo, rankedDouble = :double, solostandard = :solostandard, standard = :standard, url = :url, steamid = :steamid WHERE id = :id");
    $req->bindParam(":solo", $solo);
    $req->bindParam(":double", $double);
    $req->bindParam(":solostandard", $solostandard);
    $req->bindParam(":standard", $standard);
    $req->bindParam(":url", $url);
    $req->bindParam(":steamid", $sid);
    $req->bindParam(":id", $id);
    
    $req->execute() or die(print_r($requete->errorInfo()));

    $points=0;
    switch($solo)
    {
        case "Unranked":
            $points += 0;
            break;
        case "":
            $points += 0;
            break;
        case "Prospect I":
            $points += 1;
            break;
        case "Prospect II":
            $points += 2;
            break;
        case "Prospect III":
            $points += 3;
            break;
        case "Prospect Elite":
            $points += 4;
            break;
        case "Challenger I":
            $points += 5;
            break;
        case "Challenger II":
            $points += 6;
            break;
        case "Challenger III":
            $points += 7;
            break;
        case "Challenger Elite":
            $points += 8;
            break;
        case "Rising Star":
            $points += 9;
            break;
        case "Shooting Star":
            $points += 10;
            break;
        case "All-Star":
            $points += 11;
            break;
        case "Champion":
            $points += 12;
            break;
        case "Super Champion":
            $points += 13;
            break;
        case "Grand Champion":
            $points += 14;
            break;
        default:
            $points += 0;
            break;
    }
    switch($double)
    {
        case "Unranked":
            $points += 0;
            break;
        case "":
            $points += 0;
            break;
        case "Prospect I":
            $points += 1;
            break;
        case "Prospect II":
            $points += 2;
            break;
        case "Prospect III":
            $points += 3;
            break;
        case "Prospect Elite":
            $points += 4;
            break;
        case "Challenger I":
            $points += 5;
            break;
        case "Challenger II":
            $points += 6;
            break;
        case "Challenger III":
            $points += 7;
            break;
        case "Challenger Elite":
            $points += 8;
            break;
        case "Rising Star":
            $points += 9;
            break;
        case "Shooting Star":
            $points += 10;
            break;
        case "All-Star":
            $points += 11;
            break;
        case "Champion":
            $points += 12;
            break;
        case "Super Champion":
            $points += 13;
            break;
        case "Grand Champion":
            $points += 14;
            break;
        default:
            $points += 0;
            break;
    }
    switch($solostandard)
    {
        case "Unranked":
            $points += 0;
            break;
        case "":
            $points += 0;
            break;
        case "Prospect I":
            $points += 1;
            break;
        case "Prospect II":
            $points += 2;
            break;
        case "Prospect III":
            $points += 3;
            break;
        case "Prospect Elite":
            $points += 4;
            break;
        case "Challenger I":
            $points += 5;
            break;
        case "Challenger II":
            $points += 6;
            break;
        case "Challenger III":
            $points += 7;
            break;
        case "Challenger Elite":
            $points += 8;
            break;
        case "Rising Star":
            $points += 9;
            break;
        case "Shooting Star":
            $points += 10;
            break;
        case "All-Star":
            $points += 11;
            break;
        case "Champion":
            $points += 12;
            break;
        case "Super Champion":
            $points += 13;
            break;
        case "Grand Champion":
            $points += 14;
            break;
        default:
            $points += 0;
            break;
    }
    switch($standard)
    {
        case "Unranked":
            $points += 0;
            break;
        case "":
            $points += 0;
            break;
        case "Prospect I":
            $points += 1;
            break;
        case "Prospect II":
            $points += 2;
            break;
        case "Prospect III":
            $points += 3;
            break;
        case "Prospect Elite":
            $points += 4;
            break;
        case "Challenger I":
            $points += 5;
            break;
        case "Challenger II":
            $points += 6;
            break;
        case "Challenger III":
            $points += 7;
            break;
        case "Challenger Elite":
            $points += 8;
            break;
        case "Rising Star":
            $points += 9;
            break;
        case "Shooting Star":
            $points += 10;
            break;
        case "All-Star":
            $points += 11;
            break;
        case "Champion":
            $points += 12;
            break;
        case "Super Champion":
            $points += 13;
            break;
        case "Grand Champion":
            $points += 14;
            break;
        default:
            $points += 0;
            break;
    }
    $req = $bdd->prepare("UPDATE classement SET points = :points WHERE id = :id");
    $req->bindParam(":points", $points);
    $req->bindParam(":id", $id);
    $req->execute() or die(print_r($requete->errorInfo()));

}