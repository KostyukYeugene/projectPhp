<?php

use ProjectPhp\Services\View;

require_once __DIR__ . '/../../vendor/autoload.php';
?>

<?php View::includePartialTemplate(View::HEADER_TEMPLATE_ALIAS); ?>
<div align="center" class="not_found">
    <style>
        html {
            background: url("/src/Views/Resources/Images/404.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</div>
<?php View::includePartialTemplate(View::FOOTER_TEMPLATE_ALIAS); ?>
