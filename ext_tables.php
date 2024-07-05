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
        \HDNET\Calendarize\Register::extTables($configuration);
    }
);
