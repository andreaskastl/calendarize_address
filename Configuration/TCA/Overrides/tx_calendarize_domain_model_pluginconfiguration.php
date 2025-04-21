<?php

declare(strict_types=1);
defined('TYPO3') or die();

// define additional fields
$tempColumns = [
    'location_pid' => [
        'label' => 'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:label.locationPid',
        'exclude' => 1,
        'config' => [
            'type' => 'group',
            'allowed' => 'pages',
            'maxitems' => 1,
            'minitems' => 0,
            'size' => 1,
            'default' => 0
        ]
    ],
    'organizer_pid' => [
        'label' => 'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:label.organizerPid',
        'exclude' => 1,
        'config' => [
            'type' => 'group',
            'allowed' => 'pages',
            'maxitems' => 1,
            'minitems' => 0,
            'size' => 1,
            'default' => 0
        ]
    ]
];

// add fields to TCA (not shown yet in backend output)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_calendarize_domain_model_pluginconfiguration', $tempColumns);

// add fields to palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_calendarize_domain_model_pluginconfiguration',
    'tx_calendarize_address_location_pid',
    'location_pid'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_calendarize_domain_model_pluginconfiguration',
    'tx_calendarize_address_organizer_pid',
    'organizer_pid'
);

// add palette to show in backend output
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_calendarize_domain_model_pluginconfiguration',
    '--palette--;LLL:EXT:tx_calendarize_address/Resources/Private/Language/locallang.xlf:label.locationPid;tx_calendarize_address_location_pid',
    '',
    'before:booking_pid'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_calendarize_domain_model_pluginconfiguration',
    '--palette--;LLL:EXT:tx_calendarize_address/Resources/Private/Language/locallang.xlf:label.organizerPid;tx_calendarize_address_organizer_pid',
    '',
    'after:day_pid'
);
