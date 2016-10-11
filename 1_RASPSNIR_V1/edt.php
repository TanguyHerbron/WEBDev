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
        <link href="css/styleedt.css" rel="stylesheet">

        <?php include 'includes/navbar.php'; ?>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="input-field col s12">
                    <table>
                        <tr>
                            <th class="z-depth-1" colspan="2">SNIR2</th>
                            <th class="z-depth-1" colspan="2">Lundi</th>
                            <th class="z-depth-1">Mardi</th>
                            <th class="z-depth-1">Mercredi</th>
                            <th class="z-depth-1">Jeudi</th>
                            <th class="z-depth-1">vendredi</th>                
                        </tr>
                        <tr>
                            <td>08h00</td>
                            <td>08h30</td>
                            <td colspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>08h30</td>
                            <td>09h00</td>
                            <td rowspan="4" class="info">Info<br/>Groupe 1<br/> B113</td>
                            <td rowspan="4" class="physique">Physique<br/>Groupe 2<br/>B020</td>
                            <td rowspan="8" class="info">Info<br/>B106-B108</td>
                            <td rowspan="8" class="info">Info<br/>B106-B108</td>                
                        </tr>
                        <tr>
                            <td>09h00</td>
                            <td>09h30</td>
                            <td rowspan="2" class="anglais">Anglais<br/>D121</td>
                            <td rowspan="2" class="economie">Eco gestion<br/>B114</td>
                        </tr>
                        <tr>
                            <td>09h30</td>
                            <td>10h00</td>
                        </tr>
                        <tr>
                            <td>10h00</td>
                            <td>10h30</td>
                            <td rowspan="4" class="info">Info<br/>B113</td>
                            <td rowspan="4" class="info">Info<br/>B113-B114</td>
                        </tr>
                        <tr>
                            <td>10h30</td>
                            <td>11h00</td>
                            <td rowspan="4" class="physique">Physique<br/>Groupe 1<br/>B020</td>
                            <td rowspan="4" class="info">Info<br/>Groupe 2<br/> B113</td>
                        </tr>
                        <tr>
                            <td>11h00</td>
                            <td>11h30</td>
                        </tr>
                        <tr>
                            <td>11h30</td>
                            <td>12h00</td>
                        </tr>
                        <tr>
                            <td>12h00</td>
                            <td>12h30</td>
                            <td rowspan="4">&nbsp;</td>
                            <td rowspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>12h30</td>
                            <td>13h00</td>
                            <td rowspan="3" colspan="2">&nbsp;</td>
                            <td rowspan="3">&nbsp;</td>
                            <td rowspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>13h00</td>
                            <td>13h30</td>
                        </tr>
                        <tr>
                            <td>13h30</td>
                            <td>14h00</td>
                        </tr>
                        <tr>
                            <td>14h00</td>
                            <td>14h30</td>
                            <td rowspan="2" colspan="2" class="maths">Maths<br/>C082</td>
                            <td rowspan="6" class="info">Info<br/>B106-B108</td>
                            <td rowspan="4" class="maths">Maths<br/>C408</td>
                            <td rowspan="4" class="physique">Physique<br/>B114</td>
                            <td rowspan="4" class="ap">AP<br/>B106-B108</td>
                        </tr>
                        <tr>
                            <td>14h30</td>
                            <td>15h00</td>
                        </tr>
                        <tr>
                            <td>15h00</td>
                            <td>15h30</td>
                            <td rowspan="2" colspan="2" class="anglais">Anglais<br/>D211</td>
                        </tr>
                        <tr>
                            <td>15h30</td>
                            <td>16h00</td>
                        </tr>
                        <tr>
                            <td>16h00</td>
                            <td>16h30</td>
                            <td rowspan="2" colspan="2" class="francais">Francais<br/>B114</td>
                            <td rowspan="4" class="francais">Francais<br/>B114</td>
                            <td rowspan="4">&nbsp;</td>
                            <td rowspan="4">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>16h30</td>
                            <td>17h00</td>
                        </tr>
                        <tr>
                            <td>17h00</td>
                            <td>17h30</td>
                            <td rowspan="2" colspan="2">&nbsp;</td>
                            <td rowspan="2">&nbsp;</td>
                        </tr>
                        <tr>
                            <td>17h30</td>
                            <td>18h00</td>
                        </tr>
                    </table>
                    <blockquote>
                        <a href="img/edt.png">Lien de l'emploi du temps au format PNG</a>
                    </blockquote>
                </div>
            </div>
        </div>
    </body>

    <?php include 'includes/footer.php'; ?>

</html>
