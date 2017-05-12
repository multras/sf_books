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
 * Class SeriesRepository
 *
 * @package Evoweb\SfBooks\Domain\Repository
 */
class SeriesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @return array
     */
    public function findSeriesGroupedByLetters()
    {
        $queryBuilder = $this->getQueryBuilderForTable('tx_sfbooks_domain_model_series');
        $statement = $queryBuilder
            ->select('*')
            ->addSelectLiteral('LEFT(title, 1) AS capital_letter')
            ->from('tx_sfbooks_domain_model_series')
            ->orderBy('title')
            ->getSQL();

        /** @var $query \TYPO3\CMS\Extbase\Persistence\Generic\Query */
        $query = $this->createQuery();
        $result = $query->statement($statement)->execute();

        /** @var $series \Evoweb\SfBooks\Domain\Model\Series */
        $groupedSeries = [];
        foreach ($result as $series) {
            $letter = $series->getCapitalLetter();
            if (!is_array($groupedSeries[$letter])) {
                $groupedSeries[$letter] = [];
            }

            $groupedSeries[$letter][] = $series;
        }

        return $groupedSeries;
    }

    /**
     * @param array $series
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findBySeries($series)
    {
        $query = $this->createQuery();

        $seriesConstraints = [];
        foreach ($series as $serie) {
            $seriesConstraints[] = $query->equals('uid', $serie);
        }
        $constraint = $query->logicalOr($seriesConstraints);

        $query->matching($constraint);

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
