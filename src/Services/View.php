<?php
/** @noinspection PhpUnusedParameterInspection */

/** @noinspection PhpIncludeInspection */

namespace ProjectPhp\Services;

class View
{
    public const MENU_TEMPLATE_ALIAS = 'menu';
    public const FOOTER_TEMPLATE_ALIAS = 'footer';
    public const PAGINATION_TEMPLATE_ALIAS = 'pagination';
    public const HEADER_TEMPLATE_ALIAS = 'header';
    private const BASE_TEMPLATES_PATH = __DIR__ . '/../Views/Templates/';
    private const TEMPLATES = [
        self::PAGINATION_TEMPLATE_ALIAS => self::BASE_TEMPLATES_PATH . 'pagination.php',
        self::HEADER_TEMPLATE_ALIAS => self::BASE_TEMPLATES_PATH . 'header.php',
        self::FOOTER_TEMPLATE_ALIAS => self::BASE_TEMPLATES_PATH . 'footer.php',
        self::MENU_TEMPLATE_ALIAS => self::BASE_TEMPLATES_PATH . 'menu.php'
    ];

    /** @var array */
    private static $data = [];

    /**
     * @param string $viewName
     * @param array $data
     */
    public static function render(string $viewName, array $data = []): void
    {
        self::$data = $data;
        require_once __DIR__ . '/../Views/' . $viewName;
    }

    /**
     * @return array
     */
    public static function getData(): array
    {
        return self::$data;
    }

    /**
     * @param string $name
     */
    public static function includePartialTemplate(string $name): void
    {
        if (array_key_exists($name, self::TEMPLATES)) {
            require_once self::TEMPLATES[$name];
        }
    }
}

