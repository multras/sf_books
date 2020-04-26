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

use Evoweb\SfBooks\Domain\Repository\SeriesRepository;

class SeriesController extends AbstractController
{
    /**
     * @var SeriesRepository
     */
    protected $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function listAction()
    {
        $seriesGroups = $this->repository->findSeriesGroupedByLetters();

        $this->view->assign('seriesGroups', $seriesGroups);
    }

    protected function showAction(\Evoweb\SfBooks\Domain\Model\Series $series = null)
    {
        if ($series == null) {
            $this->displayError('Series');
        }

        $this->setPageTitle($series->getTitle());
        $this->view->assign('series', $series);
    }
}
