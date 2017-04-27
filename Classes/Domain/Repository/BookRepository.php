<?php
namespace Evoweb\SfBooks\Domain\Repository;

/**
 * This file is developed by evoweb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Class BookRepository
 *
 * @package Evoweb\SfBooks\Domain\Repository
 */
class BookRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @param array $categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByCategory($categories)
    {
        $query = $this->createQuery();

        $categoryConstraints = [];
        foreach ($categories as $category) {
            $categoryConstraints[] = $query->contains('category', $category);
        }
        $constraint = $query->logicalOr($categoryConstraints);

        $query->matching($constraint);

        return $query->execute();
    }

    /**
     * @param string $searchString
     * @param string|array $searchFields
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findBySearch($searchString, $searchFields)
    {
        if (!is_array($searchFields)) {
            $searchFields = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $searchFields, true);
        }

        $query = $this->createQuery();

        $searchConstrains = [];
        foreach ($searchFields as $field) {
            $searchConstrains[] = $query->like($field, '%' . $searchString . '%');
        }

        $query->matching($query->logicalOr($searchConstrains));

        return $query->execute();
    }
}
