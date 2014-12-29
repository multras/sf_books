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

/**
 * Plugin 'Book Library - Author' for the 'sf_books' extension.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 */
class Tx_SfBooks_Controller_AuthorController extends Tx_SfBooks_Controller_AbstractController {
	/**
	 * @var array
	 */
	protected $allowedOrderBy = array('title');

	/**
	 * @var Tx_SfBooks_Domain_Repository_AuthorRepository
	 */
	protected $repository;

	/**
	 * @return void
	 */
	protected function initializeAction() {
		$this->repository = $this->objectManager->get('Tx_SfBooks_Domain_Repository_AuthorRepository');
		$this->setDefaultOrderings();
	}

	/**
	 * @return void
	 */
	protected function initializeListAction() {
	}

	/**
	 * @return void
	 */
	protected function listAction() {
		$authorGroups = $this->repository->findAuthorGroupedByLetters();

		$this->view->assign('authorGroups', $authorGroups);
	}

	/**
	 * @return void
	 */
	protected function initializeShowAction() {
	}

	/**
	 * @param Tx_SfBooks_Domain_Model_Author $author
	 * @return void
	 */
	protected function showAction(Tx_SfBooks_Domain_Model_Author $author = NULL) {
		/** @var $frontend tslib_fe */
		$frontend = & $GLOBALS['TSFE'];

		if ($author == NULL) {
			$frontend->pageNotFoundAndExit('Author not found');
		}

			// This sets the title of the page for use in indexed search results:
		if ($author->getLastname()) {
			$frontend->indexedDocTitle = $author->getLastname() . ', ' . $author->getFirstname();
		}

		$this->view->assign('author', $author);
	}

	/**
	 * @param string $query
	 * @param string $searchBy
	 */
	protected function searchAction($query, $searchBy = '') {
		if (!$searchBy) {
			$searchBy = $this->settings['searchFields'] . ',' . $this->settings['bookSearchFields'];
		}

		$authors = $this->repository->findBySearch($query, $searchBy);

		$this->view->assign('query', $query);
		$this->view->assign('authors', $authors);
	}


	/**
	 * Initializes the view before invoking an action method.
	 *
	 * Override this method to solve assign variables common for all actions
	 * or prepare the view in another way before the action is called.
	 *
	 * @param Tx_Extbase_MVC_View_ViewInterface $view The view to be initialized
	 * @return void
	 */
	protected function initializeView(Tx_Extbase_MVC_View_ViewInterface $view) {
		if (isset($this->settings['templatePath']) && !empty($this->settings['templatePath'])) {
			/** @var $view Tx_Fluid_View_TemplateView */
			$view->setTemplateRootPath(array_shift(explode(' ', $this->settings['templatePath'])));
		}
	}
}



if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/sf_books/Classes/Controller/AuthorController.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/sf_books/Classes/Controller/AuthorController.php']);
}

?>