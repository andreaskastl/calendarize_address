<?php

declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\Updates;

use TYPO3\CMS\Core\Attribute\UpgradeWizard;
use TYPO3\CMS\Core\Upgrades\AbstractListTypeToCTypeUpdate;

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
