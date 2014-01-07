<?php

namespace MoveElevator\MeMedia\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Medium
 *
 * @package MoveElevator\MeMedia\Domain\Model
 */
class Medium extends AbstractEntity {
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var int
	 */
	protected $elementType;

	/**
	 * @var string
	 */
	protected $fileMp4;

	/**
	 * @var string
	 */
	protected $fileWebm;

	/**
	 * @var string
	 */
	protected $fileOgv;

	/**
	 * @var string
	 */
	protected $fileStream;

	/**
	 * @var string
	 */
	protected $fileYoutube;

	/**
	 * @var string
	 */
	protected $fileAudio;

	/**
	 * @var string
	 */
	protected $width;

	/**
	 * @var string
	 */
	protected $height;

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param int $elementType
	 */
	public function setElementType($elementType) {
		$this->elementType = $elementType;
	}

	/**
	 * @return int
	 */
	public function getElementType() {
		return $this->elementType;
	}

	/**
	 * @param string $fileAudio
	 */
	public function setFileAudio($fileAudio) {
		$this->fileAudio = $fileAudio;
	}

	/**
	 * @return string
	 */
	public function getFileAudio() {
		return $this->fileAudio;
	}

	/**
	 * @param string $fileMp4
	 */
	public function setFileMp4($fileMp4) {
		$this->fileMp4 = $fileMp4;
	}

	/**
	 * @return string
	 */
	public function getFileMp4() {
		return $this->fileMp4;
	}

	/**
	 * @param string $fileOgv
	 */
	public function setFileOgv($fileOgv) {
		$this->fileOgv = $fileOgv;
	}

	/**
	 * @return string
	 */
	public function getFileOgv() {
		return $this->fileOgv;
	}

	/**
	 * @param string $fileStream
	 */
	public function setFileStream($fileStream) {
		$this->fileStream = $fileStream;
	}

	/**
	 * @return string
	 */
	public function getFileStream() {
		return $this->fileStream;
	}

	/**
	 * @param string $fileWebm
	 */
	public function setFileWebm($fileWebm) {
		$this->fileWebm = $fileWebm;
	}

	/**
	 * @return string
	 */
	public function getFileWebm() {
		return $this->fileWebm;
	}

	/**
	 * @param string $fileYoutube
	 */
	public function setFileYoutube($fileYoutube) {
		$this->fileYoutube = $fileYoutube;
	}

	/**
	 * @return string
	 */
	public function getFileYoutube() {
		return $this->fileYoutube;
	}

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
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
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