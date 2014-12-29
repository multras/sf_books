<?php

class Tx_SfBooks_Domain_Repository_SeriesRepository extends Tx_Extbase_Persistence_Repository {
	/**
	 * @return Tx_Extbase_DomainObject_AbstractEntity
	 */
	public function findSeriesGroupedByLetters() {
		/** @var $query Tx_Extbase_Persistence_Query */
		$query = $this->createQuery();

		/** @var $sys_page t3lib_pageSelect */
		$sys_page = $GLOBALS['TSFE']->sys_page;
		$enableFields = $sys_page->enableFields(strtolower($this->objectType));

		/** @var $result Tx_Extbase_Persistence_QueryResult */
		$result = $query->statement('
			SELECT *, LEFT(title, 1) AS capital_letter
			FROM ' . strtolower($this->objectType) . '
			WHERE 1 ' . $enableFields . ' ORDER BY title
		')->execute();

		/** @var $series Tx_SfBooks_Domain_Model_Series */
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
	 * @return Tx_Extbase_DomainObject_AbstractEntity
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

?>