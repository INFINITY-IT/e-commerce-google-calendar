<?php

namespace ECommerce\EGoogleCalendar\Commands;

use Illuminate\Console\Command;
use Spatie\GoogleCalendar\Event;

class CheckGoogleCalendarCommand extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'calendar:check';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Check if the application can connect to Google Calendar';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): int
	{
		try {
			Event::get();
			$this->info('Successfully connected to Google Calendar');
			# return Command::SUCCESS
			return 0;
		} catch (\Exception $e) {
			$this->error('Could not connect to Google Calendar:' . PHP_EOL . $e->getMessage());
			# return Command::FAILURE
			return 1;
		}
	}
}