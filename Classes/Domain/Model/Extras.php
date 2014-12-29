<?php

class Tx_SfBooks_Domain_Model_Extras extends Tx_Extbase_DomainObject_AbstractEntity {
	/**
	 * @var \Tx_SfBooks_Domain_Model_ExtrasLabels
	 * @lazy
	 */
	protected $label;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param \Tx_SfBooks_Domain_Model_ExtrasLabels $label
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return \Tx_SfBooks_Domain_Model_ExtrasLabels
	 */
	public function getLabel() {
		return $this->label;
	}
}

?>