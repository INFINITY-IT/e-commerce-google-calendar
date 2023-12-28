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

    function getGEventId(): ?string
    {
        // TODO: Implement getGEventId() method.
        // return $this->event_id;
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
