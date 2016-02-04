<?php

namespace MoveElevator\MeMedia\Domain\Model\Media;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class Audio
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class Audio extends Media
{

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $file;

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     * @return void
     */
    public function setFile(FileReference $file)
    {
        $this->file = $file;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getFile()
    {
        return $this->file;
    }
}
