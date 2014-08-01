<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class AudioTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media\Audio
 */
class AudioTest extends UnitTestCase {

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Model\Media\Audio
	 */
	protected $audio;

	/**
	 * @return void
	 */
	public function setUp() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->audio = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media\Audio');
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
		unset($this->audio);
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Audio::setFile
	 * @covers \MoveElevator\MeMedia\Domain\Model\Audio::getFile
	 * @return void
	 */
	public function testSetAndGetFile() {
		/** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $expectedFile */
		$expectedFile = $this->objectManager->get('TYPO3\CMS\Extbase\Domain\Model\FileReference');
		$this->audio->setFile($expectedFile);
		$this->assertInstanceOf('TYPO3\CMS\Extbase\Domain\Model\FileReference', $this->audio->getFile());
	}
}

?>