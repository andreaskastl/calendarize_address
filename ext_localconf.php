<?php

declare(strict_types=1);

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use AndreasKastl\CalendarizeAddress\Controller\AddressController;
use \HDNET\Calendarize\Register;

defined('TYPO3') or die();

call_user_func(
    function () {

        // register event model, extends Calendarize default event model
        $configuration = [
            'uniqueRegisterKey' => 'Event', // A unique Key for the register (e.g. you Extension Key + "Event")
            'title'             => 'Event', // The title for your events (this is shown in the FlexForm configuration of the Plugins)
            'modelName'         => \AndreasKastl\CalendarizeAddress\Domain\Model\Event::class, // the name of your model
            'partialIdentifier' => 'Event', // the identifier of the partials for your event. In most cases this is also unique
            'tableName'         => 'tx_calendarize_domain_model_event', // the table name of your event table
            'required'          => true, // set to true, than your event need a least one event configuration
            //'subClasses'        => array of classnames, // insert here all classNames, which are used for the extended models
        ];
        Register::extLocalconf($configuration);

        // Configure plugins
        ExtensionUtility::configurePlugin(
            // extension name, matching the PHP namespaces (but without the vendor)
            'calendarize',
            // arbitrary, but unique plugin name (not visible in the backend)
            'Location',
            // all actions
            [AddressController::class => 'location'],
            // non-cacheable actions
            [AddressController::class => 'location'],
        );

        ExtensionUtility::configurePlugin(
            // extension name, matching the PHP namespaces (but without the vendor)
            'calendarize',
            // arbitrary, but unique plugin name (not visible in the backend)
            'Organizer',
            // all actions
            [AddressController::class => 'organizer'],
            // non-cacheable actions
            [AddressController::class => 'organizer'],
        );

        if (GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion() <= 12) {
            // Include new content elements to modWizards
            ExtensionManagementUtility::addPageTSConfig('
                @import \'EXT:calendarize_address/Configuration/page.tsconfig\'
            ');
        }        

    }
);
