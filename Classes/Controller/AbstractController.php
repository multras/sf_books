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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;

abstract class AbstractController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * @var array
     */
    protected $allowedOrderBy = [];

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\Repository
     */
    protected $repository;

    protected function initializeAction()
    {
        $this->setDefaultOrderings();
    }

    protected function setDefaultOrderings()
    {
        if (isset($this->settings['allowedOrderBy'])) {
            $this->allowedOrderBy = GeneralUtility::trimExplode(',', $this->settings['allowedOrderBy']);
        }

        $orderBy = $orderDir = '';
        if ($this->request->hasArgument('orderBy')
            && in_array($this->request->getArgument('orderBy'), $this->allowedOrderBy)
        ) {
            $orderBy = $this->request->getArgument('orderBy');
        } elseif (in_array($this->settings['orderBy'], $this->allowedOrderBy)) {
            $orderBy = $this->settings['orderBy'];
        }

        if ($this->request->hasArgument('orderDir')
            && (
                $this->request->getArgument('orderDir') == QueryInterface::ORDER_ASCENDING
                || $this->request->getArgument('orderDir') == QueryInterface::ORDER_DESCENDING
            )
        ) {
            $orderDir = $this->request->getArgument('orderDir');
        } elseif ($this->settings['orderDir'] == QueryInterface::ORDER_ASCENDING
            || $this->settings['orderDir'] == QueryInterface::ORDER_DESCENDING
        ) {
            $orderDir = $this->settings['orderDir'];
        }

        if (empty($orderDir)) {
            $orderDir = QueryInterface::ORDER_ASCENDING;
        }

        if ($orderBy) {
            $defaultOrderings = array_merge([$orderBy => $orderDir], (array)$this->settings['orderings']);
            $this->repository->setDefaultOrderings($defaultOrderings);
        }
    }

    /**
     * Initializes the view before invoking an action method.
     * Override this method to solve assign variables common for all actions
     * or prepare the view in another way before the action is called.
     *
     * @param \TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view The view
     */
    protected function initializeView(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface $view)
    {
        if (isset($this->settings['templatePath']) && !empty($this->settings['templatePath'])) {
            /** @var $view \TYPO3\CMS\Fluid\View\TemplateView */
            $view->setTemplatePathAndFilename(array_shift(explode(' ', $this->settings['templatePath'])));
        }
    }

    protected function getTypoScriptFrontendController(): \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'];
    }
}
