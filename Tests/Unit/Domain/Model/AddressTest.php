<?php
namespace CGB\Relax5core\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christoph Balogh <cb@lustige-informatik.at>
 */
class AddressTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CGB\Relax5core\Domain\Model\Address
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \CGB\Relax5core\Domain\Model\Address();
    }

    protected function tearDown()
    {
        parent::tearDown();
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
    public function getNumberReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberForIntSetsNumber()
    {
        $this->subject->setNumber(12);

        self::assertAttributeEquals(
            12,
            'number',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNumberAdditionsReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNumberAdditions()
        );
    }

    /**
     * @test
     */
    public function setNumberAdditionsForStringSetsNumberAdditions()
    {
        $this->subject->setNumberAdditions('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'numberAdditions',
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
    public function getCityReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity()
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'city',
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
    public function getCountryReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getCountry()
        );
    }

    /**
     * @test
     */
    public function setCountryForStringSetsCountry()
    {
        $this->subject->setCountry('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'country',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getLatReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getLat()
        );
    }

    /**
     * @test
     */
    public function setLatForFloatSetsLat()
    {
        $this->subject->setLat(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'lat',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getLonReturnsInitialValueForFloat()
    {
        self::assertSame(
            0.0,
            $this->subject->getLon()
        );
    }

    /**
     * @test
     */
    public function setLonForFloatSetsLon()
    {
        $this->subject->setLon(3.14159265);

        self::assertAttributeEquals(
            3.14159265,
            'lon',
            $this->subject,
            '',
            0.000000001
        );
    }

    /**
     * @test
     */
    public function getGeoOnlyReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getGeoOnly()
        );
    }

    /**
     * @test
     */
    public function setGeoOnlyForBoolSetsGeoOnly()
    {
        $this->subject->setGeoOnly(true);

        self::assertAttributeEquals(
            true,
            'geoOnly',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAllowMailReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getAllowMail()
        );
    }

    /**
     * @test
     */
    public function setAllowMailForBoolSetsAllowMail()
    {
        $this->subject->setAllowMail(true);

        self::assertAttributeEquals(
            true,
            'allowMail',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getAdditionalInfoReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getAdditionalInfo()
        );
    }

    /**
     * @test
     */
    public function setAdditionalInfoForStringSetsAdditionalInfo()
    {
        $this->subject->setAdditionalInfo('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'additionalInfo',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getVerifiedReturnsInitialValueForDateTime()
    {
        self::assertEquals(
            null,
            $this->subject->getVerified()
        );
    }

    /**
     * @test
     */
    public function setVerifiedForDateTimeSetsVerified()
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setVerified($dateTimeFixture);

        self::assertAttributeEquals(
            $dateTimeFixture,
            'verified',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getPermissionsReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getPermissions()
        );
    }

    /**
     * @test
     */
    public function setPermissionsForIntSetsPermissions()
    {
        $this->subject->setPermissions(12);

        self::assertAttributeEquals(
            12,
            'permissions',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getZoomReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getZoom()
        );
    }

    /**
     * @test
     */
    public function setZoomForIntSetsZoom()
    {
        $this->subject->setZoom(12);

        self::assertAttributeEquals(
            12,
            'zoom',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMapTypeReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getMapType()
        );
    }

    /**
     * @test
     */
    public function setMapTypeForStringSetsMapType()
    {
        $this->subject->setMapType('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'mapType',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getTypeReturnsInitialValueForType()
    {
        self::assertEquals(
            null,
            $this->subject->getType()
        );
    }

    /**
     * @test
     */
    public function setTypeForTypeSetsType()
    {
        $typeFixture = new \CGB\Relax5core\Domain\Model\Type();
        $this->subject->setType($typeFixture);

        self::assertAttributeEquals(
            $typeFixture,
            'type',
            $this->subject
        );
    }
}
