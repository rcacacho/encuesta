<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<title>Configuracion</title>
</head>

<body>

	<div class="jumbotron">
		<h1>Bootstrap Tutorial</h1>
		<p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive,
			mobile-first projects on the web.</p>
	</div>

	<form id="form" method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" name="txtUsuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="txtPassword" class="form-control" id="exampleInputPassword1">
		</div>
		<div class="form-group form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>

	<script>
		$(document).ready(function(e) {
			$("#form").on('submit', (function(e) {
				e.preventDefault();
				$("#message").empty();
				$('#loading').show();
				$.ajax({
					url: "<?php echo base_url('login/validar') ?>",
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {

						if (data.length !== 0) {
							$('#loading').hide();
							$("#message").html(data);
						} else {
							window.location.href = '<?php echo base_url("menus") ?>';
							throw new Error('go');
						}
					}
				});
			}));
		});
	</script>
</body>

</html>
