<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010-2015 Ingo Renner <ingo@typo3.org>
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
 * Index Queue page indexer frontend helper base class implementing common
 * functionality.
 *
 * @author Ingo Renner <ingo@typo3.org>
 * @package TYPO3
 * @subpackage solr
 */
abstract class Tx_Solr_IndexQueue_FrontendHelper_Abstract implements Tx_Solr_IndexQueuePageIndexerFrontendHelper {

	/**
	 * Index Queue page indexer request.
	 *
	 * @var Tx_Solr_IndexQueue_PageIndexerRequest
	 */
	protected $request;

	/**
	 * Index Queue page indexer response.
	 *
	 * @var Tx_Solr_IndexQueue_PageIndexerResponse
	 */
	protected $response;

	/**
	 * The action a frontend helper executes.
	 */
	protected $action = NULL;

	/**
	 * Disables the frontend output for index queue requests.
	 *
	 * @param array Parameters from frontend
	 * @param tslib_fe TSFE object
	 */
	public function disableFrontendOutput(&$parameters, $parentObject) {
		$parameters['enableOutput'] = FALSE;
	}

	/**
	 * Disables caching for page generation to get reliable results.
	 *
	 * @param array Parameters from frontend
	 * @param tslib_fe TSFE object
	 */
	public function disableCaching(&$parameters, $parentObject) {
		$parentObject->no_cache = TRUE;
	}

	/**
	 * Starts the execution of a frontend helper.
	 *
	 * @param Tx_Solr_IndexQueue_PageIndexerRequest $request Page indexer request
	 * @param Tx_Solr_IndexQueue_PageIndexerResponse $response Page indexer response
	 */
	public function processRequest(Tx_Solr_IndexQueue_PageIndexerRequest $request, Tx_Solr_IndexQueue_PageIndexerResponse $response) {
		$this->request  = $request;
		$this->response = $response;

		if ($request->getParameter('loggingEnabled')) {
			\TYPO3\CMS\Core\Utility\GeneralUtility::devLog('Page indexer request received', 'solr', 0, array(
				'request' => (array) $request,
			));
		}
	}

	/**
	 * Deactivates a frontend helper by unregistering from hooks and releasing
	 * resources.
	 */
	public function deactivate() {
		$this->response->addActionResult($this->action, $this->getData());
	}

}

if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/IndexQueue/FrontendHelper/Abstract.php'])	{
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/solr/Classes/IndexQueue/FrontendHelper/Abstract.php']);
}

?>
