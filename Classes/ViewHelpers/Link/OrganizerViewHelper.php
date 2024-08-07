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

use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;
use HDNET\Calendarize\ViewHelpers\Link\AbstractLinkViewHelper;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Link to the organizer page.
 */
class OrganizerViewHelper extends AbstractLinkViewHelper
{
    /**
     * Init arguments.
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('organizer', Organizer::class, '', true);
        $this->registerArgument('pageUid', 'int', '', false, 0);
    }

    /**
     * Render the link to the given organizer page.
     *
     * @return string
     */
    public function render()
    {
        if (!\is_object($this->arguments['organizer'])) {
            return $this->renderChildren();
        }
        $additionalParams = [
            'tx_calendarize_organizer' => [
                'organizer' => $this->arguments['organizer']->getUid(),
            ],
        ];

        // signature of calendarize method AbstractLinkViewHelper::getPageUid was changed with
        // Fix #796 - move argument resolving to abstract method
        // in calendarize > 13.0.3
        $versionInformation = GeneralUtility::makeInstance(Typo3Version::class);
        if ($versionInformation->getMajorVersion() < 12) {
            // for TYPO3 v12 && calendarize <
            $pageUid = $this->getPageUid($this->arguments['pageUid'], 'organizerPid');
        } else {
            $pageUid = $this->getPageUid( 'organizerPid');
        }

        return parent::renderLink(
            $pageUid,
            $additionalParams
        );
    }
}
