<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

//$loader->add('Liuggio\ExcelBundle\LiuggioExcelBundle','vendor/Liuggio\ExcelBundle\LiuggioExcelBundle');

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
