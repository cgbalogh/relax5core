<?php
namespace CGB\Relax5core\Domain\Model;

/***
 *
 * This file is part of the "relax5core" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Christoph Balogh <cb@lustige-informatik.at>
 *
 ***/

/**
 * SourceCategory
 */
class SourceCategory extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * sources
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Source>
     * @cascade remove
     */
    protected $sources = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->sources = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Source
     *
     * @param \CGB\Relax5core\Domain\Model\Source $source
     * @return void
     */
    public function addSource(\CGB\Relax5core\Domain\Model\Source $source)
    {
        $this->sources->attach($source);
    }

    /**
     * Removes a Source
     *
     * @param \CGB\Relax5core\Domain\Model\Source $sourceToRemove The Source to be removed
     * @return void
     */
    public function removeSource(\CGB\Relax5core\Domain\Model\Source $sourceToRemove)
    {
        $this->sources->detach($sourceToRemove);
    }

    /**
     * Returns the sources
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Source> $sources
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * Sets the sources
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Source> $sources
     * @return void
     */
    public function setSources(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sources)
    {
        $this->sources = $sources;
    }
}
