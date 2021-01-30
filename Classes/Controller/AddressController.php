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

namespace AndreasKastl\CalendarizeAddress\Controller;

use AndreasKastl\CalendarizeAddress\Domain\Model\Location;
use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;
use AndreasKastl\CalendarizeAddress\Domain\Repository\EventRepository;
use AndreasKastl\CalendarizeAddress\Domain\Repository\LocationRepository;
use AndreasKastl\CalendarizeAddress\Domain\Repository\OrganizerRepository;
use HDNET\Calendarize\Domain\Repository\IndexRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Location and organizer controller.
 */
class AddressController extends ActionController
{

    /**
     * The location repository.
     *
     * @var LocationRepository
     */
    protected $locationRepository;

    /**
     * The organizer repository.
     *
     * @var OrganizerRepository
     */
    protected $organizerRepository;

    /**
     * The event repository.
     *
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * The index repository.
     *
     * @var IndexRepository
     */
    protected $indexRepository;

    /**
     * Initialize action
     */
    public function initializeAction()
    {
        parent::initializeAction();
    }

    /**
     * Inject location repository.
     *
     * @param LocationRepository $locationRepository
     */
    public function injectLocationRepository(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * Inject organizer repository.
     *
     * @param OrganizerRepository $organizerRepository
     */
    public function injectOrganizerRepository(OrganizerRepository $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }

    /**
     * Inject event repository.
     *
     * @param EventRepository $eventRepository
     */
    public function injectEventRepository(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Inject index repository.
     *
     * @param IndexRepository $indexRepository
     */
    public function injectIndexRepository(IndexRepository $indexRepository)
    {
        $this->indexRepository = $indexRepository;
    }

    /**
     * Location action.
     *
     * @param Location $location
     *
     * @return string
     */
    public function locationAction(Location $location = null)
    {
        if ($location !== null) {
            $events = $this->eventRepository->findByLocationAddress($location);
            $indices = array();

            foreach ($events as $event) {
                $indexResult = $this->indexRepository->findByEventTraversing($event);

                foreach ($indexResult as $index) {
                    $indices[] = $index;
                }
            }

            $this->view->assign('address', $location);
            $this->view->assign('indices', $indices);
        }
    }

    /**
     * Organizer action.
     *
     * @param Organizer $organizer
     *
     * @return string
     */
    public function organizerAction(Organizer $organizer = null)
    {
        if ($organizer !== null) {
            $events = $this->eventRepository->findByOrganizerAddress($organizer);
            $indices = array();

            foreach ($events as $event) {
                $indexResult = $this->indexRepository->findByEventTraversing($event);

                foreach ($indexResult as $index) {
                    $indices[] = $index;
                }
            }

            $this->view->assign('address', $organizer);
            $this->view->assign('indices', $indices);
        }
    }
}
