<?php
namespace Evoweb\SfBooks\Domain\Model;

/**
 * This file is developed by evoWeb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Series extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Book>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $books;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $capitalLetter;

    /**
     * @var string
     */
    protected $info;

    /**
     * @var string
     */
    protected $description;

    public function initializeObject()
    {
        $this->books = GeneralUtility::makeInstance(ObjectStorage::class);
    }

    public function setBooks(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $books)
    {
        $this->books = $books;
    }

    public function getBooks(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->books;
    }

    public function getCapitalLetter(): string
    {
        return strtoupper($this->capitalLetter);
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setInfo(string $info)
    {
        $this->info = $info;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
