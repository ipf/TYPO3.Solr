<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011-2015 Stefan Sprenger <stefan.sprenger@dkd.de>
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
*  A copy is found in the textfile GPL.txt and important notices to the license
*  from the author is found in LICENSE.txt distributed with these scripts.
*
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Subpart View Helper marker interface
 *
 * @author Stefan Sprenger <stefan.sprenger@dkd.de>
 * @package TYPO3
 * @subpackage solr
 */
interface Tx_Solr_SubpartViewHelper extends Tx_Solr_ViewHelper {

	/**
	 * Gets the view helper's subpart template
	 *
	 * @return	Tx_Solr_Template
	 */
	public function getTemplate();

	/**
	 * Sets the view helper's subpart template
	 *
	 * @param Tx_Solr_Template $template view helper's subpart template
	 */
	public function setTemplate(Tx_Solr_Template $template);

}

?>