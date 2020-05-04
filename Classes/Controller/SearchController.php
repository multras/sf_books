<?php

namespace Evoweb\SfBooks\Controller;

/*
 * This file is developed by evoWeb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

class SearchController extends AbstractController
{
    public function searchAction()
    {
    }

    /**
     * @param array $search
     */
    public function startSearchAction(array $search)
    {
        if (is_array($search) && isset($search['query']) && $search['query'] != '') {
            if (isset($search['searchBy'])) {
                switch ((string)$search['searchFor']) {
                    case 'author':
                        $this->redirect('search', 'Author', null, $search, $this->settings['authorPageId']);
                        break;

                    case 'book':
                    default:
                        $this->redirect('search', 'Book', null, $search, $this->settings['bookPageId']);
                }
            }
        } else {
            $this->forward('search');
        }
    }
}
