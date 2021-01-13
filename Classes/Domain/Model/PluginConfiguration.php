<?php

/**
 * PluginConfiguration.
 */
declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\Domain\Model;

/**
 * PluginConfiguration.
 *
 * @DatabaseTable
 */
class PluginConfiguration extends \HDNET\Calendarize\Domain\Model\PluginConfiguration
{
    /**
     * Location PID.
     *
     * @var int
     */
    protected $locationPid;

    /**
     * Organizer PID.
     *
     * @var int
     */
    protected $organizerPid;


	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();
	}


    /**
     * Get location PID.
     *
     * @return int
     */
    public function getLocationPid()
    {
        return $this->locationPid;
    }

    /**
     * Set location PID.
     *
     * @param int $locationPid
     */
    public function setLocationPid($LocationPid)
    {
        $this->locationPid = $locationPid;
    }

    /**
     * Get organizer PID.
     *
     * @return int
     */
    public function getOrganizerPid()
    {
        return $this->organizerPid;
    }

    /**
     * Set organizer PID.
     *
     * @param int $organizerPid
     */
    public function setOrganizerPid($organizerPid)
    {
        $this->organizerPid = $organizerPid;
    }

}
