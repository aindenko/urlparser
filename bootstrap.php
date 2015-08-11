<?php

require_once dirname(__FILE__).'/autoloader.php';

// instantiate the loader
$loader = new \Psr4AutoloaderClass;
$loader->register();
// register the base directories for the namespace prefix
$loader->addNamespace('Url', 'src/Url');
