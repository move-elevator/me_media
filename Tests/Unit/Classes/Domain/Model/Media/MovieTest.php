<?php

namespace MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Tests\UnitTestCase;

/**
 * Class MovieTest
 *
 * @package MoveElevator\MeMedia\Tests\Unit\Domain\Model\Media
 */
class MovieTest extends UnitTestCase {

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Model\Media\Movie
	 */
	protected $movie;

	/**
	 * @return void
	 */
	public function setUp() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$this->movie = $this->objectManager->get('MoveElevator\MeMedia\Domain\Model\Media\Movie');
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
		unset($this->movie);
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::setImage
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::getImage
	 * @return void
	 */
	public function testSetAndGetImage() {
		/** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $expected */
		$expected = $this->objectManager->get('TYPO3\CMS\Extbase\Domain\Model\FileReference');
		$this->movie->setImage($expected);
		$this->assertInstanceOf('TYPO3\CMS\Extbase\Domain\Model\FileReference', $this->movie->getImage());
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::setWidth
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::getWidth
	 * @return void
	 */
	public function testSetAndGetWidth() {
		$expected = 100;
		$this->movie->setWidth($expected);
		$this->assertEquals($expected, $this->movie->getWidth());
	}

	/**
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::setHeight
	 * @covers \MoveElevator\MeMedia\Domain\Model\Media\Movie::getHeight
	 * @return void
	 */
	public function testSetAndGetHeight() {
		$expected = 100;
		$this->movie->setHeight($expected);
		$this->assertEquals($expected, $this->movie->getHeight());
	}
}

?>