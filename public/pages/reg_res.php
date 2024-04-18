<div class="main-box">
    <div class="container">
        <h3>Звіт про реєстрацію</h3>
        <hr>
        <?php
            $login = $_POST['login'];
            $pass1 = $_POST['pass1'];
            $pass2 = $_POST['pass2'];
            $email = $_POST['email'];
            $birth = $_POST['birth'];
            /*
            echo "Login: $login <br>";
            echo "Password1: $pass1 <br>";
            echo "Password2: $pass2 <br>";
            echo "Email: $email <br>";
            echo "Birth: $birth <br>";
            */

            $errors = [];
            $reg_expr1 = '/^[a-zA-Z][a-zA-Z0-9_]{5,15}$/';
            $reg_expr2 = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9_]{6,}$/';
            $reg_expr3 = '';

            if (!preg_match($reg_expr1, $login)){
                $errors[] = 'Логін не відповідає вимогам безпеки';
            }
            if (!preg_match($reg_expr2, $pass1)){
                $errors[] = 'Пароль не відповідає вимогам безпеки';
            }
            if($pass1 !== $pass2){
                $errors[] = 'Паролі не співпадають';
            }
            //1
            require('core/models/users.php');
            $model = new Users();

            if(!$model->check_free_login($login)){
                $errors[] = 'Заданий логін вже існує';
            }
            //2

            if (count($errors) > 0){
                echo '<h5 style="color: red">';
                foreach ($errors as $err){
                    echo "$err <br>";
                }
                echo "</h5>";
            }else{
                try{
                    date_default_timezone_set('Europe/Kiev');
                    $regdate = date('Y-m-d H:i:s');

                    $passw = md5($pass1);
                    $role_id = 1;
                    $status_id = 1;

                    $model->add_user($login, $passw, $email, $regdate, $birth, $role_id, $status_id);

                    echo '<h5 style="color: green">';
                    echo 'Реєстрація успішно завершена';
                    echo "</h5>";
                } catch (Exception $e){
                    echo '<h5 style="color: red">';
                    echo "Збій реєстрації => {$e->getMessage()}";
                    echo "</h5>";
                }
            }
        ?>
    </div>
</div>