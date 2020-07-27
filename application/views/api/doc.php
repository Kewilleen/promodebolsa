<!DOCTYPE html>
<html>
<head>
		<!-- Default Meta -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Local Style -->
		<link rel="stylesheet" type="text/css" href="<?php echo website; ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php echo website; ?>assets/css/bootstrap.min.css">
		<!-- Remote Style -->
	<title>PromodeBolso - DOC</title>
</head>
<body>
	<section class="mx-3 my-2">
		<div class="text-white">
			<h4>Ver o número sorteado para o usuário:</h4>
			<p>[GET] <?php echo website; ?>api/v1/{userId}/drawn</p>
		</div>
	</section>
	<section class="mx-3 my-2">
		<div class="text-white">
			<h4>Sortear um número para o usuário:</h4>
			<p>[GET] <?php echo website; ?>api/v1/{userId}/draw</p>
		</div>
	</section>
	<section class="mx-3 my-2">
		<div class="text-white">
			<h4>Criar usuário:</h4>
			<p><b>[POST]</b> <?php echo website; ?>api/v1/user</p>
			<pre class="text-white">int `id`</pre>
		</div>
	</section>
		<!-- Default scripts -->
		<script src="<?php echo website; ?>assets/js/jquery-3.4.1.slim.min.js" type="text/javascript"></script>
		<script src="<?php echo website; ?>assets/js/popper.min.js" type="text/javascript"></script>
		<script src="<?php echo website; ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo website; ?>assets/js/custom.js" type="text/javascript"></script>
	</body>
</html>