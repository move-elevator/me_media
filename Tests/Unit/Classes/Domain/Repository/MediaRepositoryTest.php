<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class MediaRepositoryTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Repository
 */
class MediaRepositoryTest extends UnitTestCase
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
     * @var \MoveElevator\MeMedia\Domain\Repository\MediaRepository
     */
    protected $mediaRepository;

    /**
     * @var array
     */
    protected $dummyRecords = array(
        array(
            'tx_extbase_type' => 'MoveElevator\MeMedia\Domain\Model\Media\Audio',
            'title' => 'audio',
            'pid' => self::MEDIA_PAGE_ID
        ),
        array(
            'tx_extbase_type' => 'MoveElevator\MeMedia\Domain\Model\Media\Movie\Video',
            'title' => 'video',
            'pid' => self::MEDIA_PAGE_ID
        ),
        array(
            'tx_extbase_type' => 'MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream',
            'title' => 'externalStream',
            'pid' => self::MEDIA_PAGE_ID
        ),
        array(
            'tx_extbase_type' => 'MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream',
            'title' => 'internalStream',
            'pid' => self::MEDIA_PAGE_ID
        )
    );

    const MEDIA_PAGE_ID = 9999;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->mediaRepository = $this->objectManager->get('MoveElevator\MeMedia\Domain\Repository\MediaRepository');
        $this->testingFramework = new \Tx_Phpunit_Framework('tx_memedia');
        $this->createDummyData();
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
        unset($this->mediaRepository);
    }

    /**
     * @covers \MoveElevator\MeMedia\Domain\Repository\MediaRepository::findAll
     * @return void
     */
    public function testFindAll()
    {
        /** @var \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $records */
        $records = $this->mediaRepository->findAll(self::MEDIA_PAGE_ID);
        $this->assertCount(4, $records);
    }

    /**
     * Test method "findByUid" an mapping of subclasses
     *
     * @covers \MoveElevator\MeMedia\Domain\Repository\MediaRepository::findByUid
     * @return void
     */
    public function testByUid()
    {
        foreach ($this->dummyRecords as $expectedRecord) {
            $media = $this->mediaRepository->findByUid($expectedRecord['uid']);
            $this->assertInstanceOf($expectedRecord['tx_extbase_type'], $media);
        }
    }

    /**
     * Create expected dummy data
     *
     * @return void
     */
    protected function createDummyData()
    {
        foreach ($this->dummyRecords as $index => $record) {
            $this->dummyRecords[$index]['uid'] = $this->testingFramework->createRecord(
                'tx_memedia_domain_model_media',
                $record
            );
        }
    }
}
