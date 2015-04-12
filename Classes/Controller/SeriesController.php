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
 * Plugin 'Book Library - Series' for the 'sf_books' extension.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 */
class SeriesController extends AbstractController {
	/**
	 * @var array
	 */
	protected $allowedOrderBy = array('title');

	/**
	 * @var \Evoweb\SfBooks\Domain\Repository\SeriesRepository
	 */
	protected $repository;

	/**
	 * @return void
	 */
	protected function initializeAction() {
		$this->repository = $this->objectManager->get('Evoweb\\SfBooks\\Domain\\Repository\\SeriesRepository');
		$this->setDefaultOrderings();
	}

	/**
	 * renders the list of books with search and pagination
	 *
	 * @return void
	 */
	protected function listAction() {
		$seriesGroups = $this->repository->findSeriesGroupedByLetters();

		$this->view->assign('seriesGroups', $seriesGroups);
	}

	/**
	 * renders the content for a single series
	 *
	 * @param \Evoweb\SfBooks\Domain\Model\Series $series
	 * @return void
	 */
	protected function showAction(\Evoweb\SfBooks\Domain\Model\Series $series) {
			// This sets the title of the page for use in indexed search results:
		if ($series->getTitle()) {
			$this->getTypoScriptFrontendController()->indexedDocTitle = $series->getTitle();
		}

		$this->view->assign('series', $series);
	}
}
