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
 * Class CategoryRepository
 *
 * @package Evoweb\SfBooks\Domain\Repository
 */
class CategoryRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * @var array
	 */
	protected $defaultOrderings = array(
		'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
	);

	/**
	 * @param array $categories
	 * @return \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
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
