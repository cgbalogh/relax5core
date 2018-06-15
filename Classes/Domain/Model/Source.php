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
class Source extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * sourcedetails
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Sourcedetail>
     * @cascade remove
     */
    protected $sourcedetails = null;

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
        $this->sourcedetails = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * @param \CGB\Relax5core\Domain\Model\Sourcedetail $sourcedetail
     * @return void
     */
    public function addSourcedetail(\CGB\Relax5core\Domain\Model\Sourcedetail $sourcedetail)
    {
        $this->sourcedetails->attach($sourcedetail);
    }

    /**
     * Removes a Source
     *
     * @param \CGB\Relax5core\Domain\Model\Sourcedetail $sourcedetailToRemove The Sourcedetail to be removed
     * @return void
     */
    public function removeSourcedetail(\CGB\Relax5core\Domain\Model\Sourcedetail $sourcedetailToRemove)
    {
        $this->sourcedetails->detach($sourcedetailToRemove);
    }

    /**
     * Returns the sourcedetails
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Sourcedetail> sourcedetails
     */
    public function getSourcedetails()
    {
        return $this->sourcedetails;
    }

    /**
     * Sets the sourcedetails
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CGB\Relax5core\Domain\Model\Sourcedetail> $sourcedetails
     * @return void
     */
    public function setSourcedetails(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $sourcedetails)
    {
        $this->sourcedetails = $sourcedetails;
    }
}
