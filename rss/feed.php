<?php
//hay que ir a buscar un xml a algun feed RSS y imprimirlo en un formato cool.
$xml = file_get_contents("http://www.sport.es/es/rss/last_news/rss.xml");
$res = new SimpleXMLElement($xml);

//die($res->channel->item[0]->title);
?>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<title>RSS Feed Marrel</title>
</head>
<?php include "../navbar.php"?>
<body>
	<div class="container">
		<p>Todas las noticias del mundo del deporte las tienes aqui!</p>
		<?php foreach ($res->channel->item as $item) {?>
		<p>
			<h4><?php echo $item->title?></h4> <br />
		<!-- <a href=<?php echo $item->link?>>Fuente</a>-->
			<?php echo $item->description?>
		</p>
		<?php }?>
	</div>
</body>
</html>