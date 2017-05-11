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
 * Class Book
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Book extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
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
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Author>
     * @lazy
     */
    protected $author;

    /**
     * @var string
     */
    protected $isbn;

    /**
     * @var \Evoweb\SfBooks\Domain\Model\Series
     */
    protected $series;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Category>
     * @lazy
     */
    protected $category;

    /**
     * @var string
     */
    protected $year;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Extras>
     * @lazy
     */
    protected $extras;

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

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->author = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->category = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->extras = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $author
     *
     * @return void
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
     *
     * @return void
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
     * @param string $cover
     *
     * @return void
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $description
     *
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $year
     *
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $extras
     *
     * @return void
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

    /**
     * @param string $isbn
     *
     * @return void
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param int $location1
     *
     * @return void
     */
    public function setLocation1($location1)
    {
        $this->location1 = $location1;
    }

    /**
     * @return int
     */
    public function getLocation1()
    {
        return $this->location1;
    }

    /**
     * @param int $location2
     *
     * @return void
     */
    public function setLocation2($location2)
    {
        $this->location2 = $location2;
    }

    /**
     * @return int
     */
    public function getLocation2()
    {
        return $this->location2;
    }

    /**
     * @param int $location3
     *
     * @return void
     */
    public function setLocation3($location3)
    {
        $this->location3 = $location3;
    }

    /**
     * @return int
     */
    public function getLocation3()
    {
        return $this->location3;
    }

    /**
     * @param string $number
     *
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param \Evoweb\SfBooks\Domain\Model\Series $series
     *
     * @return void
     */
    public function setSeries($series)
    {
        $this->series = $series;
    }

    /**
     * @return \Evoweb\SfBooks\Domain\Model\Series
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param string $subtitle
     *
     * @return void
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
