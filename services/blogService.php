<?php

// --------TOOLS-------------

function pre($thing) {
	echo "<pre>";
	print_r($thing);
	echo "</pre>";
}

function cleanText($text) {
	return htmlentities($text);
}


// ------------- FUNCTIONS----------

function getConnection() {
	$db = new PDO('mysql:host=localhost;dbname=blog', 'root', 'troiswa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return $db;
}

function getArticlesList() {
	$sql = "SELECT *, article.id FROM article
	JOIN author ON author.id = article.author_id
	JOIN category ON category.id = article.category_id";

	$db = getConnection();

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$listArticles = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $listArticles;
}

function getArticleById($id) {
	$sql = "SELECT *, article.id FROM article JOIN author ON author.id = article.author_id JOIN category ON category.id = article.category_id WHERE article.id LIKE '$id'";

	$db = getConnection();

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$listArticles = $statement->fetch(\PDO::FETCH_ASSOC);

	return $listArticles;
}


function addComment($pseudo, $content, $article_id) {
		
	$db = getConnection();
	$sql = "INSERT INTO comment (created_at, pseudo, content, article_id)
	VALUES (NOW(), '$pseudo', '$content', '$article_id')";
	$statement = $db->prepare($sql);
	$statement->execute();
}

function getCommentByArticle($id_article) {
	$sql = "SELECT article.id, comment.pseudo, comment.content, comment.created_at FROM article JOIN comment ON comment.article_id = article.id WHERE article.id LIKE '$id_article'";
	
	$db = getConnection();

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$commentList = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $commentList;
}

function getAuthorList() {
	$sql = "SELECT * FROM author";

	$db = getConnection();

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$listAuthor = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $listAuthor;
}

function getCategoryList() {
	$sql = "SELECT * FROM category";

	$db = getConnection();

	$statement = $db->prepare($sql);
	$db->exec('SET NAMES UTF8');

	$statement->execute();
	$listCategory = $statement->fetchAll(\PDO::FETCH_ASSOC);

	return $listCategory;
}


function addArticle(array $article) {
		
	$db = getConnection();
	$sql = "INSERT INTO article (id, author_id, created_at, update_at, title, content, category_id)
	VALUES (null, :$author_id, NOW(), NOW(), :$title , :$content, :category_id)";
	$statement = $db->prepare($sql);
	$statement->execute();
}