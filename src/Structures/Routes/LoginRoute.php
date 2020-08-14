<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\UsersController;

class LoginRoute extends AbstractRoute
{
    public static function getRequestUri(): string
    {
        return RouteConstants::LOGIN_REQUEST_URI;
    }

    public static function getRequestMethod(): string
    {
        return RouteConstants::METHOD_POST;
    }

    public static function fireAction(): void
    {
        $usersController = new UsersController();
        $usersController->loginAction();
    }

    /**
     * @return bool
     */
    public static function isForLoggedInUser(): bool
    {
        return false;
    }
}
