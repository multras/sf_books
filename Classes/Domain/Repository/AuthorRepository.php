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
 * Class AuthorRepository
 *
 * @package Evoweb\SfBooks\Domain\Repository
 */
class AuthorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @return array
     */
    public function findAuthorGroupedByLetters()
    {
        $queryBuilder = $this->getQueryBuilderForTable('tx_sfbooks_domain_model_author');
        $statement = $queryBuilder
            ->select('*')
            ->addSelectLiteral('LEFT(lastname, 1) AS capital_letter')
            ->from('tx_sfbooks_domain_model_author')
            ->orderBy('lastname')
            ->addOrderBy('firstname')
            ->getSQL();

        /** @var $query \TYPO3\CMS\Extbase\Persistence\Generic\Query */
        $query = $this->createQuery();
        $result = $query->statement($statement)->execute();

        /** @var $author \Evoweb\SfBooks\Domain\Model\Author */
        $groupedAuthors = [];
        foreach ($result as $author) {
            $letter = $author->getCapitalLetter();
            if (!is_array($groupedAuthors[$letter])) {
                $groupedAuthors[$letter] = [];
            }

            $groupedAuthors[$letter][] = $author;
        }

        return $groupedAuthors;
    }

    /**
     * @param string $searchString
     * @param string $searchFields
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
            if ($field === 'firstname' || $field === 'lastname') {
                foreach (\TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(' ', $searchString) as $part) {
                    $searchConstrains[] = $query->like($field, '%' . $part . '%');
                }
            } else {
                $searchConstrains[] = $query->like($field, '%' . $searchString . '%');
            }
        }

        $query->matching($query->logicalOr($searchConstrains));

        return $query->execute();
    }

    /**
     * @param string $table
     *
     * @return \TYPO3\CMS\Core\Database\Query\QueryBuilder
     */
    protected function getQueryBuilderForTable($table): \TYPO3\CMS\Core\Database\Query\QueryBuilder
    {
        return \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Database\ConnectionPool::class
        )->getQueryBuilderForTable($table);
    }
}
