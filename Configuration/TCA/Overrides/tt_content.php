<?php
defined('TYPO3_MODE') || die('Access denied.');

// register plugins
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'calendarize',
	'Location',
	'Calendarize location view',
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'calendarize',
	'Organizer',
	'Calendarize organizer view',
);
		
// add flexforms
$pluginSignature = 'calendarize_location';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature, 
	'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml'
);
$pluginSignature = 'calendarize_organizer';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	$pluginSignature, 
	'FILE:EXT:calendarize_address/Configuration/FlexForms/Calendar.xml'
);
