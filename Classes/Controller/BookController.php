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

class BookController extends AbstractController
{
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
     */
    protected function listAction()
    {
        if (count($this->settings['category']) == 0
            || (count($this->settings['category']) == 1 && reset($this->settings['category']) < 1)
        ) {
            $books = $this->repository->findAll();
        } else {
            $books = $this->repository->findByCategories($this->settings['category']);
        }

        $this->view->assign('books', $books);
    }

    /**
     * renders the content for a single book
     *
     * @param \Evoweb\SfBooks\Domain\Model\Book $book
     */
    protected function showAction(\Evoweb\SfBooks\Domain\Model\Book $book = null)
    {
        if ($book == null) {
            echo \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Controller\ErrorPageController::class
            )->errorAction(
                'Page Not Found',
                'The page did not exist or was inaccessible. Reason: Book not found'
            );
            die();
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
     */
    protected function searchAction($query, $searchBy = '')
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
