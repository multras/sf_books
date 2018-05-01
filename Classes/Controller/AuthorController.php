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

class AuthorController extends AbstractController
{
    /**
     * @var \Evoweb\SfBooks\Domain\Repository\AuthorRepository
     */
    protected $repository;

    /**
     * @param \Evoweb\SfBooks\Domain\Repository\AuthorRepository $repository
     */
    public function injectRepository(\Evoweb\SfBooks\Domain\Repository\AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function listAction()
    {
        $authorGroups = $this->repository->findAuthorGroupedByLetters();

        $this->view->assign('authorGroups', $authorGroups);
    }

    /**
     * @param \Evoweb\SfBooks\Domain\Model\Author $author
     */
    protected function showAction(\Evoweb\SfBooks\Domain\Model\Author $author = null)
    {
        if ($author == null) {
            echo \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Controller\ErrorPageController::class
            )->errorAction(
                'Page Not Found',
                'The page did not exist or was inaccessible. Reason: Author not found'
            );
            die();
        }

        // This sets the title of the page for use in indexed search results:
        if ($author->getLastname()) {
            $this->getTypoScriptFrontendController()->indexedDocTitle =
                $author->getLastname() . ', ' . $author->getFirstname();
        }

        $this->view->assign('author', $author);
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

        $authors = $this->repository->findBySearch($query, $searchBy);

        $this->view->assign('query', $query);
        $this->view->assign('authors', $authors);
    }
}
