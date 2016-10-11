<?php

require_once 'includes/bdd.php';

define("NOMBASE", "rocketleague");

try {
    $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
} catch (Excpetion $ex) {
    die('Pb connexion serveur BD' . $ex->getMessage());
}

$req = $bdd->prepare("SELECT nom, pseudo, points, url, steamid FROM classement ORDER BY points DESC");

$req->execute() or die(print_r($requete->errorInfo()));

$affichClassement = "";
$id = 0;

while ($ligne = $req->fetch())
{
	$url = htmlentities($ligne["url"], ENT_QUOTES);
	$steamid = htmlentities($ligne["steamid"], ENT_QUOTES);
	$nom = htmlentities($ligne["nom"], ENT_QUOTES);
    $pseudo = htmlentities($ligne["pseudo"], ENT_QUOTES);
    $points = htmlentities($ligne["points"], ENT_QUOTES);
    $id++;
    $affichClassement .= "<li>
                            <div id=\"n$id\" class=\"collapsible-header\"><span class=\"badge\" id=\"n$id\">$id</span>$nom - \"$pseudo\"</div>
                            <div class=\"collapsible-body\"><a href=\"$url\"><img src=\"http://signature.rocketleaguestats.com/normal/steam/$steamid.png\" /></a><br/><p>Total de points :$points</p></div>
                            </li>";
}

?>


<!DOCTYPE html>
<html>

    <head>

        <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Portail RaspSnir/RaspBiyou</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/materialize.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <?php include 'includes/navbar.php'; ?>

    </head>
    <body class="HS">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-image">
                            <img src="http://cdn.akamai.steamstatic.com/steam/apps/252950/ss_962a25a5e9ab7d19df03ffa7c7f7693ba562e787.600x338.jpg?t=1456872237">
                        </div>
                        <div class="card-action">
                            <a href="#">Classement Rocketleague de la classe </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible collection" data-collapsible="accordion">
                        <?php echo $affichClassement;?>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    <?php include 'includes/footer.php'; ?>

</html>
