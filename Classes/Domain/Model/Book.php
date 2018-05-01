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
     * @var string
     */
    protected $cover;

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

    public function __construct()
    {
        $this->author = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->extras = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param \Evoweb\SfBooks\Domain\Model\Category $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $extras
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getExtras()
    {
        return $this->extras;
    }

    public function setSeries(\Evoweb\SfBooks\Domain\Model\Series $series)
    {
        $this->series = $series;
    }

    public function getSeries(): \Evoweb\SfBooks\Domain\Model\Series
    {
        return $this->series;
    }

    public function setCover(string $cover)
    {
        $this->cover = $cover;
    }

    public function getCover(): string
    {
        return $this->cover;
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
