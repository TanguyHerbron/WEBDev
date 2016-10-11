<?php

require_once 'includes/bdd.php';

define("NOMBASE", "games");

try {
    $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
} catch (Excpetion $ex) {
    die('Pb connexion serveur BD' . $ex->getMessage());
}

$req = $bdd->prepare("SELECT pseudo, score FROM tetris ORDER BY score DESC;");

$req->execute() or die(print_r($requete->errorInfo()));

$affichScore = "";
$id = 0;

while ($ligne = $req->fetch())
{
    $pseudo = htmlentities($ligne["pseudo"], ENT_QUOTES);
    $score = htmlentities($ligne["score"], ENT_QUOTES);
    $id++;
    $affichScore .= "<li><div id=\"n$id\" class=\"collapsible-header\"><i id=\"n$id\" class=\"badge\">$id</i>$pseudo</div>
    <div class=\"collapsible-body\"><br/><p>Total de points : $score</p></div></li>";
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
        <link rel="stylesheet" href="css/blockrain.css">

        <?php include 'includes/navbar.php'; ?>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <div class="game tetris"></div>
                </div>
                <div class="col s6">
                    <a id="pause" class="waves-effect waves-light btn blue darken-2 tetris-play">Pause</a>
                    <a id="resume" class="waves-effect waves-light btn blue darken-2 tetris-play">Continuer</a>
                    <a id="saveClick" class="waves-effect waves-light btn blue darken-2 tetris-play">Sauvegarder Score</a>
                    <form class="tetris-play" id="save" method="post" action="includes/validScoreTetris.php">
                        <h3>Sauvegarder votre magnifique score !</h3>
                        <blockquote>Faites attention à bien avoir terminé votre partie !</blockquote>
                        <blockquote>Veuillez entrer votre pseudo habituel, PAS DU BULLSHIT ! Sinon votre score sera supprimé. Je serais encore obligé de mettre un menu deroulant pour selectionner votre pseudo, et en vrai, j'ai grave la flemme.
                        </blockquote>
                        <input type="number" id="score" name="score" hidden/>
                        <label for="pseudo">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo"/>
                        <input class="waves-effect waves-light btn blue darken-2 tetris-play" type="submit" value="Valider"/>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="collapsible popout" data-collapsible="accordion">
                        <?php echo $affichScore; ?>
                    </ul>
                </div>
            </div>
        </div>

    </body>

    <?php include 'includes/footer.php'; ?>

    <script src="js/blockrain.jquery.js"></script>
    <script>
        $('#save').submit(function(){
            var score = $(".game").blockrain('score');
            $("input[name='score'").val(score);
            return;
        });
        $(document).ready(function(){
            $('#save').hide();
            $('#pause').hide();
            $('#resume').hide();
            $('.game').blockrain();
            var score = 0;

            $('.blockrain-start-btn').click(function(){
                $('#pause').show();
            });

            $('#pause').click(function(){
                $('.game').blockrain('pause');
                $('#pause').hide();
                $('#resume').show();
				$('.game').blockrain('controls', false);
            });

            $('#saveClick').click(function(){
                $(this).hide();
                $('#save').show();
            });

            $('#resume').click(function(){
                $('.game').blockrain('resume');
                $('#resume').hide();
                $('#pause').show();
				$('.game').blockrain('controls', true);
            });

        });

    </script>

</html>
