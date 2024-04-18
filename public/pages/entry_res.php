<div class="main-box">
    <div class="container">
        <h3>Звіт про авторизацію</h3>
        <hr>
        <?php
            $login = $_POST['login'];
            $pass1 = $_POST['pass1'];
            $passw = md5($pass1);

            $stand = 'no';
            if(isset($_POST['stand'])){
                $stand = $_POST['stand'];
            };

            require('core/models/users.php');
            $model = new Users();

            if(!$model->check_free_login($login)){
                $errors[] = 'Заданий логін вже існує';
            }

            try{
                if($model->check_auth_user($login, $passw)){
                    $_SESSION['user'] = $login;
                    if($stand === 'yes'){
                        setcookie('user', $login, time() + 3600 * 24 * 10);
                    }
                    echo '<script>';
                    echo 'window.location = "main"';
                    echo "</script>";
                } else {
                    echo '<h5 style="color: red">';
                    echo 'Користувач не знайдений';
                    echo "</h5>";
                }
            } catch (Exception $e){
                echo '<h5 style="color: red">';
                echo "Збій авторизації => {$e->getMessage()}";
                echo "</h5>";
            }
        ?>
    </div>
</div>