<?php

require_once 'bdd.php';

define("NOMBASE", "games");

$score = $_POST['score'];
$pseudo = $_POST['pseudo'];
$server = $_SERVER['HTTP_REFERER'];
echo $server . "<br/>";

if($server == 'http://raspbiyou.ddns.net/raspsnir/tetris.php' || $server == 'http://192.168.1.45/raspsnir/tetris.php')
   {
       try {
           $bdd = new PDO('mysql:host=' . HOTE . ';dbname=' . NOMBASE, LOGIN, MDP);
       } catch (Excpetion $ex) {
           die('Pb connexion serveur BD' . $ex->getMessage());
       }

       $req = $bdd->prepare("SELECT 1 FROM tetris WHERE pseudo like :pseudo LIMIT 1");
       $req->bindParam(":pseudo", $pseudo);
       $req->execute() or die(print_r($requete->errorInfo()));

       while ($ligne = $req->fetch())
       {
           $nb = $ligne['1'];
       }

       if ($nb != false)
       {
           $req = $bdd->prepare("SELECT score FROM tetris WHERE pseudo like :pseudo");
           $req->bindParam(":pseudo", $pseudo);
           $req->execute() or die(print_r($requete->errorInfo()));
           while ($ligne = $req->fetch())
           {
               $SQLScore = $ligne['score'];
           }
           if ($score > $SQLScore)
           {
               $req = $bdd->prepare("UPDATE tetris SET score = :score WHERE pseudo LIKE :pseudo");
               $req->bindParam(":pseudo", $pseudo);
               $req->bindParam(":score", $score);
               $req->execute() or die(print_r($requete->errorInfo()));
           }
       }
       else
       {
           $req = $bdd->prepare("INSERT INTO tetris (pseudo, score) VALUES (:pseudo, :score)");
           $req->bindParam(":pseudo", $pseudo);
           $req->bindParam(":score", $score);
           $req->execute() or die(print_r($requete->errorInfo()));
       }


       echo $pseudo . " " . $score;

   }
   else
   {
       echo "Bien tenté";
   }
