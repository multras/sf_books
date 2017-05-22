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
 * Class Category
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var \Evoweb\SfBooks\Domain\Model\Category
     * @lazy
     */
    protected $parent;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Category>
     * @lazy
     */
    protected $children;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Book>
     * @lazy
     */
    protected $books;

    /**
     * @param string $title
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

    /**
     * @param \Evoweb\SfBooks\Domain\Model\Category $parent
     *
     * @return void
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return \Evoweb\SfBooks\Domain\Model\Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Category> $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
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
}
