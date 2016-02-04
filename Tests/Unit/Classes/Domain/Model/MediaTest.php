<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class MediaTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model
 */
class MediaTest extends UnitTestCase
{

    /**
     * @var \Tx_Phpunit_Framework
     */
    protected $testingFramework;

    /**
     * @var \TYPO3\CMS\Extbase\Object\ObjectManager
     */
    protected $objectManager;

    /**
     * @var \MoveElevator\MeMedia\Domain\Model\Media
     */
    protected $media;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->media = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media');
        $this->testingFramework = new \Tx_Phpunit_Framework('tx_memedia');
    }

    /**
     * @return void
     */
    public function tearDown()
    {
        $this->testingFramework->cleanUp();
        unset($this->object);
        unset($this->testingFramework);
        unset($this->objectManager);
        unset($this->media);
    }

    /**
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::setDescription
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::getDescription
     * @return void
     */
    public function testSetAndGetDescription()
    {
        $expected = 'description';
        $this->media->setDescription($expected);
        $this->assertEquals($expected, $this->media->getDescription());
    }

    /**
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::setTitle
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::getTitle
     * @return void
     */
    public function testSetAndGetTitle()
    {
        $expected = 'title';
        $this->media->setTitle($expected);
        $this->assertEquals($expected, $this->media->getTitle());
    }

    /**
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::setType
     * @covers \MoveElevator\MeMedia\Domain\Model\Media::getType
     * @return void
     */
    public function testSetAndGetType()
    {
        $expected = 'type';
        $this->media->setType($expected);
        $this->assertEquals($expected, $this->media->getType());
    }
}
