<?php

declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\Updates;

// v13 path, works for v13 and v14
use TYPO3\CMS\Install\Attribute\UpgradeWizard;

// v14 namespace
// use TYPO3\CMS\Core\Attribute\UpgradeWizard;

// use TYPO3 v13 namespace here to be compatible with v13, otherwise upgrade wizard will not work in v13 !
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

// TYPO3 v14 namespace
// use TYPO3\CMS\Core\Upgrades\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('calendarize_address_pluginListTypeToCTypeUpdate')]
class AddressPluginListTypeToCTypeUpdate extends AbstractListTypeToCTypeUpdate
{
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'calendarize_location' => 'calendarize_location',
            'calendarize_organizer' => 'calendarize_organizer',
        ];
    }

    public function getTitle(): string
    {
        return 'Migrates Calendarize Address frontend plugins';
    }

    public function getDescription(): string
    {
        return 'Migrates the legacy Calendarize Address plugin list_type records to the CType content element signatures introduced for TYPO3 13/14 and Calendarize 15+';
    }
}
