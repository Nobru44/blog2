<?php
include "../bootstrap.php";

pre($_POST);
if (!empty($_POST)) {
	
extract($_POST);
$pseudo =strip_tags($pseudo);
$content = strip_tags($comment);
$article_id = strip_tags($idArticle);
// if (!empty($pseudo)) AND (!empty($comment)) AND (!empty($idArticle)){
addComment($pseudo, $content, $article_id);
echo "Votre commentaire est bien posté";
}
// } else {
// 	echo "Une erreur s'est produite dans le formulaire";
// 	header ("Location : article.php"); 
// }