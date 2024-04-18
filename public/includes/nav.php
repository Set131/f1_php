<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="main"><img src="public/assets/img/free-icon-f1-2418802.png" alt="."></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main">Головна</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="news">Новини</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about">Про сайт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contacts">Контакти</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" style="margin-right: 50px">
                        Вітаємо Вас, <?=$this->user?> !
                    </a>
                </li>
                <?php if ($this->user === "Гість") {?>
                    <li class="nav-item">
                        <a class="nav-link" href="entry">Вхід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reg">Реєстрація</a>
                    </li>
                <?php } else {  ?>
                    <li class="nav-item">
                        <a class="nav-link" href="exit">Вихід</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile">Профіль</a>
                    </li>
                <?php }  ?>
            </ul>
        </div>
    </div>
</nav>