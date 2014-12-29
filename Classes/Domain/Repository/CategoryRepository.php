<?php

class Tx_SfBooks_Domain_Repository_CategoryRepository extends Tx_Extbase_Persistence_Repository {
	protected $defaultOrderings = array(
		'sorting' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING,
	);

	/**
	 * @param array $categories
	 * @return Tx_Extbase_DomainObject_AbstractEntity
	 */
	public function findByCategory($categories) {
		$query = $this->createQuery();

		$categoryConstraints = array();
		foreach ($categories as $category) {
			$categoryConstraints[] = $query->equals('uid', $category);
		}
		$constraint = $query->logicalOr($categoryConstraints);

		$query->matching($constraint);

		return $query->execute();
	}
}

?>