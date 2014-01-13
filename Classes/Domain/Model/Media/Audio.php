<?php

namespace MoveElevator\MeMedia\Domain\Model\Media;

/**
 * Class Audio
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class Audio extends \MoveElevator\MeMedia\Domain\Model\Media {

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $file;

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
	 */
	public function setFile($file) {
		$this->file = $file;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	public function getFile() {
		return $this->file;
	}
}

?>