<?php

namespace MoveElevator\MeMedia\Domain\Model\Media\Movie;

use MoveElevator\MeMedia\Domain\Model\Media\Movie as ExtendsEntity;

/**
 * Class InternalStream
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media
 */
class InternalStream extends ExtendsEntity {

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