<?php

class Tx_SfBooks_Domain_Model_Series extends Tx_Extbase_DomainObject_AbstractEntity {
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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SfBooks_Domain_Model_Book>
	 * @lazy
	 */
	protected $books;

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
	 * @return string
	 */
	public function getCapitalLetter() {
		return strtoupper($this->capitalLetter);
	}

	/**
	 * @param string $description
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

?>