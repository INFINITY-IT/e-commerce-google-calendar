<?php

namespace ECommerce\EGoogleCalendar;

use Spatie\GoogleCalendar\Event;

/**
 * @mixin GEventInterface
 */
trait GEventTrait
{
    /**
     * @return Event
     */
    public function saveInGCalendar(): Event
    {
        if (!empty($this->getGEventId())) return $this->updateInGCalendar();
        $g_event = new Event;
        $this->toGEvent($g_event);
        $return = $g_event->save();
        $this->setGEventId($return->googleEvent->id);
        return $return;
    }

    /**
     * @return Event
     */
    public function updateInGCalendar(): Event
    {
        if (empty($this->getGEventId())) return $this->saveInGCalendar();
        $g_event = Event::find($this->getGEventId());
        if (!$g_event->exists()) {
            $this->setGEventId();
            return $this->saveInGCalendar();
        }
        $this->toGEvent($g_event);
        return $g_event->save();
    }
}
