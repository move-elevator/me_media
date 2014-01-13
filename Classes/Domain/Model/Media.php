<?php

namespace MoveElevator\MeMedia\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Media
 *
 * @package MoveElevator\MeMedia\Domain\Model
 */
class Media extends AbstractEntity {
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $type;

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
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type();
	}

	/**
	 * @return string
	 */
	public function getShortType() {
		$typeNamespaceList = explode('\\', $this->type);

		return (string) end($typeNamespaceList);
	}
}

?>