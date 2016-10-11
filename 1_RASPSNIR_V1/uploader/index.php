<!DOCTYPE html>
<html>

	<head>
        <link rel="shortcut icon" type="image/png" href="/raspsnir/img/favicon.ico"/>
		<meta charset="utf-8"/>
		<title>9SNIR upload</title>

		<!-- Google web fonts -->
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />

		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />
		
		<!-- CSS perso -->
        <link href="/raspsnir/css/materialize.min.css" rel="stylesheet">
        <link href="/raspsnir/css/style.css" rel="stylesheet">
		
		<?php include '/var/www/raspsnir/includes/navbar.php'; ?>
		
	</head>

	<body>
        <div id="top-image-fixe"></div>
		<div class="container">
			<div class="row">
			<br/>
			<br/>
				<div class="row">
					<div class="input-field col s4 offset-s4">
         					<input id="titre" type="text" name="titre" class="validate">
          					<label for="titre">Titre : </label>
        				</div>
				</div>
				<div class="col s4 offset-s4">
					<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">

						<div id="drop">
							Déposer ici

							<a>Sélectionner</a>
							<input type="file" name="upl" multiple />
						</div>

						<ul>
							<!-- The file uploads will be shown here -->
						</ul>
						
						<a>Envoyer</a>
						<input type="button" name="upl" multiple />

					</form>
				</div>
			</div>
		</div>
			
		<!-- JavaScript Includes -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="assets/js/script.js"></script>

	</body>
	
	
    <?php include '/var/www/raspsnir/includes/footer.php'; ?>
	
</html>