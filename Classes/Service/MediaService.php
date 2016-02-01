<?php

namespace MoveElevator\MeMedia\Service;

use \TYPO3\CMS\Extbase\Mvc\Web\Request;

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
	public function getRecordByRequestData(Request $requestData) {
		if (!$requestData->hasArgument('media')) {
			return FALSE;
		}

		$mediaId = $requestData->getArgument('media');

		/** @var \MoveElevator\MeMedia\Domain\Model\Media $media */
		$media = $this->mediaRepository->findByUid($mediaId);

		return $media;
	}
}