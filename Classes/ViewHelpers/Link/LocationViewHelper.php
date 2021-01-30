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

/**
 * Link to the location page.
 */
class LocationViewHelper extends AbstractLinkViewHelper
{
    /**
     * Init arguments.
     */
    public function initializeArguments()
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

        return parent::renderLink(
            $this->getPageUid($this->arguments['pageUid'], 'locationPid'),
            $additionalParams
        );
    }
}
