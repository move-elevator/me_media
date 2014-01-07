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
	 * @var MoveElevator\MeMedia\Domain\Repository\MediaRepository
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
	 * @return void
	 */
	public function initializeShowAction() {
		$requestArgumentsList = $this->request->getArguments();

		if (!$this->requestHasValidMedia($requestArgumentsList)) {
			$this->forward('list');
		}
	}

	/**
	 * @param \MoveElevator\MeMedia\Domain\Model\Media $media
	 */
	public function showAction($media) {
		$this->view->assign('record', $media);
	}

	/**
	 * @param array $requestArgumentsList
	 * @return bool
	 */
	public function requestHasValidMedia($requestArgumentsList) {
		if (!isset($requestArgumentsList['media'])) {
			return FALSE;
		}

		$mediaId = intval($requestArgumentsList['media']);
		$media = $this->mediaRepository->findByUid($mediaId);

		if ($media instanceof Media) {
			return TRUE;
		}

		return FALSE;
	}
}

?>