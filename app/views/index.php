<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calculadora</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<header>
		<h1>Calculadora</h1>
	</header>
	<script src="https://unpkg.com/htmx.org@2.0.3"></script>
	<main>
	  <div class="aside" id="tabs" hx-get="/tab1" hx-trigger="load delay:100ms" hx-target="#tabs" hx-swap="innerHTML">
	  </div>
	  <div class="repl">
		
	  </div>
	</main>
</body>

</html>
