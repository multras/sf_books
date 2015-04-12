<?php
namespace Evoweb\SfBooks\Controller;
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
 * Plugin 'Book Library - Search' for the 'sf_books' extension.
 *
 * @author Sebastian Fischer <typo3@evoweb.de>
 */
class SearchController extends AbstractController {
	/**
	 * @return void
	 */
	public function searchAction() {
	}

	/**
	 * @param array $search
	 * @return void
	 */
	public function startSearchAction($search) {
		if (is_array($search) && isset($search['query']) && $search['query'] != '') {
			if (isset($search['searchBy'])) {
				switch ((string) $search['searchFor']) {
					case 'author':
						$this->redirect('search', 'Author', NULL, $search);
						break;

					case 'book':
					default:
						$this->redirect('search', 'Book', NULL, $search);
				}
			}
		} else {
			$this->forward('search');
		}
	}
}
