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

namespace AndreasKastl\CalendarizeAddress\Domain\Model;

use AndreasKastl\CalendarizeAddress\Domain\Model\Location;
use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * The domain model of an event.
 * Adds location and organizer addresses to calendarize default model.
 *
 * @entity
 */
class Event extends \HDNET\Calendarize\Domain\Model\Event
{
    /**
     * Location reference to tt_address record.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AndreasKastl\CalendarizeAddress\Domain\Model\Location>
     */
    protected $locationAddress = null;

    /**
     * Organizer reference to tt_address record.
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\AndreasKastl\CalendarizeAddress\Domain\Model\Organizer>
     */
    protected $organizerAddress = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setLocationAddress(new ObjectStorage());
        $this->setOrganizerAddress(new ObjectStorage());
        parent::__construct();
    }

    /**
     * Get locationAddress.
     *
     * @return ObjectStorage
     */
    public function getLocationAddress()
    {
        return $this->locationAddress;
    }

    /**
     * Set locationAddress.
     *
     * @param ObjectStorage $locationAddress
     */
    public function setLocationAddress($locationAddress)
    {
        $this->locationAddress = $locationAddress;
    }

    /**
     * Adds a locationAddress
     *
     * @param Location $locationAddress
     * @return void
     */
    public function addLocationAddress(Location $locationAddress)
    {
        $this->locationAddress->attach($locationAddress);
    }

    /**
     * Removes a locationAddress
     *
     * @param Location $locationAddress
     * @return void
     */
    public function removeLocationAddress(Location $locationAddress)
    {
        $this->locationAddress->detach($locationAddress);
    }


    /**
     * Get organizerAddress.
     *
     * @return ObjectStorage
     */
    public function getOrganizerAddress()
    {
        return $this->organizerAddress;
    }

    /**
     * Set organizerAddress.
     *
     * @param ObjectStorage $organizerAddress
     */
    public function setOrganizerAddress($organizerAddress)
    {
        $this->organizerAddress = $organizerAddress;
    }
    
    /**
     * Adds an organizerAddress
     *
     * @param Organizer $organizerAddress
     * @return void
     */
    public function addOrganizerAddress(Organizer $organizerAddress)
    {
        $this->organizerAddress->attach($organizerAddress);
    }

    /**
     * Removes an organizerAddress
     *
     * @param Organizer $organizerAddress
     * @return void
     */
    public function removeOrganizerAddress(Organizer $organizerAddress)
    {
        $this->organizerAddress->detach($organizerAddress);
    }
}
