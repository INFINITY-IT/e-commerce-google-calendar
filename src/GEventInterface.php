<?php

namespace ECommerce\EGoogleCalendar;

use Spatie\GoogleCalendar\Event;

interface GEventInterface
{
    /**
     * @param Event $event
     * @return mixed
     */
    function toGEvent(Event &$event);

    /**
     * @return Event
     */
    function saveInGCalendar(): Event;

    /**
     * @return Event
     */
    function updateInGCalendar(): Event;

    /**
     * @return string
     */
    function getGEventId(): ?string;

    /**
     * @param $google_event_id
     * @return bool
     */
    function setGEventId($google_event_id = null): bool;
}
