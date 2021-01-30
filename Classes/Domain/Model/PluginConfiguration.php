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

/**
 * Plugin Configuration.
 * Adds location pid and organizer pid to calendarize default plugin configuration.
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
