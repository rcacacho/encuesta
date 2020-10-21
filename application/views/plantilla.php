<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo base_url('style/css/bootstrap.css') ?>">
	<script src="<?php echo base_url('style/js/jquery-3.5.1.min.js') ?>"></script>
	<script src="<?php echo base_url('style/js/jquery-3.5.1.js') ?>"></script>
	<title>Document</title>
</head>

<body>
	<div id="container">
		<?php
		$this->load->view($contenido);
		?>
	</div>
</body>

</html>
