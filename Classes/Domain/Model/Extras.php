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
 * Class Extras
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Extras extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	/**
	 * @var \Evoweb\SfBooks\Domain\Model\ExtrasLabels
	 * @lazy
	 */
	protected $label;

	/**
	 * @var string
	 */
	protected $content;

	/**
	 * @param string $content
	 * @return void
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
	 * @param \Evoweb\SfBooks\Domain\Model\ExtrasLabels $label
	 * @return void
	 */
	public function setLabel($label) {
		$this->label = $label;
	}

	/**
	 * @return \Evoweb\SfBooks\Domain\Model\ExtrasLabels
	 */
	public function getLabel() {
		return $this->label;
	}
}
