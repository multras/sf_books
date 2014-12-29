<?php

class Tx_SfBooks_Domain_Model_Category extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var Tx_SfBooks_Domain_Model_Category
	 * @lazy
	 */
	protected $parent;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SfBooks_Domain_Model_Book>
	 * @lazy
	 */
	protected $books;

	/**
	 * @param \Tx_SfBooks_Domain_Model_Category $parent
	 */
	public function setParent($parent) {
		$this->parent = $parent;
	}

	/**
	 * @return \Tx_SfBooks_Domain_Model_Category
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

?>