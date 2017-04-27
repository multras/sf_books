<?php
namespace Evoweb\SfBooks\Controller;

/**
 * This file is developed by evoweb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

/**
 * Plugin 'Book Library - Book' for the 'sf_books' extension.
 *
 * @package Evoweb\SfBooks\Controller
 */
class BookController extends AbstractController
{
    /**
     * @var array
     */
    protected $allowedOrderBy = array('title');

    /**
     * @var \Evoweb\SfBooks\Domain\Repository\BookRepository
     */
    protected $repository;

    /**
     * @param \Evoweb\SfBooks\Domain\Repository\BookRepository $repository
     */
    public function injectRepository(\Evoweb\SfBooks\Domain\Repository\BookRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return void
     */
    protected function initializeAction()
    {
        $this->setDefaultOrderings();
    }

    /**
     * @return void
     */
    protected function initializeListAction()
    {
        $this->settings['category'] = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(
            ',',
            $this->settings['category'],
            true
        );
    }

    /**
     * renders the list of books with search and pagination
     *
     * @return void
     */
    protected function listAction()
    {
        if (count($this->settings['category']) == 0
            || (count($this->settings['category']) == 1 && reset($this->settings['category']) < 1)
        ) {
            $books = $this->repository->findAll();
        } else {
            $books = $this->repository->findByCategory($this->settings['category']);
        }

        $this->view->assign('books', $books);
    }

    /**
     * renders the content for a single book
     *
     * @param \Evoweb\SfBooks\Domain\Model\Book $book
     *
     * @return void
     */
    protected function showAction(\Evoweb\SfBooks\Domain\Model\Book $book = null)
    {
        if ($book == null) {
            $this->getTypoScriptFrontendController()->pageNotFoundAndExit('Book not found');
        }

        // This sets the title of the page for use in indexed search results:
        if ($book->getTitle()) {
            $this->getTypoScriptFrontendController()->indexedDocTitle = $book->getTitle();
        }

        $this->view->assign('book', $book);
    }

    /**
     * @param string $query
     * @param string $searchBy
     *
     * @return void
     */
    protected function searchAction($query, $searchBy = '')
    {
        if (!$searchBy) {
            $searchBy = $this->settings['searchFields'] . ',' . $this->settings['bookSearchFields'];
        }

        $books = $this->repository->findBySearch($query, $searchBy);

        $this->view->assign('query', $query);
        $this->view->assign('books', $books);
    }
}
