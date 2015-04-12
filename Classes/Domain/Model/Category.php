<?php
namespace Evoweb\SfBooks\Domain\Model;
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
 * Class Category
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Category extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
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
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Book>
	 * @lazy
	 */
	protected $books;

	/**
	 * @param \Evoweb\SfBooks\Domain\Model\Category $parent
	 * @return void
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * @return \Evoweb\SfBooks\Domain\Model\Category
	 */
	public function getParent() {
		return $this->parent;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $books
	 */
	public function setBooks($books) {
		$this->books = $books;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getBooks() {
		return $this->books;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
}
