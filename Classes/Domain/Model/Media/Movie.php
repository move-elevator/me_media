<?php

namespace MoveElevator\MeMedia\Domain\Model\Media;

use MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class InternalStream
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class Movie extends Media {
	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $image;

	/**
	 * @var string
	 */
	protected $width;

	/**
	 * @var string
	 */
	protected $height;

	/**
	 * @param string $height
	 */
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * @return string
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $width
	 */
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * @return string
	 */
	public function getWidth() {
		return $this->width;
	}
}

?>