<?php
namespace Evoweb\SfBooks\Domain\Model;

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
 * Class Extras
 *
 * @package Evoweb\SfBooks\Domain\Model
 */
class Extras extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \Evoweb\SfBooks\Domain\Model\ExtrasLabels
     * @TYPO3\CMS\Extbase\Annotation\ORM\Lazy
     */
    protected $label;

    /**
     * @var int
     */
    protected $type = 0;

    /**
     * @var string
     */
    protected $content;

    public function setLabel(\Evoweb\SfBooks\Domain\Model\ExtrasLabels $label)
    {
        $this->label = $label;
    }

    public function getLabel(): \Evoweb\SfBooks\Domain\Model\ExtrasLabels
    {
        return $this->label;
    }

    public function setType(int $type)
    {
        $this->type = $type;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setContent(string $content)
    {
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
