<?php

namespace MoveElevator\MeMedia\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use MoveElevator\MeMedia\Domain\Model\Media;
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
	 * @var \MoveElevator\MeMedia\Service\MediaService
	 * @inject
	 */
	protected $mediaService;

	/**
	 * @return void
	 */
	public function listAction() {
		$mediaList = $this->mediaRepository->findAll(intval($this->settings['storagePid']));
		$this->view->assign('records', $mediaList);
	}

	public function initializeShowAction() {
		$requestArguments = $this->request->getArguments();
		if (!$this->mediaService->requestHasValidMediaObject($requestArguments)) {
			$requestArguments['media'] = NULL;
			$this->request->setArguments($requestArguments);
		}
	}

	/**
	 * @param \MoveElevator\MeMedia\Domain\Model\Media $media
	 */
	public function showAction($media = NULL) {
		if ($media instanceof Media) {
			$this->view->assign('record', $media);
		}
	}
}

?>