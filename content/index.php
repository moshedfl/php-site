
<?php

	include '../includes/db_connection.php';
	include '../includes/functions.php';
	include '../includes/class.user.php';
	
	$username = ($_SESSION[User][User_name]);
	if(isset($_POST[User_logged_out])){
		setcookie('old_user', $username,time() -3600, "/");
		unset($_SESSION[User],$_SESSION[history]);
	}

	if(!$_SESSION[User]){
		header("Location:../");
	}

	if(isset($_GET[page_slug])){
		$page_slug = $_GET['page_slug'];
	}else{
		$page_slug = 'home';
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>
			<?= $page_slug ?>
        </title>
		<!-- Required meta tags -->
        <meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php include '../includes/link.php';?>
		<!--tap icon-->
		<link rel="icon" href="../includes/icons/<?= $page_slug ?>s.png">
		
	</head>
	<body>
	
		<header>
		<?php include '../includes/header.php';?>
	</header>
	
	<main>
		<?php
          include ($page_slug.'.php');
        ?>		
	</main>

	<footer>
		<?php include '../includes/footer.php';?>
	</footer>		
	</body>
</html>