<?php
    require('core/models/news.php');
    $news_model = new News();
    $article = $news_model->get_article($this->parameter);
?>
<div class="main-box">
    <div class="container">
        <h3>Перегляд новин</h3>
        <hr>
        ...
        <hr>
    </div>
</div>