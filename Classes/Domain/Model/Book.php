<?php

namespace Evoweb\SfBooks\Domain\Model;

/*
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

class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Author>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $author;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Category>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $category;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Extras>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $extras;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $cover;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $coverLarge;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $samplePdf;

    /**
     * @var \Evoweb\SfBooks\Domain\Model\Series
     */
    protected $series;

    /**
     * @var string
     */
    protected $number;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $subtitle;

    /**
     * @var string
     */
    protected $isbn;

    /**
     * @var string
     */
    protected $year;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var integer
     */
    protected $location1;

    /**
     * @var integer
     */
    protected $location2;

    /**
     * @var integer
     */
    protected $location3;

    public function initializeObject()
    {
        $this->author = GeneralUtility::makeInstance(ObjectStorage::class);
        $this->category = GeneralUtility::makeInstance(ObjectStorage::class);
        $this->extras = GeneralUtility::makeInstance(ObjectStorage::class);
        $this->cover = GeneralUtility::makeInstance(ObjectStorage::class);
        $this->coverLarge = GeneralUtility::makeInstance(ObjectStorage::class);
        $this->samplePdf = GeneralUtility::makeInstance(ObjectStorage::class);
    }

    public function setAuthor(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $author)
    {
        $this->author = $author;
    }

    public function getAuthor(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->author;
    }

    public function setCategory(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $category)
    {
        $this->category = $category;
    }

    public function getCategory(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->category;
    }

    public function setExtras(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $extras)
    {
        $this->extras = $extras;
    }

    public function getExtras(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->extras;
    }

    public function setCover(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cover)
    {
        $this->cover = $cover;
    }

    public function getCover(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->cover;
    }

    public function setCoverLarge(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $coverLarge)
    {
        $this->coverLarge = $coverLarge;
    }

    public function getCoverLarge(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->coverLarge;
    }

    public function setSamplePdf(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $samplePdf)
    {
        $this->samplePdf = $samplePdf;
    }

    public function getSamplePdf(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->samplePdf;
    }

    public function setSeries(\Evoweb\SfBooks\Domain\Model\Series $series)
    {
        $this->series = $series;
    }

    public function getSeries(): ?\Evoweb\SfBooks\Domain\Model\Series
    {
        return $this->series;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setYear(string $year)
    {
        $this->year = $year;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setIsbn(string $isbn)
    {
        $this->isbn = $isbn;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setLocation1(int $location1)
    {
        $this->location1 = $location1;
    }

    public function getLocation1(): int
    {
        return $this->location1;
    }

    public function setLocation2(int $location2)
    {
        $this->location2 = $location2;
    }

    public function getLocation2(): int
    {
        return $this->location2;
    }

    public function setLocation3(int $location3)
    {
        $this->location3 = $location3;
    }

    public function getLocation3(): int
    {
        return $this->location3;
    }

    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
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
