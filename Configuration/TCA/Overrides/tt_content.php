<?php
declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

// Register plugin
$pluginSignature = ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'calendarize',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Location',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.location.title',
    // icon identifier
    'calendarize-address',
    'calendarize_special',
    // plugin description
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.location.description',
);

// Disable the display of layout and select_key fields for the plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,recursive';
// Activate the display of the plug-in flexform field and set FlexForm definition
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

// Add flexform
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml',
);

// Register plugin
$pluginSignature = ExtensionUtility::registerPlugin(
    // extension name, matching the PHP namespaces (but without the vendor)
    'calendarize',
    // arbitrary, but unique plugin name (not visible in the backend)
    'Organizer',
    // plugin title, as visible in the drop-down in the backend, use "LLL:" for localization
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.organizer.title',
    // icon identifier
    'calendarize-address',
    'calendarize_special',
    // plugin description
    'LLL:EXT:calendarize_address/Resources/Private/Language/locallang.xlf:plugin.organizer.description',
);

// Disable the display of layout and select_key fields for the plugin
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'pages,recursive';
// Activate the display of the plug-in flexform field and set FlexForm definition
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

// Add flexform
ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,    
    'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml',
);