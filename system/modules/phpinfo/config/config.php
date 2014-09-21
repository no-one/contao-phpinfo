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
 * Back end modules
 */
$GLOBALS['BE_MOD']['system']['phpinfo'] = array
(
	'callback'   => 'PhpInfo\ModulePhpInfo',
	'icon'       => 'system/modules/phpinfo/assets/phpinfo.png',
	'stylesheet' => 'system/modules/phpinfo/assets/mod_phpinfo_be.css'
);
