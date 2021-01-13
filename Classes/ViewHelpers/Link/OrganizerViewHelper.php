<?php

/**
 * Link to the organizer page.
 */
declare(strict_types=1);

namespace AndreasKastl\CalendarizeAddress\ViewHelpers\Link;

use AndreasKastl\CalendarizeAddress\Domain\Model\Organizer;

/**
 * Link to the organizer page.
 */
class OrganizerViewHelper extends \HDNET\Calendarize\ViewHelpers\Link\AbstractLinkViewHelper
{
    /**
     * Init arguments.
     */
    public function initializeArguments()
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
            $this->logger->error('Do not call organizer viewhelper without index');

            return $this->renderChildren();
        }
        $additionalParams = [
            'tx_calendarize_organizer' => [
                'organizer' => $this->arguments['organizer']->getUid(),
            ],
        ];

        return parent::renderLink($this->getPageUid($this->arguments['pageUid'], 'organizerPid'), $additionalParams);
    }
}
