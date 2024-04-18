<?php
try{
    $title = $_POST['title'];
    $about = $_POST['about'];
    $details = $_POST['details'];
    $source = $_POST['source'];

    date_default_timezone_set('Europe/Kiev');
    $publish = date('Y-m-d H:i:s');
    $photo = "public/files/{$_FILES['photo']['name']}";

    $type = $_FILES['photo']['type'];
    if ($type !== 'image/png' && $type !== 'image/jpeg' && $type !== 'image/gif'){
        throw new Exeption('Файл має неграфічний формат');
    }

    $size = $_FILES['photo']['size'];
    if ($size > 10 * 1024 * 1024){
        throw new Exeption('Розмір файлу більше 10Mb');
    }

    if (!file_exists($photo)){
        if(!copy($_FILES['photo']['tmp_name'], $photo)){
            throw new Exeption('Не вдалося завантажити файл на сервер');
        }
    }

    require('core/models/news.php');
    $model = new News();
    $model->add_news($title, $about, $details, $photo, $source, $publish);

    echo "
        <script>
            alert('Новина успішно збережена');
            window.location = 'news';
        </script>
    ";
}
catch (Exeption $e){
    echo "
        <script>
            alert({$e->getMessage()});
            window.location = 'news';
        </script>
    ";
}