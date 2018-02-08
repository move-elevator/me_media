<?php

namespace MoveElevator\MeMedia\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class MediaController
 *
 * @package MoveElevator\MeMedia\Controller
 */
class MediaController extends ActionController
{
    const HTTP_STATUSCODE_NOT_FOUND = 404;

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
    public function listAction()
    {
        $mediaList = $this->mediaRepository->findAll(intval($this->settings['storagePid']));
        $this->view->assign('records', $mediaList);
    }

    /**
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\StopActionException
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\UnsupportedRequestTypeException
     */
    public function initializeShowAction()
    {
        /** @var \MoveElevator\MeMedia\Domain\Model\Media $media */
        $media = $this->mediaService->getRecordByRequestDataOrSettings($this->request, $this->settings);

        if ($this->checkRedirectIsNecessary($media)) {
            $this->redirect(
                'list',
                null,
                null,
                null,
                intval($this->settings['listPid']),
                0,
                self::HTTP_STATUSCODE_NOT_FOUND
            );
        }

        if ($media instanceof Media) {
            $this->request->setArgument('media', $media);
        }
    }

    /**
     * @param \MoveElevator\MeMedia\Domain\Model\Media|NULL $media
     * @return void
     */
    public function showAction(Media $media = null)
    {
        if ($media instanceof Media) {
            $this->view->assign('record', $media);
        }
    }

    /**
     * @return bool
     */
    protected function checkListPidIsSet()
    {
        if (!isset($this->settings['listPid'])
            || !intval($this->settings['listPid']) === 0
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param \MoveElevator\MeMedia\Domain\Model\Media $media
     * @return bool
     */
    protected function checkRedirectIsNecessary($media)
    {
        if (!$media instanceof Media && $this->checkListPidIsSet()) {
            return true;
        }

        return false;
    }
}
