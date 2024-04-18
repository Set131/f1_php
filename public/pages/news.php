<?php
    require('core/models/news.php');
    $model = new News();
    $news = $model->get_news();
?>
<div class="main-box">
    <div class="container">
        <?php if($this->user === "admin123"): ?>
            <a href="news_add" class="btn btn-sm btn-warning" style="width:150px">
                Додати новину
            </a>
        <?php endif; ?>
        <table class="table" style="background-color: black; opacity: 0.85; margin-top: 20px">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Заголовок</th>
                    <th>Опис</th>
                    <th>Джерело</th>
                    <th>Керування</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $row): ?>
                    <tr>
                        <td>
                            <img src="<?=$row['photo']?>" alt="-" style="width: 200px; border: 3px solid black">
                        </td>
                        <td><?=$row['title']?></td>
                        <td><?=$row['about']?></td>
                        <td>
                            <a href="<?=$row['source']?>" target="_blank">
                                <?=$row['source']?></td>
                            </a>
                        <td>
                            <a href="news_details@<?=$row['id']?>" class="btn btn-sm btn-primary">
                                Деталі
                            </a>
                            <?php if($this->user === "admin123"): ?>
                                <a href="news_edit@<?=$row['id']?>" class="btn btn-sm btn-success">
                                    Змінити
                                </a>
                                <a href="news_del@<?=$row['id']?>" class="btn btn-sm btn-danger">
                                    Видалити
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
            //print_r($news);
        ?>
    </div>
    <style>
        #news-table {
            margin-top: 20px;
        }
        #news-table th {
            color: navy;
            font-style: italic;
            background-color: azure;
        }
        .mini{
            width: 100px;
        }
    </style>
</div>