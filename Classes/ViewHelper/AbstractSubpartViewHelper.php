<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2012 Stefan Sprenger <stefan.sprenger@dkd.de>
*  (c) 2012-2015 Ingo Renner <ingo@typo3.org>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Abstract subpart viewhelper
 *
 * @author Stefan Sprenger <stefan.sprenger@dkd.de>
 * @package TYPO3
 * @subpackage solr
 */
abstract class Tx_Solr_ViewHelper_AbstractSubpartViewHelper implements Tx_Solr_SubpartViewHelper {

	/**
	 * @var Tx_Solr_Template
	 */
	protected $template = NULL;

	/**
	 * Gets the view helper's subpart template
	 *
	 * @return	Tx_Solr_Template
	 */
	public function getTemplate() {
		return $this->template;
	}

	/**
	 * Sets the view helper's subpart template
	 *
	 * @param Tx_Solr_Template $template view helper's subpart template
	 */
	public function setTemplate(Tx_Solr_Template $template) {
		$this->template = $template;
	}

}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/ViewHelper/AbstractSubpartViewHelper.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/ViewHelper/AbstractSubpartViewHelper.php']);
}

?>