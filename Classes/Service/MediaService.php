<?php

namespace MoveElevator\MeMedia\Service;

use \TYPO3\CMS\Extbase\Mvc\Web\Request;

/**
 * Class MediaService
 *
 * @package MoveElevator\MeMedia\Service
 */
class MediaService {

	/**
	 * @var \MoveElevator\MeMedia\Domain\Repository\MediaRepository
	 * @inject
	 */
	protected $mediaRepository;

	/**
	 * @param \TYPO3\CMS\Extbase\Mvc\Web\Request $requestData
	 * @return \MoveElevator\MeMedia\Domain\Model\Media
	 */
	public function getRecordByRequestDataOrSettings(Request $requestData, $settings) {
		if (
			!$requestData->hasArgument('media')
			&& !$this->checkIsMediaIdInSettings($settings)
		) {
			return FALSE;
		}

		if (!$this->checkIsMediaIdInSettings($settings)) {
			$mediaId = $requestData->getArgument('media');
		} else {
			$mediaId = intval($settings['mediaId']);
		}

		/** @var \MoveElevator\MeMedia\Domain\Model\Media $media */
		$media = $this->mediaRepository->findByUid($mediaId);

		return $media;
	}

	/**
	 * @param $settings
	 * @return bool
	 */
	protected function checkIsMediaIdInSettings($settings) {
		if (empty($settings['mediaId']) ) {
			return FALSE;
		}

		if (intval($settings['mediaId']) === 0) {
			return FALSE;
		}

		return TRUE;
	}
}