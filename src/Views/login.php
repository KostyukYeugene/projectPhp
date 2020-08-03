<?php namespace ProjectPhp\Services\View;

use ProjectPhp\Services\View; ?>

<?php View::includePartialTemplate(View::HEADER_TEMPLATE_ALIAS); ?>
<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
<h2>Главная страница</h2>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn">Регистрация</button>
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn2" hidden>Авторизация</button>
            <script type="text/javascript">
                document.getElementById("btn").onclick = function () {

                    document.getElementById("register").hidden = false;
                    document.getElementById("login").hidden = true;
                    document.getElementById("btn").hidden = true;
                    document.getElementById("btn2").hidden = false;


                }
                document.getElementById("btn2").onclick = function () {

                    document.getElementById("register").hidden = true;
                    document.getElementById("login").hidden = false;
                    document.getElementById("btn").hidden = false;
                    document.getElementById("btn2").hidden = true;

                }
            </script>
        </form>
    </div>
</nav>
<br>
<div align="center" class="login" id="login" hidden>
    <form action="" method="post">
        <h2>Авторизация</h2>
        <input name="email" type="email" id="email" placeholder="Введите Email"><br>
        <input name="password" type="password" id="password" placeholder="Введите пароль"><br>
        <button type="submit" class="btn btn-primary"> Войти</button><br>
    </form>
</div>
<div class="register" id="register" hidden align="center">
    <form action="" method="post">
        <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
        </button>
        <input name="firstname" type="text" id="firstname" placeholder="Введите имя"><br>
        <input name="lastname" type="text" id="lastname" placeholder="Введите Фамилию"><br>
        <input name="firstname" type="email" id="email" placeholder="Введите Email"><br>
        <input name="firstname" type="tel" id="phone" placeholder="Введите телефон"><br>
        <input name="firstname" type="password" id="password" placeholder="Введите пароль"><br>
        <button type="submit" class="btn btn-primary">Отправить</button><br>
    </form>
</div>
<?php View::includePartialTemplate(View::FOOTER_TEMPLATE_ALIAS); ?>
