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
 * Class Series
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Series extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
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
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Evoweb\SfBooks\Domain\Model\Book>
	 * @lazy
	 */
	protected $books;

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $books
	 * @return void
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
	 * @return string
	 */
	public function getCapitalLetter() {
		return strtoupper($this->capitalLetter);
	}

	/**
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $info
	 * @return void
	 */
	public function setInfo($info) {
		$this->info = $info;
	}

	/**
	 * @return string
	 */
	public function getInfo() {
		return $this->info;
	}

	/**
	 * @param string $title
	 * @return void
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
