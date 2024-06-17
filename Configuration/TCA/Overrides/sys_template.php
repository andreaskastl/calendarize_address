<?php
declare(strict_types=1);

defined('TYPO3') or die();

// add static typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'calendarize_address',
    'Configuration/TypoScript',
    'Calendarize - Address Extension'
);
