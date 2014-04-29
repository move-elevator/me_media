<?php

namespace MoveElevator\MeMedia\Domain\Model\Media\Movie;

use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use MoveElevator\MeMedia\Domain\Model\Media\Movie;

/**
 * Class InternalStream
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class InternalStream extends Movie {

	/**
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $file;

	/**
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
	 */
	public function setFile(FileReference $file) {
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