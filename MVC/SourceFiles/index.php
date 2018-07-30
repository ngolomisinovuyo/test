<?php
// config files
require 'config.php';
require 'util/Auth.php';
// use an auto loader
function __autoload($class)
{
    require LIBS.$class.'.php';
}

require LIBS.'form/val.php';
//Load bootstrap
$boostrap = new Bootstrap();
//Optional pathe settings here
$boostrap->init();
