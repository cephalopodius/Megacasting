<?php
function autoload($classname)
{
	var_dump($classname);
    require 'inc/' . $classname . '.php';
}

spl_autoload_register('autoload');
?>