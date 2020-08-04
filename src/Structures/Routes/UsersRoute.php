<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\UsersController;

class UsersRoute extends AbstractRoute
{
    /**
     * @return string
     */
    public static function getRequestUri(): string
    {
        return RouteConstants::USERS_REQUEST_URI;
    }

    /**
     * @return string
     */
    public static function getRequestMethod(): string
    {
        return RouteConstants::METHOD_GET;
    }

    public static function fireAction(): void
    {
        $controller = new UsersController();
        $controller->indexAction();
    }

}
