<?php


namespace ProjectPhp\Services;


class PageNumberRetriever
{
    /**
     * @return int
     */
    public static function getPage(): int
    {
        $page = (int)RequestParametersRetriever::getQueryParameter('page');

        if ($page < 1) {
            return 1;
        }

        return $page;
    }

}
