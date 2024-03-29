<?php
function auto_loader($class_name) {
    require_once "includes/$class_name.php";
}
spl_autoload_register('auto_loader');