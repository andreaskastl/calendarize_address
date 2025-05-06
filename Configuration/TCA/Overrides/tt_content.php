<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register plugin
$pluginKey = ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Calendarize',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Location',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.location.title',
    // icon identifier
    'calendarize-address',
    'calendarize',
    // plugin description
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.location.description',
);

// Add flexform
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml',
    $pluginKey
);

// Add the FlexForm to the show item list
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Plugin, pi_flexform',
    $pluginKey,
    'after:palette:headers'
);


// Register plugin
$pluginKey = ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'Calendarize',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Organizer',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.organizer.title',
    // icon identifier
    'calendarize-address',
    'calendarize',
    // plugin description
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.organizer.description',
);

// Add flexform
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml',
    $pluginKey
);

// Add the FlexForm to the show item list
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Plugin, pi_flexform',
    $pluginKey,
    'after:palette:headers'
);