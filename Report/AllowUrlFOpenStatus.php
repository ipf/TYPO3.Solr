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
 * Provides a status report about whether the php.ini setting allow_url_fopen
 * is activated or not.
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage solr
 */
class Tx_Solr_Report_AllowUrlFOpenStatus implements \TYPO3\CMS\Reports\StatusProviderInterface {

	/**
	 * Checks whether allow_url_fopen is enabled.
	 *
	 * @see typo3/sysext/reports/interfaces/tx_reports_StatusProvider::getStatus()
	 */
	public function getStatus() {
		$reports  = array();
		$severity = \TYPO3\CMS\Reports\Status::OK;
		$value    = 'On';
		$message  = '';

		if (!ini_get('allow_url_fopen')) {
			$severity = \TYPO3\CMS\Reports\Status::ERROR;
			$value    = 'Off';
			$message  = 'allow_url_fopen must be enabled in php.ini to allow
				communication between TYPO3 and the Apache Solr server.
				Indexing pages using the Index Queue will also not work with
				this setting disabled.';
		}

		$reports[] = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Reports\Report\Status\Status::class,
			'allow_url_fopen',
			$value,
			$message,
			$severity
		);

		return $reports;
	}
}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Report/AllowUrlFOpenStatus.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Report/AllowUrlFOpenStatus.php']);
}

?>
