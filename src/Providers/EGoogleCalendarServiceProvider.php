<?php

namespace ECommerce\EGoogleCalendar\Providers;

use ECommerce\EGoogleCalendar\Commands\CheckGoogleCalendarCommand;
use Illuminate\Support\ServiceProvider;

class EGoogleCalendarServiceProvider extends ServiceProvider
{
	protected $commands = [
		CheckGoogleCalendarCommand::class,
	];

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->commands($this->commands);
	}
}
