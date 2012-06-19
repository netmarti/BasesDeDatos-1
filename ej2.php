<?php 

//Ejercicio 2
$xml = file_get_contents('http://search.twitter.com/search.atom?q=to:nicopizarro');
$res = new SimpleXMLElement($xml);
$res = $res->children();
//echo '<pre>'.print_r($res, true).'</pre>';
foreach ($res->entry as $tweet) {
	echo utf8_decode($tweet->author->name).': '.utf8_decode($tweet->content).'<br/>';
}

?>
