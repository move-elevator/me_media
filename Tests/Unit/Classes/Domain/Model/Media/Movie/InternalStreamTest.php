<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class InternalStreamTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie
 */
class InternalStreamTest extends UnitTestCase {

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream
	 */
	protected $internalStream;

	/**
	 * @return void
	 */
	public function setUp() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->internalStream = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream');
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
		unset($this->internalStream);
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream::setFile
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie\InternalStream::getFile
	 * @return void
	 */
	public function testSetAndGetFile() {
		/** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $expectedFile */
		$expected = $this->objectManager->get('TYPO3\CMS\Extbase\Domain\Model\FileReference');
		$this->internalStream->setFile($expected);
		$this->assertInstanceOf('TYPO3\CMS\Extbase\Domain\Model\FileReference', $this->internalStream->getFile());
	}
}

?>