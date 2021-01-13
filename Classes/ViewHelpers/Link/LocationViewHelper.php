<?php

/**
 * Link to the location page.
 */
declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\ViewHelpers\Link;

use AndreasKastl\CalendarizeAddress\Domain\Model\Location;

/**
 * Link to the location page.
 */
class LocationViewHelper extends \HDNET\Calendarize\ViewHelpers\Link\AbstractLinkViewHelper
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
            $this->logger->error('Do not call location viewhelper without index');

            return $this->renderChildren();
        }
        $additionalParams = [
            'tx_calendarize_location' => [
                'location' => $this->arguments['location']->getUid(),
            ],
        ];

        return parent::renderLink($this->getPageUid($this->arguments['pageUid'], 'locationPid'), $additionalParams);
    }
}
