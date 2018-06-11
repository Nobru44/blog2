<?php
include "../bootstrap.php";

$number = $_GET['id'];
$article = getArticleById($number);
pre($article);

include "../views/modifier.phtml";