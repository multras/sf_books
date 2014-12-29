<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2007 Sebastian Fischer (typo3@fischer.im)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
* tx_sfbooks_pi1_testcase.php
*
* Provides unit tests.
*
* $Id$
*
* @author		Sebastian Fischer <typo3@fischer.im>
*/

require_once(t3lib_extMgm::extPath('sf_books') . 'pi1/class.tx_sfbooks_pi1.php');
include_once(PATH_tslib . 'class.tslib_content.php');

/**
 * This class provides tests cases for the sf_books_pi1
 *
 * WARNING: Never ever run a unit test like this on a live site!
 *
 *
 * @author		Sebastian Fischer <ligaard@daimi.au.dk>
 */
class tx_sfbooks_pi1_testcase extends tx_phpunit_testcase {
	/**
	 * @author Sebastian Fischer <typo3@fischer.im>
	 */
	public function setUp() {
		$this->fixture = new tx_sfbooks_pi1;
		$this->fixture->cObj = t3lib_div::makeInstance('tslib_cObj');
	}

	/**
	 * @author Sebastian Fischer <typo3@fischer.im>
	 */
	public function tearDown() {
		unset($this->fixture);
	}

	public function testgetFieldHeaderForUnknownLabel() {
		// Assert that the replacement label gets rendered for unknown label
		$this->assertEquals('test_label',
			$this->fixture->getFieldHeader('test_label')
		);
	}

	public function testgetFieldHeaderForKnownLabel() {
		$this->fixture->LOCAL_LANG['default']['listHeader_test_knownlabel'] = 'test_label';

		// Assert that the label gets rendered for known label
		$this->assertEquals('test_label',
			$this->fixture->getFieldHeader('test_knownlabel')
		);

		unset($this->fixture->LOCAL_LANG['default']['listHeader_test_knownlabel']);
	}

	public function testgetFieldHeaderForUnknownTitleLabel() {
		// Assert that the replacement label gets rendered for unknown title label
		$this->assertEquals('title',
			$this->fixture->getFieldHeader('title')
		);
	}

	public function testgetFieldHeaderForKnownTitleLabel() {
		$this->fixture->LOCAL_LANG['default']['listHeader_title'] = 'test_label';

		// Assert that the label gets rendered for known title label
		$this->assertEquals('test_label',
			$this->fixture->getFieldHeader('title')
		);

		unset($this->fixture->LOCAL_LANG['default']['listHeader_title']);
	}
}

?>