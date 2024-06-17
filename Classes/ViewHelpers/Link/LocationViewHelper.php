<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace AndreasKastl\CalendarizeAddress\ViewHelpers\Link;

use AndreasKastl\CalendarizeAddress\Domain\Model\Location;
use HDNET\Calendarize\ViewHelpers\Link\AbstractLinkViewHelper;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Link to the location page.
 */
class LocationViewHelper extends AbstractLinkViewHelper
{
    /**
     * Init arguments.
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('location', Location::class, '', true);
        $this->registerArgument('pageUid', 'int', '', false, 0);
    }

    /**
     * Render the link to the given location page.
     *
     * @return string
     */
    public function render()
    {
        if (!\is_object($this->arguments['location'])) {
            return $this->renderChildren();
        }
        $additionalParams = [
            'tx_calendarize_location' => [
                'location' => $this->arguments['location']->getUid(),
            ],
        ];

        // signature of calendarize method AbstractLinkViewHelper::getPageUid was changed with
        // Fix #796 - move argument resolving to abstract method
        // in calendarize > 13.0.3
        $versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
        if ($versionInformation->getMajorVersion() < 12) {
            // for TYPO3 v12 && calendarize <
            $pageUid = $this->getPageUid($this->arguments['pageUid'], 'locationPid');
        } else {
            $pageUid = $this->getPageUid( 'locationPid');
        }
        return parent::renderLink(
            $pageUid,
            $additionalParams
        );
    }
}
