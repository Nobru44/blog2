<?php 
include "../bootstrap.php";

include "../views/editer.phtml";

pre($_POST);

if (!empty($_POST)) {
	extract($_POST);
	$title =strip_tags($title);
	$content = strip_tags($text);
	$author_id = strip_tags($auteur);
	$category_id = strip_tags($category);
		$newArticle = [];
		$newArticle['$title'] = $title;
		$newArticle['$content'] = $content;
		$newArticle['$author_id'] = $author_id;
		$newArticle['$categor_id'] = $category_id;
		addArticle($newArticle);
	} else {
		echo "Une erreur s'est produite dans le formulaire";
		// header ("Location : editer.php"); 
	}


include "../views/footer.phtml";