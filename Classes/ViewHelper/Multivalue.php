<?php
/***************************************************************
*  Copyright notice
*
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
 * Multivalue viewhelper to output multivalue fields
 * Replaces viewhelpers ###MULTIVALUE:array|glue###
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage solr
 */
class Tx_Solr_ViewHelper_Multivalue implements Tx_Solr_ViewHelper {

		// defaults if neither is given trough the view helper marker, nor through TS
	protected $glue = ', ';

	/**
	 * Constructor for class Tx_Solr_ViewHelper_Multivalue
	 *
	 */
	public function __construct(array $arguments = array()) {
		$configuration = Tx_Solr_Util::getSolrConfiguration();

		if (!empty($configuration['viewhelpers.']['multivalue.']['glue'])) {
			$this->glue = $configuration['viewhelpers.']['multivalue.']['glue'];
		}
	}

	/**
	 * Takes a multivalue field as input and implode()s its values to a string
	 *
	 * @param array $arguments
	 * @return string
	 */
	public function execute(array $arguments = array()) {
		$multivalueFieldValue = $arguments[0];

		$glue = $this->glue;
		if (isset($arguments[1])) {
			$glue = $arguments[1];
		}

		$unserializedMultivalueFieldValue = unserialize($multivalueFieldValue);
		$value = is_array($unserializedMultivalueFieldValue)
			? implode($glue, $unserializedMultivalueFieldValue)
			: $multivalueFieldValue;

		return $value;
	}
}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/ViewHelper/Multivalue.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/ViewHelper/Multivalue.php']);
}

?>