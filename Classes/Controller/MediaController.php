<?php

namespace MoveElevator\MeMedia\Controller;

use \TYPO3\CMS\Core\Utility\HttpUtility;
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
		/** @var \MoveElevator\MeMedia\Domain\Model\Media $media */
		$media = $this->mediaService->getRecordByRequestData($this->request);

		if (
			!$media instanceof Media
			&& $this->checkListPidIsSet()
		) {
			$this->redirect(
				'list',
				NULL,
				NULL,
				NULL,
				intval($this->settings['listPid']),
				0,
				HttpUtility::HTTP_STATUS_404
			);
		}
	}

	/**
	 * @param \MoveElevator\MeMedia\Domain\Model\Media|NULL $media
	 * @return void
	 */
	public function showAction(Media $media = NULL) {
		if ($media instanceof Media) {
			$this->view->assign('record', $media);
		}
	}

	/**
	 * @return bool
	 */
	protected function checkListPidIsSet() {
		if (
			!isset($this->settings['listPid'])
			|| !intval($this->settings['listPid']) === 0
		) {
			return FALSE;
		}

		return TRUE;
	}
}