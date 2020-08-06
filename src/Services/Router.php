<?php

namespace ProjectPhp\Services;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\MainController;
use ProjectPhp\Structures\Routes\AbstractRoute;
use ProjectPhp\Structures\Routes\HomeRoute;
use ProjectPhp\Structures\Routes\ImageRoute;
use ProjectPhp\Structures\Routes\UserDeleteRoute;
use ProjectPhp\Structures\Routes\UsersRoute;

class Router
{
    private const AVAILABLE_ROUTES = [
        HomeRoute::class,
        UserDeleteRoute::class,
        UsersRoute::class,
        ImageRoute::class
    ];

    public static function navigate(): void
    {
        $method = (string)$_SERVER['REQUEST_METHOD'];
        $uri = self::getRequestUri();
        /** @var AbstractRoute $route */

        foreach (self::AVAILABLE_ROUTES as $route) {

            if ($uri == $route::getRequestUri() && $method == $route::getRequestMethod()) {
                $route::fireAction();
                return;
            }
        }

        $mainController = new MainController();
        $mainController->notFoundAction();
    }

    /**
     * @return string
     */
    private static function getRequestUri(): string
    {
        $requestUri = (string)$_SERVER['REQUEST_URI'];

        if ($requestUri == '') {
            return '/';
        }

        $needleSymbolPosition = strpos((string)$requestUri, '?');

        if ($needleSymbolPosition === false) {
            return $requestUri;
        }

        return substr((string)$requestUri, 0, $needleSymbolPosition);
    }
}
