<?php
namespace Evoweb\SfBooks\Controller;
/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Plugin 'Book Library - Author' for the 'sf_books' extension.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 */
class AuthorController extends AbstractController {
	/**
	 * @var array
	 */
	protected $allowedOrderBy = array('title');

	/**
	 * @var \Evoweb\SfBooks\Domain\Repository\AuthorRepository
	 */
	protected $repository;

	/**
	 * @return void
	 */
	protected function initializeAction() {
		$this->repository = $this->objectManager->get('Evoweb\\SfBooks\\Domain\\Repository\\AuthorRepository');
		$this->setDefaultOrderings();
	}

	/**
	 * @return void
	 */
	protected function listAction() {
		$authorGroups = $this->repository->findAuthorGroupedByLetters();

		$this->view->assign('authorGroups', $authorGroups);
	}

	/**
	 * @param \Evoweb\SfBooks\Domain\Model\Author $author
	 * @return void
	 */
	protected function showAction(\Evoweb\SfBooks\Domain\Model\Author $author = NULL) {
		if ($author == NULL) {
			$this->getTypoScriptFrontendController()->pageNotFoundAndExit('Author not found');
		}

			// This sets the title of the page for use in indexed search results:
		if ($author->getLastname()) {
			$this->getTypoScriptFrontendController()->indexedDocTitle = $author->getLastname() . ', ' . $author->getFirstname();
		}

		$this->view->assign('author', $author);
	}

	/**
	 * @param string $query
	 * @param string $searchBy
	 * @return void
	 */
	protected function searchAction($query, $searchBy = '') {
		if (!$searchBy) {
			$searchBy = $this->settings['searchFields'] . ',' . $this->settings['bookSearchFields'];
		}

		$authors = $this->repository->findBySearch($query, $searchBy);

		$this->view->assign('query', $query);
		$this->view->assign('authors', $authors);
	}
}
