<?php 

use ProjectPhp\Services\View;
require_once __DIR__ . '/../../vendor/autoload.php';
?>

<?php View::includePartialTemplate(View::HEADER_TEMPLATE_ALIAS); ?>
<!--<img src="./Resources/404.jpg">-->
<h1>Page not found</h1>
<?php View::includePartialTemplate(View::FOOTER_TEMPLATE_ALIAS);?>
