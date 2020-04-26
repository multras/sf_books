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

use Evoweb\SfBooks\Domain\Repository\BookRepository;

class BookController extends AbstractController
{
    /**
     * @var BookRepository
     */
    protected $repository;

    /**
     * @param BookRepository $repository
     */
    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function initializeListAction()
    {
        $this->settings['category'] = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(
            ',',
            $this->settings['category'],
            true
        );
    }

    protected function listAction()
    {
        if (
            count($this->settings['category']) == 0
            || (count($this->settings['category']) == 1 && reset($this->settings['category']) < 1)
        ) {
            $books = $this->repository->findAll();
        } else {
            $books = $this->repository->findByCategories($this->settings['category']);
        }

        $this->view->assign('books', $books);
    }

    protected function showAction(\Evoweb\SfBooks\Domain\Model\Book $book = null)
    {
        if ($book == null) {
            $this->displayError('Book');
        }

        $this->setPageTitle($book->getTitle());
        $this->view->assign('book', $book);
    }

    protected function searchAction(string $query, string $searchBy = '')
    {
        if (!$searchBy) {
            $searchBy = $this->settings['searchFields'];
        }
        $searchBy = \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $searchBy, true);

        $books = $this->repository->findBySearch($query, $searchBy);

        $this->view->assign('query', $query);
        $this->view->assign('books', $books);
    }
}
