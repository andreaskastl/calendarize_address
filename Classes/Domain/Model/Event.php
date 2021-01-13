<?php

/**
 * Event model.
 */
declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use AndreasKastl\CalendarizeAddress\Domain\Model\Location;
use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;

/**
 * The domain model of an event
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
		$this->setLocationAddress (new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		$this->setOrganizerAddress (new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		parent::__construct();
	}

    /**
     * Get locationAddress.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getLocationAddress()
    {
        return $this->locationAddress;
    }

    /**
     * Set locationAddress.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $locationAddress
     */
    public function setLocationAddress($locationAddress)
    {
        $this->locationAddress = $locationAddress;
    }

	/**
	 * Adds a locationAddress
	 * 
	 * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Location $locationAddress
	 * @return void
	 */
	public function addLocationAddress(\AndreasKastl\CalendarizeAddress\Domain\Model\Location $locationAddress) {
		$this->locationAddress->attach($locationAddress);
	}

	/**
	 * Removes a locationAddress
	 * 
 	 * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Location $locationAddress
	 * @return void
	 */
	public function removeLocationAddress(\AndreasKastl\CalendarizeAddress\Domain\Model\Location $locationAddress) {
		$this->locationAddress->detach($locationAddress);
	}


    /**
     * Get organizerAddress.
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getOrganizerAddress()
    {
        return $this->organizerAddress;
    }

    /**
     * Set organizerAddress.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $organizerAddress
     */
    public function setOrganizerAddress($organizerAddress)
    {
        $this->organizerAddress = $organizerAddress;
    }
	
	/**
	 * Adds an organizerAddress
	 * 
	 * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizerAddress
	 * @return void
	 */
	public function addOrganizerAddress(\AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizerAddress) {
		$this->organizerAddress->attach($organizerAddress);
	}

	/**
	 * Removes an organizerAddress
	 * 
 	 * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizerAddress
	 * @return void
	 */
	public function removeOrganizerAddress(\AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizerAddress) {
		$this->organizerAddress->detach($organizerAddress);
	}	
	
}