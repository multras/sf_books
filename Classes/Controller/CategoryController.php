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
 * Plugin 'Book Library - Category' for the 'sf_books' extension.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 */
class CategoryController extends AbstractController {
	/**
	 * @var array
	 */
	protected $allowedOrderBy = array('title', 'sorting');

	/**
	 * @var \Evoweb\SfBooks\Domain\Repository\CategoryRepository
	 */
	protected $repository;

	/**
	 * @return void
	 */
	protected function initializeAction() {
		$this->repository = $this->objectManager->get('Evoweb\\SfBooks\\Domain\\Repository\\CategoryRepository');
		$this->setDefaultOrderings();
	}

	/**
	 * @return void
	 */
	protected function initializeListAction() {
		$this->settings['category'] = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['category'], TRUE);
	}

	/**
	 * renders the list of books with search and pagination
	 *
	 * @return void
	 */
	protected function listAction() {
		if (count($this->settings['category']) == 0 || (
				count($this->settings['category']) == 1 && reset($this->settings['category']) < 1
			)) {
			$categories = $this->repository->findAll();
		} else {
			$categories = $this->repository->findByCategory($this->settings['category']);
		}

		$categories = $this->removeExcludeCategories($categories);
		$this->view->assign('categories', $categories);
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categories
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	protected function removeExcludeCategories(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $categories) {
		$excludeCategories = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(',', $this->settings['excludeCategories']);
		if (count($excludeCategories)) {
			/** @var $category \Evoweb\SfBooks\Domain\Model\Category */
			foreach ($categories as $category) {
				if (in_array($category->getUid(), $excludeCategories)) {
					$categories->offsetUnset($categories->key());
				}
			}
		}

		return $categories;
	}

	/**
	 * renders the content for a single category
	 *
	 * @param \Evoweb\SfBooks\Domain\Model\Category $category
	 * @return void
	 */
	protected function showAction(\Evoweb\SfBooks\Domain\Model\Category $category) {
			// This sets the title of the page for use in indexed search results:
		if ($category->getTitle()) {
			$this->getTypoScriptFrontendController()->indexedDocTitle = $category->getTitle();
		}

		$this->view->assign('category', $category);
	}
}
