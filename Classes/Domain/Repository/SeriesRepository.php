<?php
namespace Evoweb\SfBooks\Domain\Repository;
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
 * Class SeriesRepository
 *
 * @package Evoweb\SfBooks\Domain\Repository
 */
class SeriesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
	/**
	 * @return array
	 */
	public function findSeriesGroupedByLetters() {
		/** @var $query \TYPO3\CMS\Extbase\Persistence\Generic\Query */
		$query = $this->createQuery();

		/** @var $pageRepository \TYPO3\CMS\Frontend\Page\PageRepository */
		$pageRepository = $GLOBALS['TSFE']->sys_page;
		$enableFields = $pageRepository->enableFields('tx_sfbooks_domain_model_series');

		/** @var $result \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult */
		$result = $query->statement('
			SELECT *, LEFT(title, 1) AS capital_letter
			FROM tx_sfbooks_domain_model_series
			WHERE 1 ' . $enableFields . ' ORDER BY title
		')->execute();

		/** @var $series \Evoweb\SfBooks\Domain\Model\Series */
		$groupedSeries = array();
		foreach ($result as $series) {
			$letter = $series->getCapitalLetter();
			if (!is_array($groupedSeries[$letter])) {
				$groupedSeries[$letter] = array();
			}

			$groupedSeries[$letter][] = $series;
		}

		return $groupedSeries;
	}

	/**
	 * @param array $series
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
	 */
	public function findBySeries($series) {
		$query = $this->createQuery();

		$seriesConstraints = array();
		foreach ($series as $serie) {
			$seriesConstraints[] = $query->equals('uid', $serie);
		}
		$constraint = $query->logicalOr($seriesConstraints);

		$query->matching($constraint);

		return $query->execute();
	}
}
