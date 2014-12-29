<?php

class Tx_SfBooks_Domain_Repository_BookRepository extends Tx_Extbase_Persistence_Repository {
	/**
	 * @param array $categories
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findByCategory($categories) {
		$query = $this->createQuery();

		$categoryConstraints = array();
		foreach ($categories as $category) {
			$categoryConstraints[] = $query->contains('category', $category);
		}
		$constraint = $query->logicalOr($categoryConstraints);

		$query->matching($constraint);

		return $query->execute();
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
			$searchConstrains[] = $query->like($field, '%' . $searchString . '%');
		}

		$query->matching($query->logicalOr($searchConstrains));

		return $query->execute();
	}
}

?>