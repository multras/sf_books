<?php
namespace Evoweb\SfBooks\Controller;

/**
 * This file is developed by evoWeb.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

class CategoryController extends AbstractController
{
    /**
     * @var \Evoweb\SfBooks\Domain\Repository\CategoryRepository
     */
    protected $repository;

    /**
     * @param \Evoweb\SfBooks\Domain\Repository\CategoryRepository $repository
     */
    public function injectRepository(\Evoweb\SfBooks\Domain\Repository\CategoryRepository $repository)
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
            $categories = $this->repository->findAll();
        } else {
            $categories = $this->repository->findByCategories($this->settings['category']);
        }

        $categories = $this->removeExcludeCategories($categories);
        $this->view->assign('categories', $categories);
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\QueryResultInterface $categories
     *
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    protected function removeExcludeCategories(\TYPO3\CMS\Extbase\Persistence\QueryResultInterface $categories)
    {
        $excludeCategories = \TYPO3\CMS\Core\Utility\GeneralUtility::intExplode(
            ',',
            $this->settings['excludeCategories']
        );
        if (count($excludeCategories)) {
            /** @var $category \Evoweb\SfBooks\Domain\Model\Category */
            foreach ($categories as $category) {
                if (in_array($category->getUid(), $excludeCategories)) {
                    $categories->offsetUnset($categories->key());
                }
            }
        }

        return $categories;
    }

    /**
     * renders the content for a single category
     *
     * @param \Evoweb\SfBooks\Domain\Model\Category $category
     */
    protected function showAction(\Evoweb\SfBooks\Domain\Model\Category $category)
    {
        // This sets the title of the page for use in indexed search results:
        if ($category->getTitle()) {
            $this->getTypoScriptFrontendController()->indexedDocTitle = $category->getTitle();
        }

        $this->view->assign('category', $category);
    }
}
