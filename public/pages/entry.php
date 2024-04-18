<div class="main-box">
    <div class="container">
        <h3>Авторизація</h3>
        <hr>
        <form id="form1" action="entry_res" method="post">
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
            <div class="panel" style="margin-top: 25px; text-align: center">
                <input type="checkbox" id="stand" name="stand" value="yes">
                <label for="stand">Залишатися в системі</label>
            </div>
            <div class="form-group buttons">
                <input type="submit" value="Відправити" class="btn btn-success">
                <input type="reset" value="Очистити" class="btn btn-danger">
            </div>
        </form>
    </div>
</div>