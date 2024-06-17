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
    'version' => '5.0.0-dev',
    'constraints' => [
        'depends' => [
            'php' => '7.4.0-8.3.99',
            'typo3' => '11.5.30-12.4.99',
            'tt_address' => '6.0.0-8.9.99',
            'calendarize' => '12.1.0-13.9.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
);
