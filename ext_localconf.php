<?php

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
        \HDNET\Calendarize\Register::extLocalconf($configuration);

        // configure plugins
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'calendarize',
            'Location',
            [
                \AndreasKastl\CalendarizeAddress\Controller\AddressController::class => 'location',
            ],
            // non-cacheable actions
            [
                \AndreasKastl\CalendarizeAddress\Controller\AddressController::class => '',
            ]
        );
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'calendarize',
            'Organizer',
            [
                \AndreasKastl\CalendarizeAddress\Controller\AddressController::class => 'organizer',
            ],
            // non-cacheable actions
            [
                \AndreasKastl\CalendarizeAddress\Controller\AddressController::class => '',
            ]
        );

        // register wizards
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
            '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:calendarize_address/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">'
        );

        // register icons
        $icons = [
            'calendarize-address' => 'Extension.svg',
        ];
        $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        foreach ($icons as $identifier => $path) {
            $iconRegistry->registerIcon(
                $identifier,
                \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                ['source' => 'EXT:calendarize_address/Resources/Public/Icons/' . $path]
            );
        }
    }
);
