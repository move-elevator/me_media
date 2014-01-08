<?php

namespace MoveElevator\MeMedia\Domain\Repository;

use \TYPO3\CMS\Extbase\Persistence\Repository;

class MediaRepository extends Repository {

	/**
	 * Finds all media records, optional by given storage pid
	 *
	 * @param integer $storagePid
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface|array
	 */
	public function findAll($storagePid = 0) {
		$query = $this->createQuery();
		if ($storagePid > 0) {
			$query->getQuerySettings()->setStoragePageIds(array($storagePid));
		} else {
			$query->getQuerySettings()->setRespectStoragePage(FALSE);
		}
		return $query->execute();
	}
}

?>