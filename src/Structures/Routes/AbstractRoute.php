<?php

namespace ProjectPhp\Structures\Routes;

abstract class AbstractRoute
{
    /**
     * @return string
     */
    abstract public static function getRequestUri(): string;

    /**
     * @return string
     */
    abstract public static function getRequestMethod(): string;

    abstract public static function fireAction(): void;
}
