<?php

declare(strict_types=1);

/*
 * This file is copied from the TYPO3 CMS install tool package.
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

namespace Evoweb\SfBooks\Updates;

/**
 * Fills tx_sfbooks_domain_model_category.path_segment with a proper value for pages that do not have a slug updater.
 * Does not take "deleted" authors into account, but respects workspace records.
 *
 * @internal This class is only meant to be used within EXT:install and is not part of the TYPO3 Core API.
 */
class PopulateCategorySlugs extends AbstractPopulateSlugs
{
    /**
     * @var string
     */
    protected $table = 'tx_sfbooks_domain_model_category';

    /**
     * @var string
     */
    protected $fieldName = 'path_segment';

    /**
     * @var string
     */
    protected $identifier = 'sfBooksCategoriesSlugs';

    /**
     * @return string Title of this updater
     */
    public function getTitle(): string
    {
        return 'Introduce URL parts ("slugs") to all existing categories';
    }

    /**
     * @return string Longer description of this updater
     */
    public function getDescription(): string
    {
        return 'TYPO3 includes native URL handling. Every category record has its own speaking URL path'
            . ' called "path_segment" which can be edited in TYPO3 Backend. However, it is necessary'
            . ' that all categories have a URL pre-filled. This is done by evaluating the category title.';
    }
}
