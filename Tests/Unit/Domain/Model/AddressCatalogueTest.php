<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class AddressCatalogueTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\AddressCatalogue
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\AddressCatalogue();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getCountryCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCountryCode()
        );
    }

    /**
     * @test
     */
    public function setCountryCodeForStringSetsCountryCode()
    {
        $this->subject->setCountryCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'countryCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStreetCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getStreetCode()
        );
    }

    /**
     * @test
     */
    public function setStreetCodeForStringSetsStreetCode()
    {
        $this->subject->setStreetCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'streetCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommunityCodeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCommunityCode()
        );
    }

    /**
     * @test
     */
    public function setCommunityCodeForStringSetsCommunityCode()
    {
        $this->subject->setCommunityCode('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'communityCode',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCommunityNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCommunityName()
        );
    }

    /**
     * @test
     */
    public function setCommunityNameForStringSetsCommunityName()
    {
        $this->subject->setCommunityName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'communityName',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAddressReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAddress()
        );
    }

    /**
     * @test
     */
    public function setAddressForStringSetsAddress()
    {
        $this->subject->setAddress('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'address',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZipReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getZip()
        );
    }

    /**
     * @test
     */
    public function setZipForStringSetsZip()
    {
        $this->subject->setZip('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'zip',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getStateReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getState()
        );
    }

    /**
     * @test
     */
    public function setStateForStringSetsState()
    {
        $this->subject->setState('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'state',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVerifiedReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getVerified()
        );
    }

    /**
     * @test
     */
    public function setVerifiedForBoolSetsVerified()
    {
        $this->subject->setVerified(true);

        self::assertAttributeEquals(
            true,
            'verified',
            $this->subject
        );
    }
}
