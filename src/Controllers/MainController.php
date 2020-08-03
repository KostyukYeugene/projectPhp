<?php

namespace ProjectPhp\Controllers;

use ProjectPhp\Services\View;

class MainController
{
    public function notFoundAction(): void
    {
        View::render('notFound.php', []);
    }

    public function loginAction(): void
    {
        View::render('login.php', []);
    }
}
