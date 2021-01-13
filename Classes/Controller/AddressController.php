<?php

/**
 * Location and organizer controller.
 */
declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\Controller;

use TYPO3\CMS\Core\Database\QueryGenerator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\Exception\InvalidQueryException;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Reflection\ObjectAccess;


/**
 * Location and organizer controller.
 */
class AddressController extends \HDNET\Calendarize\Controller\CalendarController
{

    /**
     * The location repository.
     *
     * @var \AndreasKastl\CalendarizeAddress\Domain\Repository\LocationRepository
     */
    protected $locationRepository;
	
    /**
     * The organizer repository.
     *
     * @var \AndreasKastl\CalendarizeAddress\Domain\Repository\OrganizerRepository
     */
    protected $organizerRepository;	
	
    /**
     * The event repository.
     *
     * @var \AndreasKastl\CalendarizeAddress\Domain\Repository\EventRepository
     */
    protected $eventRepository;	
	
	
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
     * @param \AndreasKastl\CalendarizeAddress\Domain\Repository\LocationRepository $locationRepository
     */
    public function injectLocationRepository(\AndreasKastl\CalendarizeAddress\Domain\Repository\LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }	

    /**
     * Inject organizer repository.
     *
     * @param \AndreasKastl\CalendarizeAddress\Domain\Repository\OrganizerRepository $organizerRepository
     */
    public function injectOrganizerRepository(\AndreasKastl\CalendarizeAddress\Domain\Repository\OrganizerRepository $organizerRepository)
    {
        $this->organizerRepository = $organizerRepository;
    }

    /**
     * Inject event repository.
     *
     * @param \AndreasKastl\CalendarizeAddress\Domain\Repository\EventRepository $eventRepository
     */
    public function injectEventRepository(\AndreasKastl\CalendarizeAddress\Domain\Repository\EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }	

    /**
     * Location action.
     *
     * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Location $location
     *
     * @return string
     */
    public function locationAction(\AndreasKastl\CalendarizeAddress\Domain\Model\Location $location = null)
    {
		$this->addCacheTags(['calendarize_location']);
				
		$this->view->assign('address', $location);
	}

    /**
     * Organizer action.
     *
     * @param \AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizer
     *
     * @return string
     */
    public function organizerAction(\AndreasKastl\CalendarizeAddress\Domain\Model\Organizer $organizer = null)	
    {
		$this->addCacheTags(['calendarize_organizer']);
		
		$this->view->assign('address', $organizer);
	}
}
