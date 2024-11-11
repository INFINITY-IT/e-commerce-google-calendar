<p align="center">
    <h1>E-Commerce Google Calendar</h1>
</p>

### 1. Installation

```sh
composer require "infinity-it/e-commerce-google-calendar"
```

### 2. Configuration file

[README](https://github.com/spatie/laravel-google-calendar#installation)

### 3. Implement Model

```php
namespace App\Models;

use ECommerce\EGoogleCalendar\Interfaces\GEventInterface;
use ECommerce\EGoogleCalendar\Traits\GEventTrait;

class MyModel implements GEventInterface
{
	use GEventTrait;

	function toGEvent(\Spatie\GoogleCalendar\Event &$event)
	{
		// TODO: Implement toGEvent() method.
		// $event->name = $this->title;
		// $event->description = $this->description;
		// $event->startDateTime = $this->start;
		// $event->endDateTime = $this->end;
		// ...
	}

	function getGEventIdKey(): string
	{
		// TODO: Implement getGEventIdKey() method.
		// return 'event_id';
	}
}
```

### 4. usage

```php
$my_model = App\Models\MyModel::find(1);
$my_model->saveInGCalendar();
$my_model->start = \Carbon\Carbon::now();
$my_model->updateInGCalendar();
```

### 5. Check Google Calendar connection

```shell
php artisan calendar:check
```

### Google Event Colors:

- Import:
  ```php
  use ECommerce\EGoogleCalendar\Enums\GEventColorId;
  ```

- Colors
    - <img src="https://placehold.co/10/a4bdfc/a4bdfc.png"/> `GEventColorId::LAVENDER`
    - <img src="https://placehold.co/10/7AE7BF/7AE7BF.png"/> `GEventColorId::SAGE`
    - <img src="https://placehold.co/10/BDADFF/BDADFF.png"/> `GEventColorId::GRAPE`
    - <img src="https://placehold.co/10/FF887C/FF887C.png"/> `GEventColorId::FLAMINGO`
    - <img src="https://placehold.co/10/FBD75B/FBD75B.png"/> `GEventColorId::BANANA`
    - <img src="https://placehold.co/10/FFB878/FFB878.png"/> `GEventColorId::TANGERINE`
    - <img src="https://placehold.co/10/46D6DB/46D6DB.png"/> `GEventColorId::PEACOCK`
    - <img src="https://placehold.co/10/E1E1E1/E1E1E1.png"/> `GEventColorId::GRAPHITE`
    - <img src="https://placehold.co/10/5484ED/5484ED.png"/> `GEventColorId::BLUEBERRY`
    - <img src="https://placehold.co/10/51B749/51B749.png"/> `GEventColorId::BASIL`
    - <img src="https://placehold.co/10/DC2127/DC2127.png"/> `GEventColorId::TOMATO`

- Usage:
  ```php
  use Spatie\GoogleCalendar\Event;
  use ECommerce\EGoogleCalendar\Enums\GEventColorId;
  
  // ...     
  function toGEvent(Event &$event): void
  {
      $event->setColorId(GEventColorId::TOMATO->value);
  }
  // ...
  ```
