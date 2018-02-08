<?php

namespace MoveElevator\MeMedia\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

/**
 * Class MediaRepository
 *
 * @package MoveElevator\MeMedia\Domain\Repository
 */
class MediaRepository extends Repository
{
    /**
     * Finds all media records, optional by given storage pid
     *
     * @param integer $storagePid
     *
     * @return QueryResultInterface
     */
    public function findAll($storagePid = 0)
    {
        $query = $this->createQuery();

        if ($storagePid > 0) {
            $query->getQuerySettings()->setStoragePageIds(array($storagePid));
        } else {
            $query->getQuerySettings()->setRespectStoragePage(false);
        }

        return $query->execute();
    }
}
