<?php

/**
 * Extension Manager/Repository config file for ext: "calendarize_address"
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 */
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Calendarize - Address Extension',
    'description' => 'Extends EXT:calendarize events with location and organizer records based on EXT:tt_address records and provides corresponding location and organizer views.',
    'category' => 'plugin',
    'author' => 'Andreas Kastl',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '3.0.0',
    'constraints' => [
        'depends' => [
            'php' => '7.3.0-8.0.99',        
            'typo3' => '10.4.20-11.5.99',
            'calendarize' => '11.0.0-12.9.99',
            'tt_address' => '5.3.0-6.0.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
);
