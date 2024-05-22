<p align="center">
    <h1>E-Commerce Google Calendar</h1>
</p>

### 1. composer.json

```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:INFINITY-IT/e-commerce-google-calendar.git",
            "or url": "https://username:token@github.com/infinity-it/e-commerce-google-calendar.git"
        }
    ]
}
```

### 2. Installation

```sh
composer require "infinity-it/e-commerce-google-calendar"
```

### 3. Configuration file

[README](https://github.com/spatie/laravel-google-calendar#installation)

### 4. Implement Model

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

### 7. usage

```php
$my_model = App\Models\MyModel::find(1);
$my_model->saveInGCalendar();
$my_model->start = \Carbon\Carbon::now();
$my_model->updateInGCalendar();
```

### 8. Check Google Calendar connection

```shell
php artisan calendar:check
```

### Google Event Colors:

```php
use ECommerce\EGoogleCalendar\Enums\GEventColorId;
```

- <div style="background-color: #a4bdfc; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::LAVENDER`
- <div style="background-color: #7AE7BF; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::SAGE`
- <div style="background-color: #BDADFF; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::GRAPE`
- <div style="background-color: #FF887C; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::FLAMINGO`
- <div style="background-color: #FBD75B; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::BANANA`
- <div style="background-color: #FFB878; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::TANGERINE`
- <div style="background-color: #46D6DB; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::PEACOCK`
- <div style="background-color: #E1E1E1; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::GRAPHITE`
- <div style="background-color: #5484ED; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::BLUEBERRY`
- <div style="background-color: #51B749; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::BASIL`
- <div style="background-color: #DC2127; display: inline-block; height: 10px; width: 10px;"></div> `GEventColorId::TOMATO`

    - Usage:
      ```php
      use Spatie\GoogleCalendar\Event;
      use ECommerce\EGoogleCalendar\Enums\GEventColorId;
      
      function toGEvent(Event &$event): void
      {
          $event->setColorId(GEventColorId::TOMATO->value);
      }
      ```
