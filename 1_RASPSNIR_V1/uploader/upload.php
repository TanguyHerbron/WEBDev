<?php

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.md5($_FILES['upl']['name'].date("d-m-Y h:i:s")).".".$extension)){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;