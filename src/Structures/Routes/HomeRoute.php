<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\MainController;

class HomeRoute extends AbstractRoute
{
    /**
     * @return string
     */
    public static function getRequestUri(): string
    {
        return RouteConstants::BASE_REQUEST_URI;
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
        $mainController = new MainController();
        $mainController->homeAction();
    }

    /**
     * @return bool
     */
    public static function isForLoggedInUser(): bool
    {
        return false;
    }
}
