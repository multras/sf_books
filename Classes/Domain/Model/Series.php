<?php
namespace Evoweb\SfBooks\Domain\Model;

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
 * Class Series
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
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

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getBooks()
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
