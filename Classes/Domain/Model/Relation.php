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
 * Relation
 */
class Relation extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Company $company
     * @datatablesdontdive
     */
    protected $company = null;

    /**
     * @var \CGB\Relax5core\Domain\Model\Person $person
     * @datatablesdontdive
     */
    protected $person = null;

    /**
     * sorting
     *
     * @var int
     */
    protected $sorting = 0;

    /**
     * Relation ID
     *
     * @var string
     */
    protected $relationId = '';

    /**
     * Type
     *
     * @var int
     */
    protected $type = 0;

    /**
     * Direction
     *
     * @var int
     */
    protected $direction = 0;

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * print
     *
     * @var bool
     */
    protected $print = false;

    /**
     * Share
     *
     * @var float
     */
    protected $share = 0.0;

    /**
     * Ziel
     *
     * @var \CGB\Relax5core\Domain\Model\Person
     * @lazy
     */
    protected $targetPerson = null;

    /**
     * Company
     *
     * @var \CGB\Relax5core\Domain\Model\Company
     * @lazy
     */
    protected $targetCompany = null;

    /**
     * Crosslink
     *
     * @var \CGB\Relax5core\Domain\Model\Relation
     * @lazy
     */
    protected $xLink = null;

    /**
     * Returns the relationId
     *
     * @return string $relationId
     */
    public function getRelationId()
    {
        return $this->relationId;
    }

    /**
     * Sets the relationId
     *
     * @param string $relationId
     * @return void
     */
    public function setRelationId($relationId)
    {
        $this->relationId = $relationId;
    }

    /**
     * Returns the type
     *
     * @return int $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param int $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns the direction
     *
     * @return int $direction
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * Sets the direction
     *
     * @param int $direction
     * @return void
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
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
     * Returns the print
     *
     * @return bool $print
     */
    public function getPrint()
    {
        return $this->print;
    }

    /**
     * Sets the print
     *
     * @param bool $print
     * @return void
     */
    public function setPrint($print)
    {
        $this->print = $print;
    }

    /**
     * Returns the boolean state of print
     *
     * @return bool
     */
    public function isPrint()
    {
        return $this->print;
    }

    /**
     * Returns the share
     *
     * @return float $share
     */
    public function getShare()
    {
        return $this->share;
    }

    /**
     * Sets the share
     *
     * @param float $share
     * @return void
     */
    public function setShare($share)
    {
        $this->share = $share;
    }

    /**
     * Returns the targetPerson
     *
     * @return \CGB\Relax5core\Domain\Model\Person targetPerson
     */
    public function getTargetPerson()
    {
        return $this->targetPerson;
    }

    /**
     * Sets the targetPerson
     *
     * @param \CGB\Relax5core\Domain\Model\Person $targetPerson
     * @return void
     */
    public function setTargetPerson(\CGB\Relax5core\Domain\Model\Person $targetPerson)
    {
        $this->targetPerson = $targetPerson;
    }

    /**
     * Returns the targetCompany
     *
     * @return \CGB\Relax5core\Domain\Model\Company targetCompany
     */
    public function getTargetCompany()
    {
        return $this->targetCompany;
    }

    /**
     * Sets the targetCompany
     *
     * @param \CGB\Relax5core\Domain\Model\Company $targetCompany
     * @return void
     */
    public function setTargetCompany(\CGB\Relax5core\Domain\Model\Company $targetCompany)
    {
        $this->targetCompany = $targetCompany;
    }

    /**
     * Returns the xLink
     *
     * @return \CGB\Relax5core\Domain\Model\Relation $xLink
     */
    public function getXLink()
    {
        return $this->xLink;
    }

    /**
     * Sets the xLink
     *
     * @param \CGB\Relax5core\Domain\Model\Relation $xLink
     * @return void
     */
    public function setXLink(\CGB\Relax5core\Domain\Model\Relation $xLink)
    {
        $this->xLink = $xLink;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @return \CGB\Relax5core\Domain\Model\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return int
     */
    function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @param type $sorting
     */
    function setSorting($sorting)
    {
        $this->sorting = $sorting;
    }

    function invertType()
    {
        if (abs($this->type) == 2 || abs($this->type) == 4) {
            return $this->type * -1;
        } else {
            return $this->type;
        }
    }
}
