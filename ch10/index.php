<?php
require './lib/vendor/autoload.php';
$my_text="##hello";
use Michelf\Markdown;
$my_html = Markdown::defaultTransform($my_text);
print $my_html;
?>