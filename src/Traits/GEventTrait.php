<?php

namespace ECommerce\EGoogleCalendar\Traits;

use ECommerce\EGoogleCalendar\Interfaces\GEventInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\GoogleCalendar\Event;

/**
 * @mixin GEventInterface|Model
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
	 * @return string|null
	 */
	function getGEventId(): ?string
	{
		return $this->{$this->getGEventIdKey()};
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

	/**
	 * @param $google_event_id
	 * @return bool
	 */
	function setGEventId($google_event_id = null): bool
	{
		return $this->update([$this->getGEventIdKey() => $google_event_id]);
	}
}
