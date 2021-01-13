<?php
declare(strict_types=1);

return [
    AndreasKastl\CalendarizeAddress\Domain\Model\Event::class => [
        'tableName' => 'tx_calendarize_domain_model_event',
    ],
    AndreasKastl\CalendarizeAddress\Domain\Model\Index::class => [
        'tableName' => 'tx_calendarize_domain_model_index',
    ],	
    AndreasKastl\CalendarizeAddress\Domain\Model\Location::class => [
        'tableName' => 'tt_address',
    ],
    AndreasKastl\CalendarizeAddress\Domain\Model\Organizer::class => [
        'tableName' => 'tt_address',
    ],
    AndreasKastl\CalendarizeAddress\Domain\Model\PluginConfiguration::class => [
        'tableName' => 'tx_calendarize_domain_model_pluginconfiguration',
    ],		
];