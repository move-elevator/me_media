<?php

namespace MoveElevator\MeMedia\Domain\Model\Media;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class InternalStream
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class Movie extends Media
{
    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image;

    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @param int $height
     *
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     *
     * @return void
     */
    public function setImage(FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param int $width
     *
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }
}
