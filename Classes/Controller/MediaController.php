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
	 * @var \MoveElevator\MeMedia\Service\MediaService
	 * @inject
	 */
	protected $mediaService;

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
	 * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
	 * @return void
	 */
	public function initializeShowAction() {
		$media = $this->mediaService->getRecordByRequestData($this->request);

		if (
			$media instanceof Media
			&& isset($this->settings['listPid'])
			&& intval($this->settings['listPid']) > 0
		) {
			$this->redirect(
				'list',
				NULL,
				NULL,
				NULL,
				intval($this->settings['listPid']),
				0,
				404
			);
		}
	}

	/**
	 * @param \MoveElevator\MeMedia\Domain\Model\Media|NULL $media
	 * @return void
	 */
	public function showAction(Media $media = NULL) {
		if ($mediaRecord instanceof Media) {
			$this->view->assign('record', $mediaRecord);
		}
	}
}