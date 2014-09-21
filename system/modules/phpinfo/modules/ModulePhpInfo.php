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
 * Run in a custom namespace, so the class can be replaced
 */
namespace CeeKay\PhpInfo;


/**
 * Class ModulePhpInfo
 */
class ModulePhpInfo extends \BackendModule
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_phpinfo';


	/**
	 * Generate the module
	 */
	public function compile()
	{
		// check if phpinfo() is disabled
		$this->Template->disableFunctions = $this->isDisabled('disable_functions');
		$this->Template->suhosinBlacklist = $this->isDisabled('suhosin.executor.func.blacklist');

		if (!$this->Template->disableFunctions && !$this->Template->suhosinBlacklist)
		{
			ob_start();
			phpinfo();
			$phpinfo = ob_get_clean();

			// get content from <body>
			$phpinfo = preg_replace('%^.*<body>(.*)</body>.*$%ms', '$1', $phpinfo);

			if (version_compare(PHP_VERSION, '5.6.0', '<'))
			{
				// adjust <table>
				$phpinfo = str_replace('<table border="0" cellpadding="3" width="600">', '<table>', $phpinfo);
			}

			// remove <a> from <h2>
			$phpinfo = preg_replace('%<h2><a .*>(.*)</a></h2>%', '<h2>$1</h2>', $phpinfo);

			// add <div> container to cell content because of overflow
			$phpinfo = preg_replace('%<td class="([ev])">(.*?)</td>%', '<td class="$1"><div class="scroll">$2</div></td>', $phpinfo);

			$this->Template->output = $phpinfo;
		}

		$this->Template->class = 'v'.PHP_MAJOR_VERSION.PHP_MINOR_VERSION;
	}


	/**
	 * Check if phpinfo() is disabled
	 * @param string
	 * @return boolean
	 */
	public function isDisabled($directive)
	{
		$strValues = ini_get($directive);
		if (in_array('phpinfo', preg_split('%,\s*%', $strValues)))
		{
			return true;
		}
		return false;
	}
}
