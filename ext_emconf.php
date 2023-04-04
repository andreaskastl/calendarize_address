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
    'author_email' => 'typo3@andreaskastl.de',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '4.1.0',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.1.99',
            'typo3' => '10.4.20-11.5.99',
            'tt_address' => '6.0.0-7.9.99',
            'calendarize' => '12.1.0-12.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
);
