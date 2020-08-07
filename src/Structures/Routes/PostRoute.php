<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\UsersController;

class PostRoute extends AbstractRoute
{

    public static function getRequestUri(): string
    {
        return RouteConstants::USERS_REQUEST_URI;
    }

    public static function getRequestMethod(): string
    {
        return RouteConstants::METHOD_POST;
    }

    public static function fireAction(): void
    {
        $postRoute = new UsersController();
        $postRoute->storeAction();
    }
}
