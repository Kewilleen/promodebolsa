<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Default Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Local Style -->
		<link rel="stylesheet" type="text/css" href="<?php echo website; ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo website; ?>assets/css/bootstrap.min.css">
		<!-- Remote Style -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
		<title>PromodeBolso - Homepage</title>
	</head>
	<body>
		<!-- Header -->
		<header class="header">
			<div class="mainmenu-area">
				<nav class="navbar navbar-expand-lg navbar-dark">
					<a class="navbar-brand" href="<?php echo website; ?>">
						PromodeBolso
						<!-- <img src="<?php echo website; ?>assets/img/logo.png" alt="Logo" class="logo-size"> -->
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse fixed-height" id="main_menu">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link active" href="<?php echo website; ?>">Início <div class="mr-hover-effect"></div></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!-- Caroussel -->
		<div id="carouselControl" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=888&amp;fg=555&amp;text=Second slide" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=Third slide" alt="Third slide">
				</div>
			</div>
		</div>
		<!-- Site footer -->
		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<p class="copyright-text">Copyright &copy; 2020 - <?php echo date("Y"); ?> Todos os direitos reservados.<br>
					Desenvolvido com 💕 por <a href="https://github.com/kewilleen" target="_blank">Kewi</a>
					</p>
				</div>
			</div>
		</footer>
		<!-- Temporary script -->
		<script src="http://holderjs.com/holder.js" type="text/javascript"></script>
		<!-- Default scripts -->
		<script src="<?php echo website; ?>assets/js/jquery-3.4.1.slim.min.js" type="text/javascript"></script>
		<script src="<?php echo website; ?>assets/js/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo website; ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
		<script src="<?php echo website; ?>assets/js/custom.js" type="text/javascript"></script>
	</body>
</html>