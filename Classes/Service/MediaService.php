<?php
namespace MoveElevator\MeMedia\Service;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use MoveElevator\MeMedia\Domain\Model\Media;
use MoveElevator\MeMedia\Domain\Repository\MediaRepository;
use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class MediaService
 *
 * @package MoveElevator\MeMedia\Service
 */
class MediaService implements SingletonInterface {

	/**
	 * @var \MoveElevator\MeMedia\Domain\Repository\MediaRepository
	 */
	protected $mediaRepository;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * Constructer initialized object manager
	 */
	public function __construct() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
	}

	/**
	 * @param array $requestArguments
	 * @return bool
	 */
	public function requestHasValidMediaObject($requestArguments) {
		$this->initializedMediaRepository();

		if (!isset($requestArguments['media'])) {
			return FALSE;
		}

		$media = $this->mediaRepository->findByUid(intval($requestArguments['media']));

		if ($media instanceof Media) {
			return TRUE;
		}

		return FALSE;
	}

	/**
	 * @return void
	 */
	protected function initializedMediaRepository() {
		if (!$this->mediaRepository instanceof MediaRepository) {
			$this->mediaRepository = $this->objectManager->get('MoveElevator\MeMedia\Domain\Repository\MediaRepository');

		}
	}
}

?>