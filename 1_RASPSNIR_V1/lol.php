//   _        _______  _       
//  ( \      (  ___  )( \      
//  | (      | (   ) || (      
//  | |      | |   | || |      
//  | |      | |   | || |      
//  | |      | |   | || |      
//  | (____/\| (___) || (____/\
//  (_______/(_______)(_______/
//                             

<?php

require_once 'includes/bdd.php'; //Inclusion de la connexion au serveur SQL.
define("NOMBASE", "lol"); //Selection de la base de données.

try {
    $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
} catch (Excpetion $ex) {
    die('Pb connexion serveur BD' . $ex->getMessage());
}

$req = $bdd->prepare("select name, rank, leaguename, points FROM users ORDER BY points DESC"); //Préparation de la requete.
$req->execute() or die(print_r($req->errorInfo())); //Execution de la requete.

$id = 0;

while ($ligne = $req->fetch()) //A chaque detection de valeur, ecrit les valeurs.
{
	$name = htmlentities($ligne["name"], ENT_QUOTES);
	$rank = $ligne["rank"];
	$leaguename = htmlentities($ligne["leaguename"], ENT_QUOTES);
    $points = htmlentities($ligne["points"], ENT_QUOTES);
    $id++;
    $affichClassement .= "<li><div id=\"n$id\" class=\"collapsible-header\"><i id=\"n$id\" class=\"badge\">$id</i>$name - $rank</div>
    <div class=\"collapsible-body\"><br/><p>N°$id avec $points points</p></div></li>";
}

?>

<!DOCTYPE html>
<html>

    <head>
        <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>
        <meta charset="utf-8">
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
    <body>
        <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="http://i.imgur.com/gXzK0eL.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4">Voici le classement en fonction des joueurs en fonction des ranked 5v5</span>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                            <p>Here is some more information about this product that is only revealed once clicked on.</p>
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
