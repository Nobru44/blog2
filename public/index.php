<?php
include "../bootstrap.php";




$listArticles = getArticlesList();
pre($listArticles);

include "../views/home.phtml";



include "../views/footer.phtml";