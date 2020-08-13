<?php

namespace ProjectPhp\Controllers;

use ProjectPhp\Services\RequestParametersRetriever;
use ProjectPhp\Services\View;

class MainController
{
    public function notFoundAction(): void
    {
        View::render('notFound.php');
    }

    public function homeAction(): void
    {
        $errorMessage = (string)RequestParametersRetriever::getQueryParameter('errorMessage');
        View::render('home.php', [
            'errorMessage' => $errorMessage
        ]);
    }

}
