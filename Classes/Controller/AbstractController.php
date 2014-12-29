<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2003 Sebastian Fischer <typo3@evoweb.de>
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

abstract class Tx_SfBooks_Controller_AbstractController extends Tx_Extbase_MVC_Controller_ActionController {
	/**
	 * @var array
	 */
	protected $allowedOrderBy = array();

	/**
	 * @var Tx_Extbase_Persistence_Repository
	 */
	protected $repository;

	/**
	 * @return void
	 */
	protected function setDefaultOrderings() {
		$orderBy = $orderDir = '';
		if ($this->request->hasArgument('orderBy') && in_array($this->request->getArgument('orderBy'), $this->allowedOrderBy)) {
			$orderBy = $this->request->getArgument('orderBy');
		}

		if ($this->request->hasArgument('orderDir') && (
				$this->request->getArgument('orderDir') == Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING ||
				$this->request->getArgument('orderDir') == Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING
				)) {
			$orderDir = $this->request->getArgument('orderDir');
		} elseif (
				$this->settings['orderDir'] == Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING ||
				$this->settings['orderDir'] == Tx_Extbase_Persistence_QueryInterface::ORDER_DESCENDING
				) {
			$orderDir = $this->settings['orderDir'];
		}

		if (empty($orderDir)) {
			$orderDir = Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING;
		}

		if ($orderBy) {
			$defaultOrderings = array_merge(array($orderBy => $orderDir), (array) $this->settings['orderings']);
			$this->repository->setDefaultOrderings($defaultOrderings);
		}
	}
}

?>