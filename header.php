<?php
$headerContent = <<< EOPAGE
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Registration</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width">
		<script type="text/javascript" src="./js/form-validation.js"></script>
		<script type="text/javascript" src="./js/jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="./css/style.css">
		<link rel="stylesheet" type="text/css" href="./css/jquery-ui.theme.min.css">
		<link rel="stylesheet" type="text/css" href="./css/jquery-ui.structure.min.css">
		<link rel="stylesheet" type="text/css" href="./css/jquery-ui.theme.min.css">
		<script>
			$( function() {
				$( "#state" ).selectmenu().selectmenu().selectmenu( "menuWidget" ).addClass( "overflow" );
				$( ".widget input[type=submit], .widget a, .widget button" ).button();
				$( "button, input, a" ).click( function( event ) {
					event.preventDefault();
				} );
			} );
		</script>
	</head>
	<body>
EOPAGE;
?>
