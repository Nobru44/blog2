<?php
include "../bootstrap.php";



$articleId = $_GET['articleId'];


$article = getArticleById($articleId);



$comments = getCommentByArticle($articleId);


include "../views/article.phtml";


include "../views/footer.phtml";