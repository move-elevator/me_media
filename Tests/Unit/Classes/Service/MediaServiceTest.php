<?php

namespace MoveElevator\MeMedia\Tests\Unit\Service;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase;

class MediaServiceTest extends BaseTestCase {

    /**
     * @var \MoveElevator\MeMedia\Service\MediaService
     */
    protected $mediaService;

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
	protected $repositoryObject;

    public function setUp() {
        $this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
        $this->mediaService = $this->objectManager->get('MoveElevator\MeMedia\Service\MediaService');
		$this->testingFramework = new \Tx_Phpunit_Framework('tx_memedia');
		$this->repositoryObject = $this->objectManager->get('MoveElevator\MeMedia\Domain\Repository\MediaRepository');
		$this->testingFramework->createFakeFrontEnd();
    }

    public function tearDown() {
		$this->testingFramework->cleanUp();
        unset($this->mediaService);
		unset($this->testingFramework);
		unset($this->objectManager);
		unset($this->repositoryObject);
    }

    /**
     * @covers \MoveElevator\MeMedia\Service\MediaService::requestHasValidMediaObject
     */
    public function testRequestHasValidMediaObject() {
		$recordId = $this->testingFramework->createRecord('tx_memedia_domain_model_media', array(
			'tx_extbase_type' => 'MoveElevator\MeMedia\Domain\Model\Media\Audio'
		));

		$result1 = $this->mediaService->requestHasValidMediaObject(array('media' => $recordId));
		$result2 = $this->mediaService->requestHasValidMediaObject(array('media' => 0));
		$result3 = $this->mediaService->requestHasValidMediaObject(array());

		$this->assertTrue($result1);
		$this->assertFalse($result2);
		$this->assertFalse($result3);
    }
}

?>