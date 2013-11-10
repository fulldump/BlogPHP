<?php

require_once('class/Database.class.php');

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8">
		<title>Article template</title>
		<link rel="stylesheet" type="text/css" href="/css/style.css">
	</head>
	<body>
		<div class="frame">
			<header>
				<a href="main.html" class="title">{Título del blog}</a>
				<section class="subtitle">{Subtítulo del blog}</section>
			</header>
			<section>
				<aside class="tags">{listado de tags}</aside>
				<section class="cuerpo">
					<?php
						$id_article = mysql_real_escape_string($_GET['id_article']);
						$sql = "SELECT * FROM Article WHERE id='$id_article' ";
						$result = Database::query($sql);
						if ($article = mysql_fetch_array($result, MYSQL_ASSOC)) {
					?>
					<article class="articulo">
						<header><h1><?=$article['title']?></h1></header>
						<p><?=$article['text']?></p>
						<footer>Publicado el <?php echo date('r', $article['time_published']) ?></footer>
					</article>
					<br>
					<a href="/">[Volver]</a>
					<?php
						}
					?>
					<br>
					<br>
					<br>

					<section class="nuevo-comentario">
						{Formulario para nuevo comentario}
					</section>
					<section class="comentarios">
						<ol>
						<?php
							$id_article = mysql_real_escape_string($_GET['id_article']);
							$sql = "SELECT * FROM Comment WHERE id_article='$id_article' ";
							$result = Database::query($sql);
							while ($comment = mysql_fetch_array($result, MYSQL_ASSOC)) {
						?>
							<li><?=$comment['text']?></li>
						<?php
							}
						?>
						</ol>
					</section>
				</section>
			</section>
			<footer>
				BlogPHP &copy;2013
			</footer>
		</div>
	</body>
</html>