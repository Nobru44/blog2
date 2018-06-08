<?php

function pre($thing) {
	echo "<pre>";
	print_r($thing);
	echo "</pre>";
}


function getArticlesList() {
	$sql = "SELECT * FROM article JOIN author ON author.id = article.author_id JOIN category ON category.id = article.category_id";

	$db = new PDO('mysql:host=localhost;dbname=blog', 'root', 'troiswa');

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$listArticles = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $listArticles;
}