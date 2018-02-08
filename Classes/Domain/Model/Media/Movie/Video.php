<?php

namespace MoveElevator\MeMedia\Domain\Model\Media\Movie;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use MoveElevator\MeMedia\Domain\Model\Media\Movie;

/**
 * Class Video
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media\Movie
 */
class Video extends Movie
{
    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $fileList;

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $fileList
     *
     * @return void
     */
    public function setFileList(ObjectStorage $fileList)
    {
        $this->fileList = $fileList;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    public function getFileList()
    {
        return $this->fileList;
    }
}
