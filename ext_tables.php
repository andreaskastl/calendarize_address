<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function () {
        // add static typoscript
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
            'calendarize_address',
            'Configuration/TypoScript',
            'Calendarize - Address Extension'
        );

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
        \HDNET\Calendarize\Register::extTables($configuration);
    }
);
