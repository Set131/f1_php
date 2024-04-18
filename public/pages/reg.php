<div class="main-box">
    <div class="container">
        <h3>Реєстрація</h3>
        <hr>
        <form id="form1" action="reg_res" method="post">
            <div class="form-group panel">
                <label for="login">Логін:</label>
                <input type="text" id="login" name="login" class="form-control" required>
                <div id="login-err" class="err"></div>
            </div>
            <div class="form-group panel">
                <label for="pass1">Пароль:</label>
                <input type="password" id="pass1" name="pass1" class="form-control" required>
                <div id="pass1-err" class="err"></div>
            </div>
            <div class="form-group panel">
                <label for="pass2">Повтор:</label>
                <input type="password" id="pass2" name="pass2" class="form-control" required>
                <div id="pass2-err" class="err"></div>
            </div>
            <div class="form-group panel">
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                <div id="email-err" class="err"></div>
            </div>
            <div class="form-group panel">
                <label for="birth">Дата народження:</label>
                <input type="date" id="birth" name="birth" class="form-control" required>
                <div id="birth-err" class="err"></div>
            </div>
            <div class="form-group buttons">
                <input type="submit" value="Відправити" class="btn btn-success">
                <input type="reset" value="Очистити" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>