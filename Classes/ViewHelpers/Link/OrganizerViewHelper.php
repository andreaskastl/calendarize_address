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
    public function render(): string
    {
        if (!\is_object($this->arguments['organizer'])) {
            return (string)$this->renderChildren();
        }
        $additionalParams = [
            'tx_calendarize_organizer' => [
                'organizer' => $this->arguments['organizer']->getUid(),
            ],
        ];

        // Use Calendarize v13+ AbstractLinkViewHelper signature
        $pageUid = $this->getPageUid('organizerPid');

        return parent::renderLink(
            $pageUid,
            $additionalParams
        );
    }
}
