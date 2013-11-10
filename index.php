<?php

require_once('class/Database.class.php');

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta http-equiv="Content-Type" CONTENT="text/html; charset=UTF-8">
		<title>Main template</title>
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
					<ul class="listado-de-articulos">
						<?php
							$sql = "SELECT * FROM Article";
							$result = Database::query($sql);
							while ($article = mysql_fetch_array($result, MYSQL_ASSOC)) {
						?>
						<li>
							<article>
								<header><a href="article.html"><?=$article['title']?></a></header>
								<p><?=$article['text']?></p>
							</article>
						</li>
						<?php
							}
						?>
					</ul>
				</section>
			</section>
			<footer>
				BlogPHP &copy;2013
			</footer>
		</div>
	</body>
</html>