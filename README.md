# Activity Calendar

Activity Calendar is a simple printable activity tracker inspired by [Tim Urban's Life Calendar](https://youtu.be/arj7oStGLkU?t=785). Although, it's very different by the fact that instead of having just plain boxes, I'm rather generating round icons to show an activity every day and I'd fill out an activity with a marker upon completion everyday thus helping me to track daily activities. It looks like this:

![Screenshot](https://i.imgur.com/eaGMpnk.png)

## Setup
Clone this repo, run `composer install` and run it on your webserver. It will generate the calendar and you can print it out.

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use Mohsin\ActivityCalendar\Calendar;

$calendar = new Calendar;
$calendar->setColumns(3);
$calendar->addActivity('Running', 'running');
$calendar->addActivity('Bird feeding', 'kiwi-bird');
$calendar->addActivity('Cycling', 'bicycle');
$calendar->addActivity('Guitar', 'guitar');
$calendar->addActivity('Reading', 'book-reader');
$calendar->addActivity('Sleeping well', 'bed');
echo $calendar->outputHtml();

```