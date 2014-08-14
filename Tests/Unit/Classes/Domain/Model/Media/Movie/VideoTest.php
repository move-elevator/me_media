<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class VideoTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie
 */
class VideoTest extends UnitTestCase {

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Model\Media\Movie\Video
	 */
	protected $video;

	/**
	 * @return void
	 */
	public function setUp() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->video = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media\Movie\Video');
		$this->testingFramework = new \Tx_Phpunit_Framework('tx_memedia');
	}

	/**
	 * @return void
	 */
	public function tearDown() {
		$this->testingFramework->cleanUp();
		unset($this->object);
		unset($this->testingFramework);
		unset($this->objectManager);
		unset($this->video);
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie\Video::setFileList
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie\Video::getFileList
	 * @return void
	 */
	public function testSetAndGetFileList() {
		/** @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage $expectedStorage */
		$expected = $this->objectManager->get('TYPO3\CMS\Extbase\Persistence\ObjectStorage');
		$this->video->setFileList($expected);
		$this->assertInstanceOf('TYPO3\CMS\Extbase\Persistence\ObjectStorage', $this->video->getFileList());
	}
}

?>