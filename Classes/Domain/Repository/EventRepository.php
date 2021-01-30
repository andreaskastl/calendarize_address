<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace AndreasKastl\CalendarizeAddress\Domain\Repository;

use AndreasKastl\CalendarizeAddress\Domain\Model\Location;
use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;

/**
 * Event repository.
 */
class EventRepository extends \HDNET\Calendarize\Domain\Repository\EventRepository
{
    
    /**
     * Find by event location.
     *
     * @param Location  $location
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByLocationAddress(Location $location)
    {
        if ($location === null) {
            return;
        }
        
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setIgnoreEnableFields(true);
        
        $constraints = [];
        $constraints[] = $query->contains('locationAddress', $location);
        
        $query->matching($query->logicalAnd($constraints));
        $result = $query->execute();

        return $result;
    }
    
    /**
     * Find by event organizer.
     *
     * @param Organizer  $organizer
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findByOrganizerAddress(Organizer $organizer)
    {
        if ($organizer === null) {
            return;
        }
        
        $query = $this->createQuery();
        
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->getQuerySettings()->setIgnoreEnableFields(true);
        
        $constraints = [];
        $constraints[] = $query->contains('organizerAddress', $organizer);
        
        $query->matching($query->logicalAnd($constraints));
        $result = $query->execute();

        return $result;
    }
}
