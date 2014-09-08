<?php include('sessions.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Website</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="page-wrap">
		<div id="header">
			<?php include('includes/nav.php'); ?>
		</div>

		<section>
			<div class="wrap">
				<div class="content">
					<?php

						$filename = 'includes/';
						$error_page = $filename . '404.php';
						$home_page = $filename . 'home.php';

						if(isset($_GET['page'])){
							$filename = $filename . $_GET['page'] . '.php';
							// $page = $_GET['page'];

							if(file_exists($filename)){
								$page = $filename;
							} else {
								$page = $error_page;
							}
						} else{
							$page = $home_page;
						}

						include($page); 
					?>					
				</div>
			</div>
		</section>
		
		<footer id="footer">
			<?php include('includes/footer.php'); ?>
		</footer>
	</div>

</body>
</html>