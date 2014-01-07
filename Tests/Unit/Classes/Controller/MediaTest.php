<?php

namespace MoveElevator\MeMedia\Tests\Unit\Controller;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase;

class MediaTest extends BaseTestCase {

    /**
     * @var \MoveElevator\MeMedia\Controller\Media
     */
    protected $object;

	/**
	 * @var \Tx_Phpunit_Framework
	 */
	protected $testingFramework;

    /**
     * @var TYPO3\CMS\Extbase\Object\ObjectManager
     */
    protected $objectManager;

	/**
	 * @var \MoveElevator\MeMedia\Domain\Repository\MediaRepository
	 */
	protected $repositoryObject;

    public function setUp() {
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->object = $this->objectManager->get('MoveElevator\MeMedia\Controller\MediaController');
		$this->testingFramework = new \Tx_Phpunit_Framework('tx_memedia');
		$this->repositoryObject = $this->objectManager->get('MoveElevator\MeMedia\Domain\Repository\MediaRepository');
		$this->testingFramework->createFakeFrontEnd();
    }

    public function tearDown() {
		$this->testingFramework->cleanUp();
        unset($this->object);
		unset($this->testingFramework);
		unset($this->objectManager);
		unset($this->repositoryObject);
    }

    /**
     * @covers \MoveElevator\MeMedia\Controller\MediaController::requestHasValidMedia
     */
    public function testRequestHasValidMedia() {
		$recordId = $this->testingFramework->createRecord('tx_memedia_domain_model_media');
		$result1 = $this->object->requestHasValidMedia(array('media' => $recordId));
		$result2 = $this->object->requestHasValidMedia(array('media' => 0));
		$result3 = $this->object->requestHasValidMedia(array());

		$this->assertTrue($result1);
		$this->assertFalse($result2);
		$this->assertFalse($result3);
    }
}

?>