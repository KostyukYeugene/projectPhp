<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\UsersController;
use ProjectPhp\Services\Router;

class LogoutRoute extends AbstractRoute
{

    public static function getRequestUri(): string
    {
        return RouteConstants::LOGOUT_REQUEST_URI;
    }

    public static function getRequestMethod(): string
    {
        return RouteConstants::METHOD_POST;
    }

    public static function fireAction(): void
    {
        $usersController = new UsersController();
        $usersController->logoutAction();
    }

    /**
     * @return bool
     */
    public static function isForLoggedInUser(): bool
    {
        return true;
    }
}