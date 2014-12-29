<?php

class Tx_SfBooks_Domain_Repository_AuthorRepository extends Tx_Extbase_Persistence_Repository {
	/**
	 * @return Tx_Extbase_DomainObject_AbstractEntity
	 */
	public function findAuthorGroupedByLetters() {
		/** @var $query Tx_Extbase_Persistence_Query */
		$query = $this->createQuery();

		/** @var $sys_page t3lib_pageSelect */
		$sys_page = $GLOBALS['TSFE']->sys_page;
		$enableFields = $sys_page->enableFields(strtolower($this->objectType));

		/** @var $result Tx_Extbase_Persistence_QueryResult */
		$result = $query->statement('
			SELECT *, LEFT(lastname, 1) AS capital_letter
			FROM ' . strtolower($this->objectType) . '
			WHERE 1 ' . $enableFields . ' ORDER BY lastname, firstname
		')->execute();

		/** @var $author Tx_SfBooks_Domain_Model_Author */
		$groupedAuthors = array();
		foreach ($result as $author) {
			$letter = $author->getCapitalLetter();
			if (!is_array($groupedAuthors[$letter])) {
				$groupedAuthors[$letter] = array();
			}

			$groupedAuthors[$letter][] = $author;
		}

		return $groupedAuthors;
	}

	/**
	 * @param string $searchString
	 * @param string $searchFields
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findBySearch($searchString, $searchFields) {
		if (!is_array($searchFields)) {
			$searchFields = t3lib_div::trimExplode(',', $searchFields, TRUE);
		}

		$query = $this->createQuery();

		$searchConstrains = array();
		foreach ($searchFields as $field) {
			if ($field === 'firstname' || $field === 'lastname') {
				foreach (t3lib_div::trimExplode(' ', $searchString) as $part) {
					$searchConstrains[] = $query->like($field, '%' . $part . '%');
				}
			} else {
				$searchConstrains[] = $query->like($field, '%' . $searchString . '%');
			}
		}

		$query->matching($query->logicalOr($searchConstrains));

		return $query->execute();
	}
}

?>