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

use Evoweb\SfBooks\Domain\Repository\AuthorRepository;

class AuthorController extends AbstractController
{
    /**
     * @var AuthorRepository
     */
    protected $repository;

    public function __construct(AuthorRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function listAction()
    {
        $authorGroups = $this->repository->findAuthorGroupedByLetters();

        $this->view->assign('authorGroups', $authorGroups);
    }

    protected function showAction(\Evoweb\SfBooks\Domain\Model\Author $author = null)
    {
        if ($author == null) {
            $this->displayError('Author');
        }

        $this->setPageTitle($author->getLastname() . ', ' . $author->getFirstname());
        $this->view->assign('author', $author);
    }

    protected function searchAction(string $query, string $searchBy = '')
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
