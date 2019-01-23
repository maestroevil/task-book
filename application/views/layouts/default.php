<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<!-- Css-Style -->
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Users Css -->
	<link rel="stylesheet" type="text/css" href="/resource/css/default-layots.css">
	<link rel="stylesheet" type="text/css" href="/resource/css/main.css">
	<link rel="stylesheet" type="text/css" href="/resource/css/content.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,300,400,500,700,700i" rel="stylesheet">
</head>
<body>
	
	<?php 
	include "/resource/layots-components/".$layout."/menu.php";
	?>
	<div class="content">
		<?php echo $content;?>
	</div>
	<?
	include "/resource/layots-components/".$layout."/footer.php";
	?>

	<!-- Scripts -->
	<!-- Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- User Scripts -->
	<script src="/resource/js/main.js"></script>
	<!-- Bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>