<?php

class Tx_SfBooks_Domain_Model_Book extends Tx_Extbase_DomainObject_AbstractEntity {
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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SfBooks_Domain_Model_Author>
	 * @lazy
	 */
	protected $author;

	/**
	 * @var string
	 */
	protected $isbn;

	/**
	 * @var Tx_SfBooks_Domain_Model_Series
	 */
	protected $serie;

	/**
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SfBooks_Domain_Model_Category>
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
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_SfBooks_Domain_Model_Extras>
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
	 *
	 */
	public function __construct() {
		$this->author = new Tx_Extbase_Persistence_ObjectStorage();
		$this->category = new Tx_Extbase_Persistence_ObjectStorage();
		$this->extras = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $author
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param \Tx_SfBooks_Domain_Model_Category $category
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * @return \Tx_SfBooks_Domain_Model_Category
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * @param string $cover
	 */
	public function setCover($cover) {
		$this->cover = $cover;
	}

	/**
	 * @return string
	 */
	public function getCover() {
		return $this->cover;
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
	 * @param string $year
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * @return string
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param \Tx_Extbase_Persistence_ObjectStorage $extras
	 */
	public function setExtras($extras) {
		$this->extras = $extras;
	}

	/**
	 * @return \Tx_Extbase_Persistence_ObjectStorage
	 */
	public function getExtras() {
		return $this->extras;
	}

	/**
	 * @param string $isbn
	 */
	public function setIsbn($isbn) {
		$this->isbn = $isbn;
	}

	/**
	 * @return string
	 */
	public function getIsbn() {
		return $this->isbn;
	}

	/**
	 * @param int $location1
	 */
	public function setLocation1($location1) {
		$this->location1 = $location1;
	}

	/**
	 * @return int
	 */
	public function getLocation1() {
		return $this->location1;
	}

	/**
	 * @param int $location2
	 */
	public function setLocation2($location2) {
		$this->location2 = $location2;
	}

	/**
	 * @return int
	 */
	public function getLocation2() {
		return $this->location2;
	}

	/**
	 * @param int $location3
	 */
	public function setLocation3($location3) {
		$this->location3 = $location3;
	}

	/**
	 * @return int
	 */
	public function getLocation3() {
		return $this->location3;
	}

	/**
	 * @param string $number
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * @return string
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @param \Tx_SfBooks_Domain_Model_Series $serie
	 */
	public function setSerie($serie) {
		$this->serie = $serie;
	}

	/**
	 * @return \Tx_SfBooks_Domain_Model_Series
	 */
	public function getSerie() {
		return $this->serie;
	}

	/**
	 * @param  $subtitle
	 */
	public function setSubtitle($subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * @return string
	 */
	public function getSubtitle() {
		return $this->subtitle;
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