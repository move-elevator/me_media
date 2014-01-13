<?php

namespace MoveElevator\MeMedia\Domain\Model\Media\Movie;

use MoveElevator\MeMedia\Domain\Model\Media\Movie as ExtendsEntity;

/**
 * Class Video
 *
 * @package MoveElevator\MeMedia\Domain\Model\Media\Movie
 */
class Video extends ExtendsEntity {

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	protected $fileList;

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $fileList
	 */
	public function setFileList($fileList) {
		$this->fileList = $fileList;
	}

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
	 */
	public function getFileList() {
		return $this->fileList;
	}


}

?>