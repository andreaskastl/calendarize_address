<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {
		// register extended event model		
		\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)->registerImplementation(\HDNET\Calendarize\Domain\Model\Event::class, \AndreasKastl\CalendarizeAddress\Domain\Model\Event::class);
		
		// register extended plugin configuration
		\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\Container\Container::class)->registerImplementation(\HDNET\Calendarize\Domain\Model\PluginConfiguration::class, \AndreasKastl\CalendarizeAddress\Domain\Model\PluginConfiguration::class);	
		
		
		// configure plugins
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			'calendarize',
			'Location',
			[
				\AndreasKastl\CalendarizeAddress\Controller\AddressController::class => 'location',
			],
			// non-cacheable actions
			[
				\AndreasKastl\CalendarizeAddress\Controller\AddressController::class => '',
			]
		);
		\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
			'calendarize',
			'Organizer',
			[
				\AndreasKastl\CalendarizeAddress\Controller\AddressController::class => 'organizer',
			],
			// non-cacheable actions
			[
				\AndreasKastl\CalendarizeAddress\Controller\AddressController::class => '',
			]
		);		

        // register wizards
		\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
			'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:calendarize_address/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">'
		);		
		
		// register icons
		$icons = [
			'calendarize-address' => 'Extension.svg',
		];
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		foreach ($icons as $identifier => $path) {
			$iconRegistry->registerIcon(
				$identifier,
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:calendarize_address/Resources/Public/Icons/' . $path]
			);
		}
    }	
);