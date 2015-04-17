<?php

namespace MoveElevator\MeMedia\Controller;

use \TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use \MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class MediaController
 *
 * @package MoveElevator\MeMedia\Controller
 */
class MediaController extends ActionController {

	/**
	 * @var \MoveElevator\MeMedia\Domain\Repository\MediaRepository
	 * @inject
	 */
	protected $mediaRepository;

	/**
	 * @return void
	 */
	public function listAction() {
		$mediaList = $this->mediaRepository->findAll(intval($this->settings['storagePid']));
		$this->view->assign('records', $mediaList);
	}

	/**
	 * @param int $media
	 * @return void
	 */
	public function showAction($media = NULL) {
		$mediaRecord = $this->getMedia($media);

		if ($mediaRecord instanceof Media) {
			$this->view->assign('record', $mediaRecord);
		}
	}

	/**
	 * @param int $mediaId
	 * @return \MoveElevator\MeMedia\Domain\Model\Media
	 */
	protected function getMedia($mediaId = 0) {

		if (intval($mediaId) === 0) {
			$mediaId = intval($this->settings['mediaId']);
		}

		return $this->mediaRepository->findByUid($mediaId);
	}
}