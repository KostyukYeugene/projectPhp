<?php

namespace ProjectPhp\Structures\Routes;

use ProjectPhp\Constants\RouteConstants;
use ProjectPhp\Controllers\ImagesController;

class ImageRoute extends AbstractRoute
{
    /**
     * @return string
     */
    public static function getRequestUri(): string
    {
        return RouteConstants::IMAGES_REQUEST_URI;
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
        $imagesController = new ImagesController();
        $imagesController->showAction();
    }
}
