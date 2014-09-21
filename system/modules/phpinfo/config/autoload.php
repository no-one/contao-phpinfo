<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package    phpinfo
 * @copyright  Christian Steurer 2011, Christoph Krebs 2014
 * @author     Christian Steurer (Russe)
 * @author     Christoph Krebs
 * @license    http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'CeeKay',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'CeeKay\PhpInfo\ModulePhpInfo' => 'system/modules/phpinfo/modules/ModulePhpInfo.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_phpinfo' => 'system/modules/phpinfo/templates',
));
