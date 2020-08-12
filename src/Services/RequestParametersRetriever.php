<?php


namespace ProjectPhp\Services;


class RequestParametersRetriever
{
    /**
     * @param string $key
     * @return mixed|null
     */
    public static function getQueryParameter(string $key)
    {
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }

        return null;
    }

    public static function getPostParameter(string $key)
    {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }

        return null;
    }

}