<?php

declare(strict_types=1);

// define additional fields
$tempColumns = [
    'organizer_address' => [
        'label' => 'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:label.organizerAddress',
        'exclude' => 1,
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'foreign_table' => 'tt_address',
            'MM' => 'tx_calendarize_domain_model_event_organizer_mm',
            'allowed' => 'tt_address',
            'maxitems' => 5,
            'minitems' => 0,
            'size' => 3,
            'suggestOptions' => [
                'default' => [
                    'additionalSearchFields' => 'name, first_name, last_name, company, email',
                    'addWhere' => 'AND tt_address.deleted = 0 AND tt_address.hidden = 0'
                ]
            ]
        ]
    ],
    'location_address' => [
        'label' => 'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:label.locationAddress',
        'exclude' => 1,
        'config' => [
            'type' => 'group',
            'internal_type' => 'db',
            'foreign_table' => 'tt_address',
            'MM' => 'tx_calendarize_domain_model_event_location_mm',
            'allowed' => 'tt_address',
            'maxitems' => 5,
            'minitems' => 0,
            'size' => 3,
            'suggestOptions' => [
                'default' => [
                    'additionalSearchFields' => 'name, first_name, last_name, company, email',
                    'addWhere' => 'AND tt_address.deleted = 0 AND tt_address.hidden = 0'
                ]
            ]
        ]
    ]
];

// add fields to TCA (not shown yet in backend output)
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_calendarize_domain_model_event', $tempColumns);

// add fields to palette
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_calendarize_domain_model_event',
    'tx_calendarize_address_organizer_fields',
    'organizer_address'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
    'tx_calendarize_domain_model_event',
    'tx_calendarize_address_location_fields',
    'location_address'
);

// add palette to show in backend output
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_calendarize_domain_model_event',
    '--palette--;LLL:EXT:tx_calendarize_address/Resources/Private/Language/locallang.xlf:label.organizerAddress;tx_calendarize_address_organizer_fields',
    '',
    'before:organizer'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tx_calendarize_domain_model_event',
    '--palette--;LLL:EXT:tx_calendarize_address/Resources/Private/Language/locallang.xlf:label.locationAddress;tx_calendarize_address_location_fields',
    '',
    'before:location'
);
