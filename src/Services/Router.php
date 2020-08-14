<?php

namespace ProjectPhp\Services;

use ProjectPhp\Controllers\MainController;
use ProjectPhp\Models\User;
use ProjectPhp\Structures\Routes\AbstractRoute;
use ProjectPhp\Structures\Routes\HomeRoute;
use ProjectPhp\Structures\Routes\ImageRoute;
use ProjectPhp\Structures\Routes\LoginRoute;
use ProjectPhp\Structures\Routes\LogoutRoute;
use ProjectPhp\Structures\Routes\UserRegistrationRoute;
use ProjectPhp\Structures\Routes\UserDeleteRoute;
use ProjectPhp\Structures\Routes\UsersRoute;

class Router
{
    private const AVAILABLE_ROUTES = [
        HomeRoute::class,
        UserDeleteRoute::class,
        UsersRoute::class,
        ImageRoute::class,
        UserRegistrationRoute::class,
        LoginRoute::class,
        LogoutRoute::class
    ];

    public static function navigate(): void
    {
        $method = (string)$_SERVER['REQUEST_METHOD'];
        $uri = self::getRequestUri();

        /** @var AbstractRoute $route */
        foreach (self::AVAILABLE_ROUTES as $route) {

            if ($uri == $route::getRequestUri() && $method == $route::getRequestMethod()) {
                if (User::isLoggedIn() && $route::isForLoggedInUser()) {
                    $route::fireAction();
                    return;
                }

                if (User::isLoggedIn() && !$route::isForLoggedInUser()) {
                    header("Location: /users");
                    exit();
                }

                if (!User::isLoggedIn() && $route::isForLoggedInUser()) {
                    header("Location: /");
                    exit();
                }

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
