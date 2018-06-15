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
 * Type
 */
class Type extends \TYPO3\CMS\Extbase\DomainObject\AbstractValueObject
{
    /**
     * Name
     *
     * @var string
     * @validate NotEmpty
     */
    protected $name = '';

    /**
     * Scope
     *
     * @var int
     * @validate NotEmpty
     */
    protected $scope = 0;

    /**
     * eval
     *
     * @var int
     */
    protected $eval = 0;

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @validate NotEmpty
     * @cascade remove
     */
    protected $image = null;

    /**
     * Wrap
     *
     * @var string
     */
    protected $wrap = '';

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
     * Returns the scope
     *
     * @return int $scope
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Sets the scope
     *
     * @param int $scope
     * @return void
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the eval
     *
     * @return int $eval
     */
    public function getEval()
    {
        return $this->eval;
    }

    /**
     * Sets the eval
     *
     * @param int $eval
     * @return void
     */
    public function setEval($eval)
    {
        $this->eval = $eval;
    }

    /**
     * Returns the wrap
     *
     * @return string $wrap
     */
    public function getWrap()
    {
        return $this->wrap;
    }

    /**
     * Sets the wrap
     *
     * @param string $wrap
     * @return void
     */
    public function setWrap($wrap)
    {
        $this->wrap = $wrap;
    }
}
