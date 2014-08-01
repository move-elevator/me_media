<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class ExternalStreamTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Movie
 */
class ExternalStreamTest extends UnitTestCase {

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream
	 */
	protected $externalStream;

	/**
	 * @return void
	 */
	public function setUp() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->externalStream = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media\Movie\ExternalStream');
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
		unset($this->externalStream);
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Movie\ExternalStream::setProvider
	 * @covers \MoveElevator\MeMedia\Domain\Model\Movie\ExternalStream::getProvider
	 * @return void
	 */
	public function testSetAndGetProvider() {
		$expected = 'provider';
		$this->externalStream->setProvider($expected);
		$this->assertEquals($expected, $this->externalStream->getProvider());
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Movie\ExternalStream::setExternalId
	 * @covers \MoveElevator\MeMedia\Domain\Model\Movie\ExternalStream::getExternalId
	 * @return void
	 */
	public function testSetAndGetExternalId() {
		$expected = 'ExternalId';
		$this->externalStream->setExternalId($expected);
		$this->assertEquals($expected, $this->externalStream->getExternalId());
	}
}

?>